<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    /**
     *  List all orders
     */
    public function index()
    {
        //get paid orders
        $paidOrders = Order::whereNull('return_date')->latest()->get();
        //get returned orders
        $returnedOrders = Order::whereNotNull('return_date')->latest()->get();

        return view('admin.orders.index')->with([
            'paidOrders' => $paidOrders,
            'returnedOrders' => $returnedOrders
        ]);
    }

    /**
     * Update order status
     */
     public function edit(Order $order, $status)
    {
        //set order status to picked
        if($status === 'picked') {
            $order->update([
                'picked_date' => Carbon::now()
            ]);
        }

        //set order status to shipped
        if($status === 'shipped') {
            $order->update([
                'shipped_date' => Carbon::now()
            ]);
        }

        //set order status to delivered
        if($status === 'delivered') {
            $order->update([
                'delivered_date' => Carbon::now()
            ]);
            //deduct the qty ordered from the product's qty
            $order->product->update([
                'qty' => $order->product->qty - $order->qty,
            ]);
        }

        //if product's qty is equal to 0 set product status to out of stock
        if($order->product->qty === 0) {
            $order->product->update([
                'status' => 0
            ]);
        }

        return redirect()->route('admin.orders.index')->with([
            'success' => 'Order updated successfully'
        ]);
    }

    /**
     * Delete order
     */
    public function destroy(Order $order)
    {
        //delete order
        $order->delete();

        return redirect()->route('admin.orders.index')->with([
            'success' => 'Order deleted successfully'
        ]);

    }

    /**
     * Set order to returned
     */

     public function handleReturnedOrder(Request $request, Order $order)
     {
        $order->update([
            'return_date' => Carbon::now(),
            'return_reason' => $request->return_reason
        ]);

        return redirect()->route('admin.orders.index')->with([
            'success' => 'Order updated successfully'
        ]);

     }

     /**
      * Generate invoice as pdf
      */
      public function generateOrderAsPdf(Order $order)
      {
        $pdf = Pdf::loadView('admin.orders.invoice', compact('order'));
        return $pdf->download('invoice.pdf');

      }

}
