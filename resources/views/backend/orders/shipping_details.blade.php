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
                <h4>Shipping Details</h4>
                <h6>Manage your Shipping Informations</h6>
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

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User Id</th>
                                <!-- <th>Order Id</th> -->
                                <th>Full Name</th>
                                <th>Country </th>
                                <th>Address Line</th>
                                <th>City </th>
                                <th>State</th>
                                <th>Postal Code</th>
                                <th>Phone no</th>
                                <th>Email</th>
                                <th>Additional Information</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($shippingData->isEmpty())
                                <tr>
                                    <td colspan="12" class="text-center">No data found</td> <!-- colspan adjusted to number of table columns -->
                                </tr>
                            @else

                                @foreach($shippingData as $shippingData) <!-- Use a different variable name to avoid confusion -->
                                    <tr>
                                        <td>{{ $shippingData->user_id ?? 'Not found' }}</td>
                                        <!-- <td>{{ $shippingData->order_id ?? 'Not found' }}</td> -->
                                        <td>{{ $shippingData->full_name ?? 'Not found' }}</td>
                                        <td>{{ $shippingData->country ?? 'Not found' }}</td>
                                        <td>{{ $shippingData->address_line ?? 'Not found' }}</td>
                                        <td>{{ $shippingData->city ?? 'Not found' }}</td>
                                        <td>{{ $shippingData->state ?? 'Not found' }}</td>
                                        <td>{{ $shippingData->postcode ?? 'Not found' }}</td>
                                        <td>{{ $shippingData->phone ?? 'Not found' }}</td>
                                        <td>{{ $shippingData->email ?? 'Not found' }}</td>
                                        <td>{{ $shippingData->additional_info ?? 'Not found' }}</td>

                                      

                                        <td>
                                            <form action="{{ route('shipping_details.delete', $shippingData->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
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
