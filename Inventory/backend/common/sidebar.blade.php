<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>Dreams Pos admin template</title>


<!-- links -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets_admin/img/favicon.jpg') }}">

<link rel="stylesheet" href="{{ asset('assets_admin/css/bootstrap.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets_admin/css/animate.css') }}">

<link rel="stylesheet" href="{{ asset('assets_admin/css/dataTables.bootstrap4.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets_admin/plugins/fontawesome/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets_admin/plugins/fontawesome/css/all.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets_admin/css/style.css') }}">




</head>
<body>


<div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
<div id="sidebar-menu" class="sidebar-menu">
<ul>
<li class="active">
<a href="{{route('admin.dashboard')}}">
    <<img src="{{ asset('assets_admin/img/icons/dashboard.svg') }}" alt="img">

<span> Dashboard</span> </a>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets_admin/img/icons/product.svg') }}" alt="img">
<span> Product</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="{{route('products.index')}}">Product List</a></li>
<li><a href="{{route('products.create')}}">Add Product</a></li>
<li><a href="categorylist.blade.php">Category List</a></li>
<li><a href="addcategory.blade.php">Add Category</a></li>
<li><a href="subcategorylist.blade.php">Sub Category List</a></li>
<li><a href="subaddcategory.blade.php">Add Sub Category</a></li>
<li><a href="brandlist.blade.php">Brand List</a></li>
<li><a href="addbrand.blade.php">Add Brand</a></li>
<li><a href="importproduct.blade.php">Import Products</a></li>
<li><a href="barcode.blade.php">Print Barcode</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets_admin/img/icons/sales1.svg') }}" alt="img">><span>
Sales</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="saleslist.blade.php">Sales List</a></li>
<li><a href="pos.blade.php">POS</a></li>
<li><a href="pos.blade.php">New Sales</a></li>
<li><a href="salesreturnlists.blade.php">Sales Return List</a></li>
<li><a href="createsalesreturns.blade.php">New Sales Return</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets_admin/img/icons/purchase1.svg') }}" alt="img"><span> Purchase</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="purchaselist.blade.php">Purchase List</a></li>
<li><a href="addpurchase.blade.php">Add Purchase</a></li>
<li><a href="importpurchase.blade.php">Import Purchase</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets_admin/img/icons/expense1.svg') }}" alt="img"><span> Expense</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="expenselist.blade.php">Expense List</a></li>
<li><a href="createexpense.blade.php">Add Expense</a></li>
<li><a href="expensecategory.blade.php">Expense Category</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets_admin/img/icons/quotation1.svg') }}" alt="img"><span> Quotation</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="quotationList.blade.php">Quotation List</a></li>
 <li><a href="addquotation.blade.php">Add Quotation</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets_admin/img/icons/transfer1.svg') }}" alt="img"><span> Transfer</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="transferlist.blade.php">Transfer List</a></li>
