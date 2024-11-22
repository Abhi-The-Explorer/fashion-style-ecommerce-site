<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets_admin/img/favicon.jpg') }}">

</head>
<body>

<!-- navbar -->
@include('backend.common.navbar')
<!-- end navbar -->

<!-- sidebar -->
@include('backend.common.sidebar')
<!-- end sidebar -->

<!-- content -->
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Order List</h4>
                <h6>Manage your Order</h6>
            </div>
        </div>

        <div class="card">
            @if(session('delete'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('delete') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card-body">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>User Id</th>
                    <th>Order Id</th>
                    <th>Product Id</th>
                    <th>Customer Name</th>
                    <th>Product Name</th>
                    <th>Price Per Product</th>
                    <th>Quantity</th>
                    <th>Payment Status</th>
                    <th style="margin-left: 80px;">Order Status</th>
                    <th>Grand Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(empty($finalOrders))
                    <tr>
                        <td colspan="11" class="text-center">No data found</td>
                    </tr>
                @else
                    @foreach($finalOrders as $order)
                        <!-- Iterate over data in chunks of two -->
                        @php
                            $productNamesChunks = array_chunk($order['product_names'], 2);
                            $pricesChunks = array_chunk($order['prices'], 2);
                            $quantitiesChunks = array_chunk($order['quantities'], 2);
                            $maxRows = max(count($productNamesChunks), count($pricesChunks), count($quantitiesChunks));
                        @endphp

                        @for ($i = 0; $i < $maxRows; $i++)
                            <tr>
                                @if ($i == 0)
                                    <!-- User ID and Order ID only in the first row -->
                                    <td rowspan="{{ $maxRows }}">
                                        @foreach($order['user_ids'] as $user_id)
                                            {{ $user_id }}<br>
                                        @endforeach
                                    </td>
                                    <td rowspan="{{ $maxRows }}">{{ $order['order_id'] ?? 'Not found' }}</td>
                                    <td rowspan="{{ $maxRows }}">{{ $order['product_ids'] ?? 'Not found' }}</td>
                                    <td rowspan="{{ $maxRows }}">{{ $order['customer_names'] ?? 'Not found' }}</td>
                                @endif

                                <!-- Product Names -->
                                <td>
                                    @if (isset($productNamesChunks[$i]))
                                        @foreach ($productNamesChunks[$i] as $productName)
                                            {{ $productName }}<br>
                                        @endforeach
                                    @else
                                        &nbsp;
                                    @endif
                                </td>

                                <!-- Prices -->
                                <td>
                                    @if (isset($pricesChunks[$i]))
                                        @foreach ($pricesChunks[$i] as $price)
                                            ₹{{ $price }}<br>
                                        @endforeach
                                    @else
                                        &nbsp;
                                    @endif
                                </td>

                                <!-- Quantities -->
                                <td>
                                    @if (isset($quantitiesChunks[$i]))
                                        @foreach ($quantitiesChunks[$i] as $quantity)
                                            {{ $quantity }}<br>
                                        @endforeach
                                    @else
                                        &nbsp;
                                    @endif
                                </td>

                                @if ($i == 0)
                                    <!-- Payment and Order Status, Grand Total, and Action in the first row -->
                                    <td rowspan="{{ $maxRows }}">{{ $order['payment_status'] ?? 'Not found' }}</td>
                                    <td rowspan="{{ $maxRows }}">
                                        <form action="{{ route('orders.updateStatus', $order['order_id']) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="order_status" id="order_status" 
                                                style="background-color: #007bff; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; font-size: 13px; text-align: center;">
                                                <option value="pending" {{ $order['order_status'] == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="processed" {{ $order['order_status'] == 'processed' ? 'selected' : '' }}>Processed</option>
                                                <option value="shipped" {{ $order['order_status'] == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                                <option value="delivered" {{ $order['order_status'] == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary" 
                                                style="background-color: #28a745; border: none; padding: 8px 16px; border-radius: 4px; color: white; font-size: 11px; cursor: pointer;">
                                                Update Status
                                            </button>
                                        </form>
                                    </td>
                                    <td rowspan="{{ $maxRows }}">₹{{ $order['grand_total'] ?? 'Not found' }}</td>
                                    <td rowspan="{{ $maxRows }}">
                                        <form action="{{ route('orders.delete', $order['order_id']) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link p-0">
                                                <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="Delete">
                                            </button>
                                        </form>
                                        <script>
                                            function confirmDelete() {
                                                return confirm('Are you sure you want to delete this order?');
                                            }
                                        </script>
                                    </td>
                                @endif
                            </tr>
                        @endfor
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

        <br>
                <!-- pagination links here -->
            </div>
        </div>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('.alert-dismissible .close').click(function() {
            $(this).parent('.alert').fadeOut();
        });
    });
</script>

</body>
</html>