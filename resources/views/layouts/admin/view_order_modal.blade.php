<div class="modal fade" id="show_{{ $order->id }}_modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Invoice #{{ $order->invoice_id }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <h3 class="modal-title">Order #{{ $order->id }}</h3>
                        <hr>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4">
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
                                    <div class="col-md-4 text-right">
                                        <p>
                                            <strong>Picked:</strong><br>
                                            @if ($order->picked_date)
                                                {{ $order->picked_date }}
                                            @else
                                                <span class="badge bg-info mt-4">
                                                    pending
                                                </span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <address>
                                            <strong>Shipped To:</strong><br>

                                            @if ($order->shipped_date)
                                                {{ $order->shipped_date }}
                                            @else
                                                <span class="badge bg-info mt-4">
                                                    pending
                                                </span>
                                            @endif

                                        </address>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <p>
                                            <strong>Delivered:</strong><br>
                                            @if($order->delivered_date)
                                                {{ $order->delivered_date }}
                                            @else
                                                <span class="badge bg-info mt-4">
                                                    pending
                                                </span>
                                            @endif
                                        </p>
                                    </div>
                                @else

                                    <div class="col-md-4 mx-auto my-4 text-right">
                                        <span class="badge bg-danger mt-4">
                                            returned
                                        </span>
                                        <p>
                                            {{ $order->return_reason }}
                                        </p>
                                    </div>

                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>
                                        <strong>Payment Method:</strong><br>
                                        Card<br>
                                    </p>
                                </div>
                                <div class="col-md-6 text-right">
                                    <p>
                                        <strong>Order Date:</strong><br>
                                        {{ $order->created_at }}<br><br>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-heading d-flex justify-content-center align-items-center">
                                            <h3 class="mt-3"><strong>Order summary</strong></h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>
                                                        <span><strong>Product Name:</strong></span>
                                                        {{ $order->product->name_en }}<br>
                                                        <span><strong>Product Price:</strong></span>
                                                        {{ $order->product->selling_price }}<br>
                                                    </p>
                                                </div>
                                                <div class="col-md-6 text-right">
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
