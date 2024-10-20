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
                            @if($orders->isEmpty())
                                <tr>
                                    <td colspan="10" class="text-center">No data found</td> <!-- colspan adjusted to number of table columns -->
                                </tr>
                            @else

                                @foreach($orders as $order) <!-- Use a different variable name to avoid confusion -->
                                    <tr>
                                        <td>{{ $order->order_id ?? 'Not found' }}</td>
                                        <td>{{ $order->product_id ?? 'Not found' }}</td>
                                        <td>{{ $order->name ?? 'Not found' }}</td>
                                        <td>{{ $order->product_name ?? 'Not found' }}</td>
                                        <td>{{ $order->price ?? 'Not found' }}</td>
                                        <td>{{ $order->quantity ?? 'Not found' }}</td>


                                <!-- order_status update button -->

                                        {{-- Access the related order status --}}
                                        @if($order->orderStatus) 
                                            <td>{{ $order->orderStatus->payment_status }}</td>
                                            
                                            {{-- Display current order_status --}}
                                            <td>
                                                <form action="{{ route('orders.updateStatus', $order->orderStatus->order_id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT') <!-- Use PUT or PATCH method for update -->
                                                

                                                    {{-- Dropdown styled like a button --}}
                                                    <select name="order_status" id="order_status" 
                                                        style="
                                                            background-color: #007bff; 
                                                            color: white; 
                                                            padding: 8px 16px; 
                                                            border: none; 
                                                            border-radius: 4px; 
                                                            cursor: pointer; 
                                                            font-size: 13px; 
                                                            text-align: center;
                                                        ">
                                                        <option value="pending" {{ $order->orderStatus->order_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="processed" {{ $order->orderStatus->order_status == 'processed' ? 'selected' : '' }}>Processed</option>
                                                        <option value="shipped" {{ $order->orderStatus->order_status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                                        <option value="delivered" {{ $order->orderStatus->order_status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                                    </select>

                                                    {{-- Submit button to update order_status --}}
                                                    <button type="submit" class="btn btn-primary" 
                                                        style="
                                                            background-color: #28a745;
                                                            border: none;
                                                            padding: 8px 16px;
                                                            border-radius: 4px;
                                                            color: white;
                                                            font-size: 11px;
                                                            cursor: pointer;
                                                        ">
                                                        Update Status
                                                    </button>
                                                </form>
                                            </td>
                                        @else
                                            <td colspan="2">Data not available</td>
                                        @endif

                          <!-- order_status update button -->



                                        <td> <strong>{{ $grandTotal->total ?? ' not found ' }} </strong></td>

                                       
  
       

                                        <td>
                                            <form action="{{ route('orders.delete', $order->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link p-0">
                                                    <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="Delete">
                                                </button>
                                            </form>

                                            <script>
                                                function confirmDelete() {
                                                    return confirm('Are you sure you want to delete this product?');
                                                }
                                            </script>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
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
