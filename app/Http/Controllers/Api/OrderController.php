<?php

namespace App\Http\Controllers\Api;

use Stripe\Stripe;
use App\Models\User;
use App\Models\Order;
use App\Models\Coupon;
use App\Mail\OrderPaid;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ErrorException;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Store new order
     */
    public function store(Request $request)
    {
        $orders = [];
        $data = [];
        $user = User::findOrFail($request->user_id);

        foreach($request->products as $product)
        {
            $data['user_id'] = $request->user_id;
            $data['product_id'] = $product['id'];
            $data['coupon_id'] = $request->coupon_id;
            $data['qty'] = $product['quantity'];
            $data['total'] = $this->calculateTotal($product['price'], $product['quantity'],  $request->coupon_id);
            $data['invoice_id'] = $this->generateUniqueNumber('invoice_id');
            $data['transaction_id'] = $this->generateUniqueNumber('transaction_id');
            $order = Order::create($data);
            array_push($orders, $order);
        }

        // Send email to user
        Mail::to($user->email)->send(new OrderPaid($orders));

        return response()->json([
            'message' => 'Order saved successfully',
            'user' => $user->load('orders')
        ]);
    }

    /**
     * Calculate the orders total amount
     */
    public function calculateTotal($price, $qty, $coupon_id)
    {
        $discount = 0;
        $total = $price * $qty;
        if($coupon_id){
            $coupon = Coupon::findOrFail($coupon_id);
            if($coupon) {
                if($coupon->checkIfValid()) {
                    $discount = $total * $coupon->discount / 100;
                }
            }
        }
        return $total - $discount;
    }

    /**
     * Check if unique number already exists
     */
    public function uniqueNumberExists($field, $number)
    {
        return Order::where($field, $number)->exists();
    }


    /**
     * Generate a unique number
     */
    public function generateUniqueNumber($field)
    {
        //generate the unqiue number
        $number = mt_rand(100000000000, 999999999999);
        //check if the generated unique number already exists
        if($this->uniqueNumberExists($field, $number)) {
            return $this->generateUniqueNumber($field);
        }
        //return generated number
        return $number;
    }

    /**
     * Pay order by stripe
     */
    public function payByStripe(Request $request)
    {
        Stripe::setApiKey('sk_test_51PBmYzRssmTdN8LNBLiMhcUteIIrnWAHAmFL4LwwZ1eDVo4etkmksXPD8JDxdkGYk98pY6gkXbquOSr0R1umvdy500Zubr21ci');
        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $this->calculateOrderTotal($request->cartItems),
                'currency' => 'usd',
                'description' => 'React Store',
                'setup_future_usage' => 'on_session',
            ]);

            $output = [
                'clientSecret' => $paymentIntent->client_secret
            ];

            return response()->json($output);

        } catch (ErrorException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Calculate the amount for stripe
     */
    public function calculateOrderTotal($items)
    {
        $total = 0;
        //calculate the total amount of cart items
        foreach ($items as $item) {
            $total += $this->calculateTotal($item['price'], $item['quantity'], $item['coupon_id']);
        }
        return $total * 100;
    }
}
