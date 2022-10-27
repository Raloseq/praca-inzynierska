<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ServiceOrders;
use App\Models\Clients;
use App\Models\ClientAddress;
use Illuminate\Http\Request;
use Auth;

class InvoiceController extends Controller
{
    public function generateInvoice(Request $request)
    {
        $order = ServiceOrders::findOrFail($request->order_id);
        $client = Clients::findOrFail($order->client_id);
        $address = ClientAddress::where('client_id', $client->id)->first();

        $pdf = PDF::loadView('invoice.invoice', [
            'client' => $client,
            'order' => $order,
            'address' => $address,
            'user' => Auth::user()
        ]);

        return $pdf->stream();
    }
}
