<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ServiceOrders;
use App\Models\Clients;
use App\Models\Employee;
use App\Models\Car;
use App\Models\OrdersTimetable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        
        $clients = Clients::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->where('user_id', Auth::id())->get();
        $employees = Employee::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->where('user_id', Auth::id())->get();
        $orders = ServiceOrders::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->where('user_id', Auth::id())->get();
        
        $topEmployeeID = ServiceOrders::select('employee_id')
            ->groupBy('employee_id')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(1)
            ->first();

        if( is_null($topEmployeeID) ) {
            $topEmployee = 0;
        } else {
            $topEmployee = Employee::where('id',$topEmployeeID->employee_id)->first();
        }
        
        $topClientID = ServiceOrders::select('client_id')
            ->groupBy('client_id')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(1)
            ->first(); 

        if( is_null($topClientID) ) {
            $topClient = 0;
        } else {
            $topClient = Clients::where('id',$topClientID->client_id)->first();
        }

        return view('stats.index', [
            'clients' => $clients,
            'employees' => $employees,
            'orders' => $orders,
            'topClient' => $topClient,
            'topEmployee' => $topEmployee
        ]);
    }
}
