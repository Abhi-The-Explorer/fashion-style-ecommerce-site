
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart list</title>
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets_admin/img/favicon.jpg') }}">

</head>
<body>

<!-- navbar -->
@include('backend.common.navbar')
<!-- end navbar -->


<!-- siderbar -->
@include('backend.common.sidebar')
 <!-- end sidebar -->
    <!-- content -->
 
    
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Cart List</h4>
                    <h6>Manage your Cart</h6>
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
<!-- 
            @if(session('update'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: relative;">
                    {{ session('update') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="position: absolute; right: 10px; top: 10px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif -->


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User Id</th>
                                    <th>Product Id</th>
                                    <th>Customer`s Name</th>
                                    <th>Product Name</th>
                                    <th>Price Per Product</th>
                                    <th>Quantity</th>
                                    <th>Total Amount Per Product</th>
                                   
                                    <!-- <th>image</th> -->
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            @if($carts->isEmpty())
                                    <tr>
                                        <td colspan="8" class="text-center">No data found</td> <!-- colspan based on number of table columns -->
                                    </tr>
                                @else

                                    @foreach($carts as $carts)
                                    <tr>
                                        <td>{{ $carts->user_id ?? 'Not found'}}</td>
                                        <td>{{ $carts->product_id ?? 'Not found'}}</td>
                                        <td>{{ $carts->name  ?? 'Not found'}}</td>
                                        <td>{{ $carts->product_name ?? 'Not found' }}</td>
                                        <td>{{ $carts->price ?? 'Not found' }}</td>
                                        <td>{{ $carts->quantity ?? 'Not found' }}</td>
                                        <td>{{ $carts->total_amount_per_product ?? 'Not found' }}</td>
                                        
                                        <td>
                                
                                            <a class="me-3" href="{{ route('carts.show', $carts->id) }}">
                                                <img src="{{ asset('assets/img/icons/eye.svg') }}" alt="View">
                                            </a>



                                            <form action="{{ route('carts.delete', $carts->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
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
    </div>


    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
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
