<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\ServiceOrders;
use Illuminate\Support\Facades\Gate;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('search')) {
            $employees = Employee::where([
                ['surname', 'like', '%' . request('search') . '%'],
                ['user_id', Auth::id()]
                ])->paginate(5);
        } else {
            $employees = Employee::where('user_id', Auth::id())->paginate(5);
        }
        

        return view('employee.index', [
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeStoreRequest $request)
    {
        $employee = new Employee($request->validated());
        $employee->user_id = Auth::id();
        $employee->save();
        return redirect()->route('employee.index')->with('status','Pracownik został pomyślnie dodany!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        Gate::authorize('view', $employee);

        $orders = ServiceOrders::with('employees')->get();
        $doneOrders = [];

        foreach($orders as $order) {
            if(($order->is_done === 1) && ($employee->id === $order->employee_id)) {
                $doneOrders[] = $order;
            }
        }

        return view('employee.show', [
            'employee' => $employee,
            'doneOrders' => $doneOrders
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        Gate::authorize('update', $employee);

        return view('employee.edit', [
            'employee' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeStoreRequest $request, Employee $employee)
    {
        Gate::authorize('update', $employee);

        $employee->fill($request->validated());
        $employee->save();

        return redirect()->route('employee.index')->with('status','Dane pracownika zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        Gate::authorize('delete', $employee);

        try {
            $employee->delete();
        } catch(\Illuminate\Database\QueryException $ex) {
            return redirect()->route('employee.index')->with('status','Pracownik nie może zostać usunięty ponieważ jego dane wystęują w obiegu dokumentów! Skontaktuj się z administratorem.');
        } 
        return redirect()->route('employee.index')->with('status','Pracownik został pomyślnie usunięty!');
    }
}
