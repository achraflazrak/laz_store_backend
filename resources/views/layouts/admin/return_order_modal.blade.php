<div class="modal fade" id="return_{{ $order->id }}_modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Returned Order</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <h3 class="modal-title">Order #{{ $order->id }}</h3>
                        <hr>
                        <div class="container-fluid">
                            <form action="{{ route('admin.orders.returned', $order) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <textarea required name="return_reason" class="form-control" cols="30" rows="10"
                                        placeholder="Reason"></textarea>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