<li><a href="addtransfer.blade.php">Add Transfer </a></li>
<li><a href="importtransfer.blade.php">Import Transfer </a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets_admin/img/icons/return1.svg') }}" alt="img"><span> Return</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="salesreturnlist.blade.php">Sales Return List</a></li>
<li><a href="createsalesreturn.blade.php">Add Sales Return </a></li>
<li><a href="purchasereturnlist.blade.php">Purchase Return List</a></li>
<li><a href="createpurchasereturn.blade.php">Add Purchase Return </a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets_admin/img/icons/users1.svg') }}" alt="img"><span> People</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="customerlist.blade.php">Customer List</a></li>
<li><a href="addcustomer.blade.php">Add Customer </a></li>
<li><a href="supplierlist.blade.php">Supplier List</a></li>
<li><a href="addsupplier.blade.php">Add Supplier </a></li>
<li><a href="userlist.blade.php">User List</a></li>
<li><a href="adduser.blade.php">Add User</a></li>
<li><a href="storelist.blade.php">Store List</a></li>
<li><a href="addstore.blade.php">Add Store</a></li>
</ul>
</li> <li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets_admin/img/icons/places.svg') }}" alt="img"><span> Places</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="newcountry.blade.php">New Country</a></li>
<li><a href="countrieslist.blade.php">Countries list</a></li>
<li><a href="newstate.blade.php">New State </a></li>
<li><a href="statelist.blade.php">State list</a></li>
</ul>
</li>
<li>
<a href="components.blade.php"><i data-feather="layers"></i><span> Components</span> </a>
</li>
<li>
<a href="blankpage.blade.php"><i data-feather="file"></i><span> Blank Page</span> </a>
</li>
<li class="submenu">
<a href="javascript:void(0);"><i data-feather="alert-octagon"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="error-404.blade.php">404 Error </a></li>
<li><a href="error-500.blade.php">500 Error </a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><i data-feather="box"></i> <span>Elements </span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="sweetalerts.blade.php">Sweet Alerts</a></li>
<li><a href="tooltip.blade.php">Tooltip</a></li>
<li><a href="popover.blade.php">Popover</a></li>
<li><a href="ribbon.blade.php">Ribbon</a></li>
<li><a href="clipboard.blade.php">Clipboard</a></li>
<li><a href="drag-drop.blade.php">Drag & Drop</a></li>
<li><a href="rangeslider.blade.php">Range Slider</a></li>
<li><a href="rating.blade.php">Rating</a></li>
<li><a href="toastr.blade.php">Toastr</a></li>
<li><a href="text-editor.blade.php">Text Editor</a></li>
<li><a href="counter.blade.php">Counter</a></li>
<li><a href="scrollbar.blade.php">Scrollbar</a></li>
<li><a href="spinner.blade.php">Spinner</a></li>
<li><a href="notification.blade.php">Notification</a></li>
<li><a href="lightbox.blade.php">Lightbox</a></li>
<li><a href="stickynote.blade.php">Sticky Note</a></li>
<li><a href="timeline.blade.php">Timeline</a></li>
<li><a href="form-wizard.blade.php">Form Wizard</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><i data-feather="bar-chart-2"></i> <span> Charts </span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="chart-apex.blade.php">Apex Charts</a></li>
<li><a href="chart-js.blade.php">Chart Js</a></li>
<li><a href="chart-morris.blade.php">Morris Charts</a></li>
<li><a href="chart-flot.blade.php">Flot Charts</a></li>
<li><a href="chart-peity.blade.php">Peity Charts</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><i data-feather="award"></i><span> Icons </span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="icon-fontawesome.blade.php">Fontawesome Icons</a></li>
<li><a href="icon-feather.blade.php">Feather Icons</a></li>
<li><a href="icon-ionic.blade.php">Ionic Icons</a></li>
<li><a href="icon-material.blade.php">Material Icons</a></li>
<li><a href="icon-pe7.blade.php">Pe7 Icons</a></li>
<li><a href="icon-simpleline.blade.php">Simpleline Icons</a></li>
<li><a href="icon-themify.blade.php">Themify Icons</a></li>
<li><a href="icon-weather.blade.php">Weather Icons</a></li>
<li><a href="icon-typicon.blade.php">Typicon Icons</a></li>
<li><a href="icon-flag.blade.php">Flag Icons</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><i data-feather="columns"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="form-basic-inputs.blade.php">Basic Inputs </a></li>
<li><a href="form-input-groups.blade.php">Input Groups </a></li>
<li><a href="form-horizontal.blade.php">Horizontal Form </a></li>
<li><a href="form-vertical.blade.php"> Vertical Form </a></li>
<li><a href="form-mask.blade.php">Form Mask </a></li>
<li><a href="form-validation.blade.php">Form Validation </a></li>
<li><a href="form-select2.blade.php">Form Select2 </a></li>
<li><a href="form-fileupload.blade.php">File Upload </a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><i data-feather="layout"></i> <span> Table </span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="tables-basic.blade.php">Basic Tables </a></li>
<li><a href="data-tables.blade.php">Data Table </a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets_admin/img/icons/product.svg') }}" alt="img"><span> Application</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="chat.blade.php">Chat</a></li>
<li><a href="calendar.blade.php">Calendar</a></li>
<li><a href="email.blade.php">Email</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets_admin/img/icons/time.svg') }}" alt="img"><span> Report</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="purchaseorderreport.blade.php">Purchase order report</a></li>
<li><a href="inventoryreport.blade.php">Inventory Report</a></li>
<li><a href="salesreport.blade.php">Sales Report</a></li>
<li><a href="invoicereport.blade.php">Invoice Report</a></li>
<li><a href="purchasereport.blade.php">Purchase Report</a></li>
<li><a href="supplierreport.blade.php">Supplier Report</a></li>
<li><a href="customerreport.blade.php">Customer Report</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets_admin/img/icons/users1.svg') }}" alt="img"><span> Users</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="newuser.blade.php">New User </a></li>
<li><a href="userlists.blade.php">Users List</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets_admin/img/icons/settings.svg') }}" alt="img"><span> Settings</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="generalsettings.blade.php">General Settings</a></li>
<li><a href="emailsettings.blade.php">Email Settings</a></li>
 <li><a href="paymentsettings.blade.php">Payment Settings</a></li>
<li><a href="currencysettings.blade.php">Currency Settings</a></li>
<li><a href="grouppermissions.blade.php">Group Permissions</a></li>
<li><a href="taxrates.blade.php">Tax Rates</a></li>
</ul>
</li>
</ul>
</div>
</div>
</div>



<!-- javascript links -->
<!-- <script src="{{ asset('assets_admin/js/jquery-3.6.0.min.js') }}"></script>

<script src="{{ asset('assets_admin/js/feather.min.js') }}"></script>

<script src="{{ asset('assets_admin/js/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('assets_admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets_admin/js/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('assets_admin/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets_admin/plugins/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets_admin/plugins/apexchart/chart-data.js') }}"></script>

<script src="{{ asset('assets_admin/js/script.js') }}"></script> -->

</body>
</html>