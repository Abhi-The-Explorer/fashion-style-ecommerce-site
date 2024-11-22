<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Order Status</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pe7icon/1.3.0/pe7icon.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

<!-- navbar -->
@include('frontend.common.navbar')
<!-- end navbar -->

<div style=" background-color: #f0f0f0;">
    <a href=""><br><br><br></a>
    </div>

<!-- content -->
<div class="col-lg-9" style="margin: 0 auto; padding: 20px; text-align: center;">
    <div class="my-account-content account-order">
        <h2 style="font-size: 28px; color: #333; margin-bottom: 20px;">Your Order Status</h2>
        <p style="font-size: 16px; color: #666; margin-bottom: 30px;">Here, you can view the status of all your orders, including the payment and delivery status. If you need any assistance, feel free to contact us.</p>
        
        <div class="wrap-account-order" style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; border: 1px solid #ddd; margin: 0 auto;">
                <thead style="background-color: #f0f0f0; text-align:center;">
                    <tr>
                        <th style="padding: 10px; font-weight: bold; font-size: 14px;">Order ID</th>
                        <th style="padding: 10px; font-weight: bold; font-size: 14px;">Customer Name</th>
                        <!-- <th style="padding: 10px; font-weight: bold; font-size: 14px;">Product ID</th> -->
                        <th style="padding: 10px; font-weight: bold; font-size: 14px;">Product Name</th>
                        <th style="padding: 10px; font-weight: bold; font-size: 14px;">Price Per Product</th>
                        <th style="padding: 10px; font-weight: bold; font-size: 14px;">Quantity</th>
                        <th style="padding: 10px; font-weight: bold; font-size: 14px;">Payment Status</th>
                        <th style="padding: 10px; font-weight: bold; font-size: 14px;">Order Status</th>
                        <th style="padding: 10px; font-weight: bold; font-size: 14px;">Grand Total</th>
                    </tr>
                </thead>
                <tbody>
                    @if($groupedOrders->isEmpty())
                        <tr>
                            <td colspan="9" style="text-align: center; padding: 10px; border-bottom: 1px solid #ddd; color: #999;">No data found</td>
                        </tr>
                    @else
                        @foreach($groupedOrders as $orderId => $orderGroup)
                            @foreach($orderGroup as $order)
                                <tr style="background-color: white; border-bottom: 1px solid #ddd;">
                                    <!-- Display order_id only once for each group -->
                                    @if($loop->first)
                                        <td rowspan="{{ $orderGroup->count() }}" style="padding: 10px;">{{ $orderId ?? 'Not found' }}</td>
                                    @endif

                                    <!-- Display customer name only once for each group -->
                                    @if($loop->first)
                                        <td rowspan="{{ $orderGroup->count() }}" style="padding: 10px;">{{ $orderGroup->first()->name ?? 'Not found' }}</td>
                                    @endif

                                    <!-- Display product details for each order in the group -->
                                    <!-- <td style="padding: 10px;">{{ $order->product_id ?? 'Not found' }}</td> -->
                                    <td style="padding: 10px;">{{ $order->product_name ?? 'Not found' }}</td>
                                    <td style="padding: 10px;"> ₹{{ number_format($order->price, 2) ?? 'Not found' }}</td>
                                    <td style="padding: 10px;">{{ $order->quantity ?? 'Not found' }}</td>

                                    <!-- Display payment status only once for each group -->
                                    @if($loop->first)
                                        <td rowspan="{{ $orderGroup->count() }}" style="padding: 10px;">{{ $order->orderStatus->payment_status ?? 'Not found' }}</td>
                                    @endif

                                    <!-- Display order status only once for each group -->
                                    @if($loop->first)
                                        <td rowspan="{{ $orderGroup->count() }}" style="padding: 10px;">{{ $order->orderStatus->order_status ?? 'Not found' }}</td>
                                    @endif

                                    <!-- Display grand total only once for each group -->
                                    @if($loop->first)
                                    <td rowspan="{{ $orderGroup->count() }}" style="padding: 10px;">
                                    ₹{{ number_format($order->grand_total, 2) }}
                                        </td>
                                    @endif

                                </tr>
                            @endforeach
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- end content -->

<!-- footer starts here -->
@include('frontend.common.footer')
<!-- footer end -->

<!-- All JS is here -->
<script src="{{ asset('assets/js/vendor/jquery-v3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
