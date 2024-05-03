@component('mail::message')
#Orders(s) Paid

@component('mail::button', ['url' => 'http://localhost:3000/user/orders'])
    View Orders
@endcomponent

@component('mail::table')
| Product Name | Qty | Price |
| -----------: | ---:| -----:|
@foreach ($orders as $order)
| {{ $order->product->name_en }} | {{ $order->qty }} | ${{ $order->product->selling_price }}
@endforeach
| Total |
| ----- |
${{ collect($orders)->sum('total') }}
@endcomponent

Thanks <br />
Laz Store Team.
@endcomponent
