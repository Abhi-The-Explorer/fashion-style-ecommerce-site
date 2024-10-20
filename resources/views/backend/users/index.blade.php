

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
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
                    <h4>User List</h4>
                    <h6>Manage your Users</h6>
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
                                    <th>UserName</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    
                                    <th>Phone No</th>
                                   
                                    <!-- <th>image</th> -->
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($users as $users)
                                    <tr>
                                        <td>{{ $users->username ?? 'Not found'}}</td>
                                        <td>{{ $users->name ?? 'Not found'}}</td>
                                        <td>{{ $users->email  ?? 'Not found'}}</td>
                                        <td>{{ $users->details->phone ?? 'Not found' }}</td>
                                        
                                        <td>
                                
                                            <a class="me-3" href="{{ route('users.show', $users->id) }}">
                                                <img src="{{ asset('assets/img/icons/eye.svg') }}" alt="View">
                                            </a>



                                            <form action="{{ route('users.delete', $users->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
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
