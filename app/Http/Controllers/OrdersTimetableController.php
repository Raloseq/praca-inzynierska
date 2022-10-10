<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdersTimetable;
use Illuminate\Support\Facades\Auth;

class OrdersTimetableController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {  
            $data = OrdersTimetable::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->where('user_id', Auth::id())
                ->get(['id', 'title', 'start', 'end', 'user_id']);
            return response()->json($data);
        }
        return view('order_timetable');
    }
 
    public function calendarOrders(Request $request)
    {
        switch ($request->type) {
           case 'create':
              $order = OrdersTimetable::create([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
              
              return response()->json($order);
             break;
  
           case 'edit':
              $order = OrdersTimetable::find($request->id)->update([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($order);
             break;
  
           case 'delete':
              $order = OrdersTimetable::find($request->id)->delete();
  
              return response()->json($order);
             break;
             
           default:
             # ...
             break;
        }
    }
}
