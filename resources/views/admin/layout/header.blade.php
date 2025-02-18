

<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\URL;

$id = Session()->get('id');
$UserData = UserController::getUserById($id);
$users = json_decode($UserData, true);
$type = Session()->get('type');

?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--favicon-->
	<link rel="icon" href="{{URL::asset('public/images/3borslogo.jpg')}}" type="image/png" />
	<!--plugins-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="{{URL::asset('public/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
	<link href="{{URL::asset('public/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{URL::asset('public/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{URL::asset('public/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{URL::asset('public/assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{URL::asset('public/assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{URL::asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{URL::asset('public/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{URL::asset('public/assets/css/app.css')}}" rel="stylesheet">
	<link href="{{URL::asset('public/assets/css/icons.css')}}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{URL::asset('public/assets/css/dark-theme.css')}}" />
	<link rel="stylesheet" href="{{URL::asset('public/assets/css/semi-dark.css')}}" />
	<link rel="stylesheet" href="{{URL::asset('public/assets/css/header-colors.css')}}" />
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<!-- Styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<!-- Or for RTL support -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
	<title>3Bros</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<a href="{{URL::to('/')}}"><img src="{{URL::asset('public/images/3borslogo.jpg')}}" class="logo-icon" alt="logo icon"></a>
				</div>
				<div>
					<a href="{{URL::to('/')}}"><h4 class="logo-text">#3BROS</h4></a>
					<!-- <a href="{{URL::to('/')}}"><p class="text-left logo-text"><small>TECHNOLOGIES</small></p></a> -->
				</div>

				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">

				<li class="menu-label">Dashboard</li>
					<!-- <li>
						<a href="javascript:();" class="has-arrow">
							<div class="parent-icon"><i class="fa fa-users"></i>
							</div>
							<div class="menu-title">Customers</div>
						</a>
						<ul>
							<li> <a href="/AddCustomer"><i class="fa fa-angle-right"></i>Add Customers</a>
							</li>
							<li> <a href="/CustomersList"><i class="fa fa-angle-right"></i>Customers List</a>
							</li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Group Customers</a>
							</li>

						</ul>
					</li>
					<li>
						<a href="javascript:();" class="has-arrow">
							<div class="parent-icon"><i class="fa fa-exchange"></i>
							</div>
							<div class="menu-title">Transaction</div>
						</a>
						<ul>
							<li> <a href="#"><i class="fa fa-angle-right"></i>New Deposit</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>New Expense</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Transfer</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>View transaction</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Balance Sheet</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Transfer Report</a></li>
						</ul>
					</li>
				
					<li>
						<a href="javascript:();" class="has-arrow">
							<div class="parent-icon"><i class="fa fa-line-chart"></i>
							</div>
							<div class="menu-title">Sales</div>
						</a>
						<ul>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Invoices</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>New Invoices</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Recurring invoices</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>New Recurring invoices</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Quotes</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Payments</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Tax Rates</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Tax Return</a></li>
						</ul>
					</li>
					<li>
						<a href="javascript:();" class="has-arrow">
							<div class="parent-icon"><i class="fa fa-tasks"></i>
							</div>
							<div class="menu-title">Tasks</div>
						</a>
						<ul>
							<li> <a href="/user/task"><i class="fa fa-angle-right"></i>My Task</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Archive Task</a></li>
						</ul>
					</li>
					<li>
						<a href="javascript:();" class="has-arrow">
							<div class="parent-icon"><i class="fa fa-shopping-bag"></i>
							</div>
							<div class="menu-title">Accounting</div>
						</a>
						<ul>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Client Payment</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Expense Management</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Expense Category</a></li>
						</ul>
					</li>
					<li>
						<a href="javascript:();" class="has-arrow">
							<div class="parent-icon"><i class="fa fa-flag"></i>
							</div>
							<div class="menu-title">Report</div>
						</a>
						<ul>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Project Report</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Client Report</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Expense Report</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Income Expense Comparesion</a></li>
						</ul>
					</li>
					<li>
						<a href="javascript:();" class="has-arrow">
							<div class="parent-icon"><i class="fa fa-bell"></i>
							</div>
							<div class="menu-title">Attendance</div>
						</a>
						<ul>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Time History</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Time Change Request</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Attendance Report</a></li>

						</ul>
					</li>
					<li>
						<a href="javascript:();" class="has-arrow">
							<div class="parent-icon"><i class="fa fa-pencil-square-o"></i>
							</div>
							<div class="menu-title">Recruitment</div>
						</a>
						<ul>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Jobs Posted</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Jobs Application</a></li>
						</ul>
					</li>
					<li>
						<a href="javascript:();" class="has-arrow">
							<div class="parent-icon"><i class="fa fa-shopping-basket"></i>
							</div>
							<div class="menu-title">Payroll</div>
						</a>
						<ul>
							<li> <a href="/payroll/employeeconfig"><i class="fa fa-angle-right"></i>Employee Configuration</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Hourly</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Manage Salary</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Employee salary list</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Make Payment</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Generate Payslip</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Payroll Summary</a></li>
						</ul>
					</li>
					<li>
						<a href="javascript:();" class="has-arrow">
							<div class="parent-icon"><i class="fa fa-bitbucket-square"></i>
							</div>
							<div class="menu-title">Stock</div>
						</a>
						<ul>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Stock Category</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Manage Stock</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Assign Stock</a></li>
						</ul>
					</li>
					<li>
						<a href="javascript:();" class="has-arrow">
							<div class="parent-icon"><i class="fa fa-ticket"></i>
							</div>
							<div class="menu-title">Tickets</div>
						</a>
						<ul>
							<li> <a href="/ticket" ><i class="fa fa-angle-right"></i>All Tickets</a></li>
							<li> <a href="javascript:void(0)" onclick="getAllNewTickets(1);"><i class="fa fa-angle-right"></i>New Tickets</a></li>
							<li> <a href="javascript:void(0)" onclick="getAllNewTickets(2);"><i class="fa fa-angle-right"></i>Inprocess Tickets</a></li>
							<li> <a href="javascript:void(0)" onclick="getAllNewTickets(4);"><i class="fa fa-angle-right"></i>Closed Tickets</a></li>
							<li> <a href="javascript:void(0)" onclick="getAllNewTickets(5);"><i class="fa fa-angle-right"></i>Reopen Tickets</a></li>
						</ul>
					</li>
					<li>
						<a href="javascript:();" class="has-arrow">
							<div class="parent-icon"><i class="fa fa-bell"></i>
							</div>
							<div class="menu-title">Utilities</div>
						</a>
						<ul>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Activity Log</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Email Message Log</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>System Status</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Browser Logs</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>Website Logs</a></li>
							<li> <a href="#"><i class="fa fa-angle-right"></i>CRM Logs</a></li>
						</ul>
					</li>-->
					@if($type=='super admin' || $type=='admin')
					<li>
						<a href="javascript:();" class="has-arrow">
							<div class="parent-icon"><i class="fa fa fa-user-circle"></i>
							</div>
							<div class="menu-title">Manage User</div>
						</a>
							<ul>
								<li> <a href="/user/list"><i class="bx bx-right-arrow-alt"></i>All Users</a></li>
									<li> <a href="/user/add"><i class="bx bx-right-arrow-alt"></i>Add User</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash User</a></li>
							</ul>
					</li>
					<li>
						<a href="javascript:();" class="has-arrow">
							<div class="parent-icon"><i class="fa fa fa-cogs"></i>
							</div>
							<div class="menu-title">Manage Permission</div>
						</a>
							<ul>
								<li> <a href="/permission/list"><i class="bx bx-right-arrow-alt"></i>All Users Permission</a></li>
									<li> <a href="/permission/add"><i class="bx bx-right-arrow-alt"></i>Add User Permission</a></li>
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash User</a></li> -->
							</ul>
					</li>
					<li>
						<a href="javascript:();" class="has-arrow">
							<div class="parent-icon"><i class="fa fa fa-cogs"></i>
							</div>
							<div class="menu-title">Manage Modules</div>
						</a>
							<ul>
								<li> <a href="/module/list"><i class="bx bx-right-arrow-alt"></i>All Modules</a></li>
									<li> <a href="/module/add"><i class="bx bx-right-arrow-alt"></i>Add Modules</a></li>
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash User</a></li> -->
							</ul>
					</li>
					@endif 
					
					<li>
						<a href="javascript:();" class="has-arrow">
							<div class="parent-icon"><i class="fa fa-globe"></i>
							</div>
							<div class="menu-title">Manage Website</div>
						</a>
						<ul>
							<!-- <li><a class="has-arrow" href="javascript:();">Manege Menu</a>
								<ul>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Add Menu</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Edit Menu</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Delete Menu</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash Menu</a></li>
								</ul>
							</li>
							<li> <a class="has-arrow" href="#">Manege Web Pages</a>
								<ul>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Add Pages</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Edit Pages</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Delete Pages</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash Pages</a></li>
								</ul>
							</li>
							<li> <a class="has-arrow" href="#">Manege Slider</a>
								<ul>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Add Slider</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Edit Slider</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Delete Slider</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash Slider</a></li>
								</ul>
							</li>
							<li> <a class="has-arrow" href="#">Manege Flyer</a>
								<ul>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Add Flyer</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Edit Flyer</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Delete Flyer</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash Flyer</a></li>
								</ul>
							</li>
							<li> <a class="has-arrow" href="#">Manege Event Gallery</a>
								<ul>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Add Gallery</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Edit Gallery</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Delete Gallery</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash Gallery</a></li>
								</ul>
							</li>
							<li> <a class="has-arrow" href="#">Manege Main Gallery</a>
								<ul>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Add Gallery</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Edit Gallery</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Delete Gallery</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash Gallery</a></li>
								</ul>
							</li>
							<li> <a class="has-arrow" href="#">Manege Notice</a>
								<ul>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Add Notice</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Edit Notice</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Delete Notice</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash Notice</a></li>
								</ul>
							</li>
							<li> <a class="has-arrow" href="#">Manege News</a>
								<ul>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Add News</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Edit News</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Delete News</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash News</a></li>
								</ul>
							</li>
							<li> <a class="has-arrow" href="#">Manege Circuler</a>
								<ul>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Add Circuler</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Edit Circuler</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Delete Circuler</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash Circuler</a></li>
								</ul>
							</li>
							<li> <a class="has-arrow" href="#">Manege Events</a>
								<ul>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Add Events</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Edit Events</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Delete Events</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash Events</a></li>
								</ul>
							</li>
							<li> <a class="has-arrow" href="#">Manege Awords</a>
								<ul>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Add Awords</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Edit Awords</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Delete Awords</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash Awords</a></li>
								</ul>
							</li>
							<li> <a class="has-arrow" href="#">Manege Achivements</a>
								<ul>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Add Achivements</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Edit Achivements</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Delete Achivements</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash Achivements</a></li>
								</ul>
							</li>
							<li> <a class="has-arrow" href="#">Manege Video Gallery </a>
								<ul>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Add Video</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Edit Video</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Delete Video</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash Video</a></li>
								</ul>
							</li>
							<li> <a class="has-arrow" href="#">Manege Media Gallery </a>
								<ul>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Add Media</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Edit Media</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Delete Media</a></li>
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash Media</a></li>
								</ul>
							</li> -->
							<li> <a class="has-arrow" href="#">Manege Menu</a>
								<ul>
									<li> <a href="/admin/menu/listmenu"><i class="bx bx-right-arrow-alt"></i>All Menu</a></li>
									<li> <a href="/admin/menu/add"><i class="bx bx-right-arrow-alt"></i>Add Menu</a></li>
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Edit Blogs</a></li> -->
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Delete Blogs</a></li> -->
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash Blogs</a></li> -->
								</ul>
							</li>
							<li> <a class="has-arrow" href="#">Manege Pages</a>
								<ul>
									<li> <a href="/admin/page/listpage"><i class="bx bx-right-arrow-alt"></i>All Pages</a></li>
									<li> <a href="/admin/page/add"><i class="bx bx-right-arrow-alt"></i>Add Page</a></li>
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Edit Blogs</a></li> -->
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Delete Blogs</a></li> -->
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash Blogs</a></li> -->
								</ul>
							</li>
							<li> <a class="has-arrow" href="#">Manege Blog</a>
								<ul>
									<li> <a href="/admin/blog/list"><i class="bx bx-right-arrow-alt"></i>All Blog</a></li>
									<li> <a href="/admin/blog/add"><i class="bx bx-right-arrow-alt"></i>Add Blog</a></li>
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Edit Blogs</a></li> -->
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Delete Blogs</a></li> -->
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash Category</a></li> -->
								</ul>
							</li>
							<li> <a class="has-arrow" href="#">Manege Places</a>
								<ul>
									<li> <a href="/admin/place/list"><i class="bx bx-right-arrow-alt"></i>All Places</a></li>
									<li> <a href="/admin/place/add"><i class="bx bx-right-arrow-alt"></i>Add Place</a></li>
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Edit Blogs</a></li> -->
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Delete Blogs</a></li> -->
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash Brand</a></li> -->
								</ul>
							</li>
							<li> <a class="has-arrow" href="#">Manege Categories</a>
								<ul>
									<li> <a href="/admin/category/list"><i class="bx bx-right-arrow-alt"></i>All Categories</a></li>
									<li> <a href="/admin/category/add"><i class="bx bx-right-arrow-alt"></i>Add Category</a></li>
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Edit Blogs</a></li> -->
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Delete Blogs</a></li> -->
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash Projects</a></li> -->
								</ul>
							</li>
							<li> <a class="has-arrow" href="#">Manege Gallery</a>
								<ul>
									<li> <a href="/admin/gallery/list"><i class="bx bx-right-arrow-alt"></i>All Gallery</a></li>
									<li> <a href="/admin/gallery/add"><i class="bx bx-right-arrow-alt"></i>Add Gallery</a></li>
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Edit Blogs</a></li> -->
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Delete Blogs</a></li> -->
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash Projects</a></li> -->
								</ul>
							</li>
							<li> <a class="has-arrow" href="#">Manege Events</a>
								<ul>
									<li> <a href="/admin/event/list"><i class="bx bx-right-arrow-alt"></i>All Events</a></li>
									<li> <a href="/admin/event/add"><i class="bx bx-right-arrow-alt"></i>Add Event</a></li>
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Edit Blogs</a></li> -->
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Delete Blogs</a></li> -->
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash Projects</a></li> -->
								</ul>
							</li>
							<li> <a class="has-arrow" href="#">Manege Footer Menu</a>
								<ul>
									<li> <a href="/admin/footermenu/list"><i class="bx bx-right-arrow-alt"></i>Footer Menu List</a></li>
									<li> <a href="/admin/footermenu/add"><i class="bx bx-right-arrow-alt"></i>Add Footer Menu</a></li>
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Delete Testimonials</a></li> -->
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash Testimonials</a></li> -->
								</ul>
							</li>
						</ul>
					</li>
					
					@if($type!='site manager')
					<li>
						<a href="javascript:();" class="has-arrow">
							<div class="parent-icon"><i class="fa fa fa-cogs"></i>
							</div>
							<div class="menu-title">Task Report</div>
						</a>
							<ul>
								<li> <a href="/report/add"><i class="bx bx-right-arrow-alt"></i>Add Report</a></li>
									<li> <a href="/report/myreport"><i class="bx bx-right-arrow-alt"></i>My Reports</a></li>
									@if($type=='super admin')
									<li> <a href="/report/allreport"><i class="bx bx-right-arrow-alt"></i>All User's Reports</a></li>
									@endif
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash User</a></li> -->
							</ul>
					</li>
					@endif
					@if($type=='site manager' || $type=='super admin')
							<li> <a class="has-arrow" href="#">Manege Site Blogs</a>
								<ul>
									<li> <a href="/siteblog/list"><i class="bx bx-right-arrow-alt"></i>All Site Blogs</a></li>
									<li> <a href="/siteblog/add"><i class="bx bx-right-arrow-alt"></i>Add Site Blog</a></li>
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Edit Blogs</a></li> -->
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Delete Blogs</a></li> -->
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash Blogs</a></li> -->
								</ul>
							</li>
							<li> <a class="has-arrow" href="#">Manege Category</a>
								<ul>
									<li> <a href="/category/list"><i class="bx bx-right-arrow-alt"></i>All Category</a></li>
									<li> <a href="/category/add"><i class="bx bx-right-arrow-alt"></i>Add Category</a></li>
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Edit Blogs</a></li> -->
									<!-- <li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Delete Blogs</a></li> -->
									<li> <a href="javascript:();"><i class="bx bx-right-arrow-alt"></i>Trash Category</a></li>
								</ul>
							</li>
							@endif
					<!-- <li>
						<a href="#">
							<div class="parent-icon"><i class="fa fa-stop-circle"></i>
							</div>
							<div class="menu-title">Public Holiday</div>
						</a>
					</li>
					<li>
						<a href="javascript:();" class="has-arrow">
							<div class="parent-icon"><i class="fa fa-user-circle"></i>
							</div>
							<div class="menu-title">Users</div>
						</a>
						<ul>
							<li> <a href="/Users"><i class="fa fa-angle-right"></i>User List</a></li>
							<li> <a href="/Permissions"><i class="fa fa-angle-right"></i>User Permissions</a></li>
							 <li> <a href="/module"><i class="fa fa-angle-right"></i>Module</a></li> -->
						<!--<li> <a href="#"><i class="fa fa-angle-right"></i>Email  Settings</a></li>
						<li> <a href="#"><i class="fa fa-angle-right"></i>Payment Settings</a></li>
						<li> <a href="#"><i class="fa fa-angle-right"></i>Website Settings</a></li> -->
						<!-- </ul>
					</li> -->
					<!-- <li>
						<a href="javascript:();" class="has-arrow">
							<div class="parent-icon"><i class="fa fa-user-circle"></i>
							</div>
							<div class="menu-title">Product</div>
						</a>
						<ul>
							<li> <a href="/productDetail"><i class="fa fa-angle-right"></i>Product Detail</a></li>
							<li> <a href="/productCategory"><i class="fa fa-angle-right"></i>Product Category</a></li>
							
						</ul>
					</li>
					<li>
						<a href="/employee" class="">
							<div class="parent-icon"><i class="fa fa-user-circle"></i>
							</div>
							<div class="menu-title">Employee</div>
						</a>
					</li>
					<li>
						<a href="#">
							<div class="parent-icon"><i class="fa fa-file-o"></i>
							</div>
							<div class="menu-title">Items</div>
						</a>
					</li>
					<li>
						<a href="/department">
							<div class="parent-icon"><i class="fa fa-tree"></i>
							</div>
							<div class="menu-title">Departments</div>
						</a>
					</li>
					<li>
						<a href="/designation">
							<div class="parent-icon"><i class="fa fa-user-circle"></i>
							</div>
							<div class="menu-title">Designation</div>
						</a>
					</li>
					<li>
						<a href="#">
							<div class="parent-icon"><i class="fa fa-clock-o"></i>
							</div>
							<div class="menu-title">Training</div>
						</a>
					</li>
					<li>
						<a href="calender.php">
							<div class="parent-icon"><i class="fa fa-calendar"></i>
							</div>
							<div class="menu-title">Calender</div>
						</a>
					</li>
					<li>
						<a href="#">
							<div class="parent-icon"><i class="fa fa-file-text"></i>
							</div>
							<div class="menu-title">Notice Board</div>
						</a>
					</li>
					<li>
						<a href="#">
							<div class="parent-icon"><i class="fa fa-product-hunt"></i>
							</div>
							<div class="menu-title">Products</div>
						</a>
					</li>
					<li>
						<a href="/email">
							<div class="parent-icon"><i class="fa fa-envelope-o"></i>
							</div>
							<div class="menu-title">Mails</div>
						</a>
					</li>
					<li>
						<a href="chat.php">
							<div class="parent-icon"><i class="fa fa-comment"></i>
							</div>
							<div class="menu-title">Chats</div>
						</a>
					</li>
					<li>
						<a href="#">
							<div class="parent-icon"><i class="bx bx-folder"></i>
							</div>
							<div class="menu-title">Documentation</div>
						</a>
					</li>
					<li>
						<a href="#">
							<div class="parent-icon"><i class="bx bx-support"></i>
							</div>
							<div class="menu-title">Support</div>
						</a>
					</li> -->
				
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->


		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#"> <i class='bx bx-search'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class='bx bx-category'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div class="row row-cols-3 g-3 p-3">
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-cosmic text-white"><i class='bx bx-group'></i>
											</div>
											<div class="app-title">Teams</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-burning text-white"><i class='bx bx-atom'></i>
											</div>
											<div class="app-title">Projects</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-lush text-white"><i class='bx bx-shield'></i>
											</div>
											<div class="app-title">Tasks</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-kyoto text-dark"><i class='bx bx-notification'></i>
											</div>
											<div class="app-title">Feeds</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-blues text-dark"><i class='bx bx-file'></i>
											</div>
											<div class="app-title">Files</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-moonlit text-white"><i class='bx bx-filter-alt'></i>
											</div>
											<div class="app-title">Alerts</div>
										</div>
									</div>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									 <!-- <span class="alert-count"></span> -->
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
															ago</span></h6>
													<p class="msg-info">5 new user registered</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i class="bx bx-cart-alt"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
															ago</span></h6>
													<p class="msg-info">You have recived new orders</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i class="bx bx-file"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min
															ago</span></h6>
													<p class="msg-info">The pdf files generated</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-warning text-warning"><i class="bx bx-send"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Time Response <span class="msg-time float-end">28 min
															ago</span></h6>
													<p class="msg-info">5.1 min avarage time response</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-info text-info"><i class="bx bx-home-circle"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Product Approved <span class="msg-time float-end">2 hrs ago</span></h6>
													<p class="msg-info">Your new product has approved</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i class="bx bx-message-detail"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Comments <span class="msg-time float-end">4 hrs
															ago</span></h6>
													<p class="msg-info">New customer comments recived</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i class='bx bx-check-square'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
															ago</span></h6>
													<p class="msg-info">Successfully shipped your item</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class='bx bx-user-pin'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
															ago</span></h6>
													<p class="msg-info">24 new authors joined last week</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-warning text-warning"><i class='bx bx-door-open'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
															ago</span></h6>
													<p class="msg-info">45% less alerts last 4 weeks</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Notifications</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
									<!-- <span class="alert-count"></span> -->
									<i class='bx bx-comment'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Messages</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="/assets/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
															ago</span></h6>
													<p class="msg-info">The standard chunk of lorem</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="/assets/images/avatars/avatar-2.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
															sec ago</span></h6>
													<p class="msg-info">Many desktop publishing packages</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="/assets/images/avatars/avatar-3.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Oscar Garner <span class="msg-time float-end">8 min
															ago</span></h6>
													<p class="msg-info">Various versions have evolved over</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="/assets/images/avatars/avatar-4.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Katherine Pechon <span class="msg-time float-end">15
															min ago</span></h6>
													<p class="msg-info">Making this the first true generator</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="/assets/images/avatars/avatar-5.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Amelia Doe <span class="msg-time float-end">22 min
															ago</span></h6>
													<p class="msg-info">Duis aute irure dolor in reprehenderit</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="/assets/images/avatars/avatar-6.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Cristina Jhons <span class="msg-time float-end">2 hrs
															ago</span></h6>
													<p class="msg-info">The passage is attributed to an unknown</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="/assets/images/avatars/avatar-7.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">James Caviness <span class="msg-time float-end">4 hrs
															ago</span></h6>
													<p class="msg-info">The point of using Lorem</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="/assets/images/avatars/avatar-8.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6 hrs
															ago</span></h6>
													<p class="msg-info">It was popularised in the 1960s</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="/assets/images/avatars/avatar-9.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">David Buckley <span class="msg-time float-end">2 hrs
															ago</span></h6>
													<p class="msg-info">Various versions have evolved over</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="/assets/images/avatars/avatar-10.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Thomas Wheeler <span class="msg-time float-end">2 days
															ago</span></h6>
													<p class="msg-info">If you are going to use a passage</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="/assets/images/avatars/avatar-11.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Johnny Seitz <span class="msg-time float-end">5 days
															ago</span></h6>
													<p class="msg-info">All the Lorem Ipsum generators</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Messages</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="<?php if(isset($users['data'][0])){echo '/public/'.$users['data'][0]['profile_photo_path'];}  ?>" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0"><?php if(isset($users['data'][0])){echo $users['data'][0]['name'] ;}?></p>
								<p class="designattion mb-0"></p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="/UserProfile"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li><a class="dropdown-item" href="/"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="admin/Logout"><i class='bx bx-log-out-circle'></i><span><form method="POST" action="{{ route('admin/logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('admin/logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form></span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
