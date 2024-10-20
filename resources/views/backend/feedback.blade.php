<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Details</title>
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
                <h4>Feedback Details</h4>
                <h6>Manage your Feedback Informations</h6>
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
                                <!-- <th>User Id</th> -->
                                <th>Full Name</th>
                                <th>Email </th>
                                <th>Phone no</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($feedback->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center">No data found</td> <!-- colspan adjusted to number of table columns -->
                                </tr>
                            @else

                                @foreach($feedback as $feedback) <!-- Use a different variable name to avoid confusion -->
                                    <tr>
                                        <!-- <td>{{ $feedback->user_id ?? 'Not found' }}</td> -->
                                        <td>{{ $feedback->name ?? 'Not found' }}</td>
                                        <td>{{ $feedback->email ?? 'Not found' }}</td>
                                        <td>{{ $feedback->contact_no ?? 'Not found' }}</td>
                                        <td>{{ $feedback->message ?? 'Not found' }}</td>

                                        <td>
                                            <form action="{{ route('feedback.delete', $feedback->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
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
