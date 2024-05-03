<div style="text-align: center">
    <div>
        <div>
            <div>
                <div style="border: 1px solid #000; padding: 10px">
                    <h3>Invoice #{{ $order->invoice_id }}</h3>
                </div>
                <div>
                    <div>
                        <div>
                            <h3>Order #{{ $order->id }}</h3>
                            <div>
                                <div>
                                    <div>
                                        <address>
                                            <strong>Billed To:</strong><br>
                                            {{ $order->user->name }}<br>
                                            {{ $order->user->first_address }} {{ $order->user->zip_code }}<br>
                                            {{ $order->user->state }}<br>
                                            {{ $order->user->city }}<br>
                                            {{ $order->user->country }}<br>
                                        </address>
                                    </div>
                                    @if(!$order->return_date)

                                        <div style="margin: 10px 0">
                                            <div style="margin: 10px 0">
                                                <p>
                                                    <strong>Picked:</strong><br>
                                                    @if ($order->picked_date)
                                                        {{ $order->picked_date }}
                                                    @else
                                                        <span>
                                                            pending
                                                        </span>
                                                    @endif

                                                </p>
                                            </div>
                                            <div style="margin: 10px 0">
                                                <address>
                                                    <strong>Shipped To:</strong><br>
                                                    @if ($order->shipped_date)
                                                        {{ $order->shipped_date }}
                                                    @else
                                                        <span>
                                                            pending
                                                        </span>
                                                    @endif

                                                </address>
                                            </div>
                                            <div style="margin: 10px 0">
                                                <p>
                                                    <strong>Delivered:</strong><br>
                                                    @if ($order->delivered_date)
                                                        {{ $order->delivered_date }}
                                                    @else
                                                        <span>
                                                            pending
                                                        </span>
                                                    @endif

                                                </p>
                                            </div>
                                        </div>
                                    @else
                                        <div style="margin: 10px 0; border: 1px solid #000; padding: 10px">
                                                <span style="color: red;font-style:italic">
                                                    returned {{ $order->return_date }}
                                                </span>
                                                <p>
                                                    {{ $order->return_reason }}
                                                </p>
                                        </div>
                                    @endif

                                    </div>

                                </div>
                                <div>
                                    <div style="margin: 10px 0">
                                        <p>
                                            <strong>Payment Method:</strong><br>
                                            Card<br>
                                        </p>
                                    </div>
                                    <div style="margin: 10px 0">
                                        <p>
                                            <strong>Order Date:</strong><br>
                                            {{ $order->created_at }}<br><br>
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <div>
                                            <div style="border: 1px solid #000; padding: 10px">
                                                <h3><strong>Order summary</strong></h3>
                                            </div>
                                            <div>
                                                <div>
                                                    <div style="margin: 10px 0">
                                                        <p>
                                                            <span><strong>Product Name:</strong></span>
                                                            {{ $order->product->name_en }}<br>
                                                            <span><strong>Product Price:</strong></span>
                                                            {{ $order->product->selling_price }}<br>
                                                        </p>
                                                    </div>
                                                    <div style="margin: 10px 0">
                                                        <p>
                                                            <span><strong>Order Qty:</strong></span>
                                                            {{ $order->qty }}<br>
                                                            <span><strong>Total:</strong></span>
                                                            {{ $order->total }}<br>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
