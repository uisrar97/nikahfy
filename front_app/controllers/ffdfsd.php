<?php
include('pages/charts/config.php');
SESSION_START();
if(!isset($_SESSION['user_id']))
{

	echo('<script type="text/javascript">
							window.location="login.php";
							</script>');

}
$stmt = $conn->prepare("select * from baraka_users_tbl");

$stmt->execute();
$users=0;
while($stmt->fetch()){
	$users++;
}
$stmt = $conn->prepare("select * from baraka_companies_tbl");

$stmt->execute();
$comp=0;
while($stmt->fetch()){
	$comp++;
}

$stmt = $conn->prepare("select * from baraka_categories");

$stmt->execute();
$cat=0;
while($stmt->fetch()){
	$cat++;
}
$stmt = $conn->prepare("select * from baraka_countries");

$stmt->execute();
$count=0;
while($stmt->fetch()){
	$count++;
}



$stmt = $conn->prepare("SELECT a.id,a.best_status,b.category_title,a.company_CompanyName,a.company_ManagerName,a.company_MobileNumber,a.company_logo,a.company_CompanyEmail,a.company_UserName,a.company_City,a.company_Country,a.company_Category,a.status FROM baraka_companies_tbl a join baraka_categories b WHERE a.company_Category=b.id");
$stmt->execute();
$stmt->bind_result($id,$best_status,$category_title,$company_CompanyName,$company_ManagerName,$company_MobileNumber,$company_logo,$company_CompanyEmail,$company_UserName,$company_City,$company_Country,$company_Category,$status);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>baraka</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
	<!-- Morris chart -->
	<link rel="stylesheet" href="plugins/morris/morris.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


	<style>
		.switch {
			position: relative;
			display: inline-block;
			width: 45px;
			height: 24px;
		}

		.switch input {display:none;}

		.slider {
			position: absolute;
			cursor: pointer;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: #ccc;
			-webkit-transition: .4s;
			transition: .4s;
		}

		.slider:before {
			position: absolute;
			content: "";
			height: 16px;
			width: 16px;
			left: 4px;
			bottom: 4px;
			background-color: white;
			-webkit-transition: .4s;
			transition: .4s;
		}

		input:checked + .slider {
			background-color: #2196F3;
		}

		input:focus + .slider {
			box-shadow: 0 0 1px #2196F3;
		}

		input:checked + .slider:before {
			-webkit-transform: translateX(26px);
			-ms-transform: translateX(26px);
			transform: translateX(26px);
		}

		/* Rounded sliders */
		.slider.round {
			border-radius: 24px;
		}

		.slider.round:before {
			border-radius: 50%;
		}
	</style>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
		<!-- Left navbar links <i class="fa fa-sign-out" aria-hidden="true"></i> -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
			</li>

		</ul>

		<ul class="navbar-nav ml-auto">
			<!-- Messages Dropdown Menu -->
			<li>
				<a href="logout.php"><i style="color:red" class="fa fa-sign-out " aria-hidden="true"></i></a>
			</li>
			<!-- Notifications Dropdown Menu -->


		</ul>

	</nav>

	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->


		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
				</div>
				<div class="info">
					<a href="#" class="d-block">ADMIN</a>
				</div>
			</div>

			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<!-- Add icons to the links using the .nav-icon class
						 with font-awesome or any other icon font library -->
					<li class="nav-item has-treeview menu-open">
						<a href="index.php">

							<p>
								Dashboard

							</p>
						</a>

					</li>

					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-pie-chart"></i>
							<p>
								Cateogries
								<i class="right fa fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="pages/charts/addcat.php" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Add New</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="pages/charts/listcat.php" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>List</p>
								</a>
							</li>

						</ul>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-tree"></i>
							<p>
								Country/City
								<i class="fa fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="pages/charts/listcountry.php" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Country</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="pages/charts/listcity.php" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>City</p>
								</a>
							</li>

						</ul>
					</li>
					<li class="nav-item has-treeview">
						<a href="pages/charts/users.php" class="nav-link">
							<i class="nav-icon fa fa-edit"></i>
							<p>
								Users
								<i class="fa fa-angle-left right"></i>
							</p>
						</a>

					</li>
					<li class="nav-item has-treeview">
						<a href="index.php" class="nav-link">
							<i class="nav-icon fa fa-edit"></i>
							<p>
								Companies
								<i class="fa fa-angle-left right"></i>
							</p>
						</a>

					</li>
					<?php if ($_SESSION['addeals']==1){ ?>
						<li class="nav-item has-treeview">
							<a href="pages/charts/deals.php" class="nav-link">
								<i class="nav-icon fa fa-edit"></i>
								<p>
									Deals
									<i class="fa fa-angle-left right"></i>
								</p>
							</a>

						</li> <?php } ?>
					<?php if ($_SESSION['user_id']==1){ ?>


						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fa fa-user"></i>
								<p>
									Admin
									<i class="fa fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="pages/charts/settings.php" class="nav-link">
										<i class="fa fa-circle-o nav-icon"></i>
										<p>	Add Admin</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="pages/charts/listadmin.php" class="nav-link">
										<i class="fa fa-circle-o nav-icon"></i>
										<p>Add List</p>
									</a>
								</li>

							</ul>
						</li>
					<?php } ?>
				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">

		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark">Dashboard</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Dashboard </li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<!-- Small boxes (Stat box) -->
				<div class="row">
					<div class="col-lg-3 col-6">
						<!-- small box -->
						<div class="small-box bg-info">
							<div class="inner">
								<h3><?php echo $users;?></h3>

								<p>TOTAL USERS</p>
							</div>
							<div class="icon">
								<i class="ion ion-person-add"></i>
							</div>

						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-6">
						<!-- small box -->
						<div class="small-box bg-success">
							<div class="inner">
								<h3><?php echo $comp;?><sup style="font-size: 20px"></sup></h3>

								<p>TOTAL COMPANIES</p>
							</div>
							<div class="icon">
								<i class="ion ion-stats-bars"></i>
							</div>

						</div>
					</div>

					<!-- ./col -->
					<div class="col-lg-3 col-6">
						<!-- small box -->
						<div class="small-box bg-warning">
							<div class="inner">
								<h3  style="color:white"><?php echo $cat;?></h3>

								<p style="color:white">TOTAL CATEGORIES</p>
							</div>
							<div class="icon">
								<i class="ion ion-bag"></i>
							</div>

						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-6">
						<!-- small box -->
						<div class="small-box bg-danger">
							<div class="inner">
								<h3><?php echo $count;?></h3>

								<p>TOTAL COUNTRIES</p>
							</div>
							<div class="icon">
								<i class="ion ion-pie-graph"></i>
							</div>

						</div>
					</div>
					<!-- ./col -->
				</div>
				<!-- /.row -->
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">All Companies</h3>
					</div>
				</div>
				<!-- Main row -->
				<div class="row">
					<!-- Left col -->

					<table id="example" class="table table-striped table-bordered">
						<thead>
						<tr>
							<th>No</th>
							<th>CompanyName</th>
							<th>ManagerName</th>
							<th>Mobile#</th>
							<th>UserName</th>
							<th>City</th>
							<th>Country</th>
							<th>Category</th>
							<th>CategoryTitle</th>
							<th>Email</th>
							<th>Status</th>
							<th>Logo</th>
							<th>Action</th>

						</tr>
						</thead>
						<tbody>
						<?php $count=1;
						while($stmt->fetch()){
							?>

							<tr id="<?php echo  $id;?>">
								<td><?php echo  $count;?></td>
								<td><?php echo  $company_CompanyName;?></td>
								<td><?php echo $company_ManagerName;?></td>
								<td><?php echo $company_MobileNumber;?></td>
								<td><?php echo $company_UserName;?></td>
								<td><?php echo $company_City;?></td>
								<td><?php echo $company_Country;?></td>
								<td><?php echo $company_Category;?></td>

								<td><?php echo $category_title;?></td>
								<td><?php echo $company_CompanyEmail;?></td>
								<td><?php echo $status;?></td>
								<td><?php echo $company_logo;?></td>


								<?php if($status==1){?>
									<td><label class="switch">
											<input type="checkbox" onchange='changeapprovel("<?php echo $id?> ",this.value)' value="0" checked>
											<span class="slider round"></span>
										</label>
										<a href='javascript:deleteUser("<?php echo  $id;?>")' >
											<span style="color:red" class='fa fa-times fa-1x' aria-hidden='true' ></span>
										</a><br>
										<a href='javascript:editcomp("<?php echo  $id;?>")'><span  style="color:blue" class='fa fa-1x fa-pencil-square-o' aria-hidden='true' ></span></a>
										<br>
										<?php if($best_status==1){ ?>
											<a title="It's Best" href='javascript:makeitbest("<?php echo  $id;?>")' style="color:green"><i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i></a>

										<?php }else{ ?>
											<a title="Make It Best" href='javascript:makeitbest("<?php echo  $id;?>")' style="color:black"><i class="fa fa-thumbs-down fa-1x" aria-hidden="true"></i></a>
										<?php } ?>
									</td>
								<?php }else { ?>
									<td><label class="switch">
											<input type="checkbox" onchange='changeapprovel("<?php echo $id?> ",this.value)' value="1">
											<span class="slider round"></span>
										</label>
										<a href='javascript:deleteUser("<?php echo  $id;?>")' >
											<span style="color:red" class='fa fa-times fa-1x' aria-hidden='true' ></span>
										</a>
										<br>
										<a href='javascript:editcomp("<?php echo  $id;?>")'><span  style="color:blue" class='fa fa-1x fa-pencil-square-o' aria-hidden='true' ></span></a>
										<br>
										<?php if($best_status==1){ ?>
											<a title="It's Best" href='javascript:makeitbest("<?php echo  $id;?>")' style="color:green"><i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i></a>

										<?php }else{ ?>
											<a title="Make It Best" href='javascript:makeitbest("<?php echo  $id;?>")' style="color:black"><i class="fa fa-thumbs-down fa-1x" aria-hidden="true"></i></a>
										<?php } ?>
									</td>

								<?php } ?>

							</tr>


							<?php $count++; } ?>


						</tbody>
						<tfoot>
						<tr>
							<th>No</th>
							<th>CompanyName</th>
							<th>ManagerName</th>
							<th>Mobile#</th>
							<th>UserName</th>
							<th>City</th>
							<th>Country</th>
							<th>Category</th>
							<th>CategoryTitle</th>
							<th>Email</th>
							<th>Status</th>
							<th>Logo</th>
							<th>Action</th>

						</tr>
						</tfoot
					</table>
					<!-- right col -->
				</div>
				<!-- /.row (main row) -->
			</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->


	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
	</aside>
	<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>



<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            "scrollY": 600,
            "scrollX": true
        } );} );
</script>

<script>
    function changeapprovel(id ,value) {

        window.location.href='pages/charts/del_user.php?statusid=' + id + '&statusvalue=' + value;
    }
</script>
<script>
    function makeitbest(id) {
        window.location.href='pages/charts/function.php?makebestid=' + id,true;


    }
</script>
<script>
    function deleteUser(id) {
        if(confirm('Are you sure?')){
            window.location.href='pages/charts/del_user.php?deluser=' + id , true;
        }
    }

</script>
<script>
    function editcomp(id) {
        window.location.href='pages/charts/edit_company.php?editcomp=' + id , true;
    }

</script>
</body>
</html>
