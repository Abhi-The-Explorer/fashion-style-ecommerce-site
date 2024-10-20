

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
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
                    <h4>Product List</h4>
                    <h6>Manage your products</h6>
                </div>

                <div class="page-btn">
                    <a href="{{ route('products.create') }}" class="btn btn-added"><img src="{{ asset('assets/img/icons/plus.svg') }}" alt="Add Product" class="me-1">Add New Product</a>
                </div>
                
            </div>

            <div class="card">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session('update'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: relative;">
                    {{ session('update') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="position: absolute; right: 10px; top: 10px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>SKU</th>
                                    <th>Category</th>
                                    
                                    <th>Price</th>
                                   
                                    <th>Qty</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->name ?? 'not found' }}</td>
                                        <td>{{ $product->sku ?? 'not found'}}</td>
                                        <td>{{ $product->category ?? 'not found' }}</td>
                                       
                                        <td>{{ $product->price ?? 'not found' }}</td>
                                      
                                        <td>{{ $product->qty  ?? 'not found'}}</td>
                                        <td>{{ $product->description ?? 'not found'}}</td>
                                        <td>

                                            <a class="me-3" href="{{ route('products.show', $product->id) }}">
                                                <img src="{{ asset('assets/img/icons/eye.svg') }}" alt="View">
                                            </a>



                                            <a class="me-3" href="{{ route('products.edit', $product->id) }}">
                                                <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="Edit">
                                            </a>

                                            <form action="{{ route('products.delete', $product->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
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
                            </tbody>
                        </table>
                    </div>
<br>
                    <!-- Pagination Links -->
    <div class="pagination">
        {{ $products->links() }}
    </div>
    
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
