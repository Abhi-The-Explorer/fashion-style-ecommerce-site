<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin Dashboard</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets_admin/img/favicon.jpg') }}">
    <link rel="stylesheet" href="{{ asset('assets_admin/css/style.css') }}">
    <style>
        .dash-widget {
            width: 100%;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
            background-color: #f5f6fa;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .dash-widget:hover {
            transform: scale(1.08);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
        }

        .dash-widgetimg {
            margin-bottom: 15px;
        }

        .dash-widgetimg img {
            max-width: 50px;
        }

        .dash-widgetcontent h5 {
            font-size: 28px;
            font-weight: bold;
            margin: 0;
            color: #333;
        }

        .dash-widgetcontent h6 {
            font-size: 18px;
            color: #666;
            margin-top: 8px;
        }

        .datatable th,
        .datatable td {
            text-align: center;
            vertical-align: middle;
        }

        .datatable th {
            background-color: #f5f6fa;
        }

        .datatable tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table-responsive {
            margin-top: 25px;
        }

        .card-title {
            font-size: 22px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    @include('backend.common.navbar')

    <!-- Sidebar -->
    @include('backend.common.sidebar')

    <!-- Main content -->
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget">
                        <div class="dash-widgetimg">
                            <span><img src="assets/img/icons/dash1.svg" alt="Users"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>{{ $totalUsers }}</h5>
                            <h6>Total Users</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget">
                        <div class="dash-widgetimg">
                            <span><img src="assets/img/icons/dash2.svg" alt="Products"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>{{ $totalProducts }}</h5>
                            <h6>Total Products</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget">
                        <div class="dash-widgetimg">
                            <span><img src="assets/img/icons/dash3.svg" alt="Feedbacks"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>{{ $totalFeedbacks }}</h5>
                            <h6>Total Feedbacks</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget">
                        <div class="dash-widgetimg">
                            <span><img src="assets/img/icons/dash4.svg" alt="Orders"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>{{ $totalOrders }}</h5>
                            <h6>Total Proucts Ordered</h6>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Newly Added Products -->
            <div class="card mb-0">
                <div class="card-body">
                    <h4 class="card-title">Newly Added Products</h4>
                    <div class="table-responsive dataview">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>SNo</th>
                                    <th>Product Code</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Category Name</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($newProducts->take(10) as $index => $product)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $product->sku }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->qty }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td>{{ $product->created_at->format('d-m-Y') }}</td>
                                </tr>
                                @endforeach
                                @if($newProducts->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center">No new products found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End content -->
</body>

</html>
