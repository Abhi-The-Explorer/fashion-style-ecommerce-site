<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets_admin/img/favicon.jpg') }}">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            padding: 20px;
        }

        .header {
            background-color: #007BFF;
            padding: 10px;
            color: white;
            text-align: center;
        }

        .content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .section-title {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .order-details,
        .shipping-details {
            margin-top: 20px;
        }

        .order-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .order-table th,
        .order-table td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .order-table th {
            background-color: #f2f2f2;
        }

        .total-cost {
            font-weight: bold;
            font-size: 1.2em;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            font-size: 0.8em;
            color: #888;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Your Payment has been Received!</h1>
        </div>
        <div class="content">
            <p>Dear Customer,</p>
            <p>Thank you for your order! We are pleased to inform you that your payment has been received and your order has been processed.</p>

            <div class="shipping-details">
                <div class="section-title">Shipping Details</div>
                <p><strong>Full Name:</strong> {{ $shippingDetails->full_name ?? 'Not found'}}</p>
                <p><strong>Address:</strong> {{ $shippingDetails->address_line ?? 'Not found'}}, {{ $shippingDetails->city?? 'Not found' }}, {{ $shippingDetails->postcode ?? 'Not found' }}</p>
                <p><strong>Phone:</strong> {{ $shippingDetails->phone ?? 'Not found'}}</p>
                <p><strong>Email:</strong> {{ $shippingDetails->email ?? 'Not found'}}</p>
            </div>

            <div class="order-details">
                <div class="section-title">Order Details</div>
                <table class="order-table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Total Amount per Product</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderDetails as $item)
                        <tr>
                            <td>{{ $item->product_name ?? 'Not found'}}</td>
                            <td>{{ $item->quantity ?? 'Not found'}}</td>
                            <td>₹{{ number_format($item->total_amount_per_product, 2 ?? 'Not found') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="total-cost">
                    <p>Total Cost: ₹{{ number_format( $grandTotal, 2 ?? 'Not found') }}</p>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>Thank you for shopping with us!</p>
            <p>&copy; 2024 FashionForAll. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
