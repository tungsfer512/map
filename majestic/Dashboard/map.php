<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Map Admin</title>
	<link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css" />
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/scrool-bar.css" />
	<link rel="stylesheet" href="css/table.css" />

	<link rel="stylesheet" href="./node_modules/leaflet/dist/leaflet.css" />
	<link rel="stylesheet" href="css/map.css" />
	<link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
	<div class="container-scroller">
		<!-- partial:partials/_navbar.php -->
		<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
			<div class="navbar-brand-wrapper d-flex justify-content-center">
				<div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
					<a class="navbar-brand brand-logo" href="map.php"><img src="images/logo-ua.png" alt="logo" /></a>
					<!-- <a class="navbar-brand brand-logo-mini" href="map.php"><img src="images/logo-mini.svg" alt="logo" /></a> -->
					<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
						<span class="mdi mdi-sort-variant"></span>
					</button>
				</div>
			</div>
			<div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
				<ul class="navbar-nav mr-lg-4 w-100">
					<li class="nav-item nav-search d-none d-lg-block w-100">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="search">
									<i class="mdi mdi-magnify"></i>
								</span>
							</div>
							<input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search" />
						</div>
					</li>
				</ul>
				<ul class="navbar-nav navbar-nav-right">
					<li class="nav-item dropdown mr-1">
						<a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
							<i class="mdi mdi-message-text mx-0"></i>
							<span class="count"></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right navbar-dropdown mess-drop" aria-labelledby="messageDropdown">
							<p class="mb-0 font-weight-normal float-left dropdown-header">
								Messages
							</p>
							<a class="dropdown-item">
								<div class="item-thumbnail">
									<img src="images/faces/face4.jpg" alt="image" class="profile-pic" />
								</div>
								<div class="item-content flex-grow">
									<h6 class="ellipsis font-weight-normal">David Grey</h6>
									<p class="font-weight-light small-text text-muted mb-0">
										The meeting is cancelled
									</p>
								</div>
							</a>
							<a class="dropdown-item">
								<div class="item-thumbnail">
									<img src="images/faces/face2.jpg" alt="image" class="profile-pic" />
								</div>
								<div class="item-content flex-grow">
									<h6 class="ellipsis font-weight-normal">Tim Cook</h6>
									<p class="font-weight-light small-text text-muted mb-0">
										New product launch
									</p>
								</div>
							</a>
							<a class="dropdown-item">
								<div class="item-thumbnail">
									<img src="images/faces/face3.jpg" alt="image" class="profile-pic" />
								</div>
								<div class="item-content flex-grow">
									<h6 class="ellipsis font-weight-normal">Johnson</h6>
									<p class="font-weight-light small-text text-muted mb-0">
										Upcoming board meeting
									</p>
								</div>
							</a>
						</div>
					</li>
					<li class="nav-item dropdown mr-4">
						<a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-toggle="dropdown">
							<i class="mdi mdi-bell mx-0"></i>
							<span class="count"></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right navbar-dropdown noti-drop" aria-labelledby="notificationDropdown">
							<p class="mb-0 font-weight-normal float-left dropdown-header">
								Notifications
							</p>
							<a class="dropdown-item">
								<div class="item-thumbnail">
									<div class="item-icon bg-success">
										<i class="mdi mdi-information mx-0"></i>
									</div>
								</div>
								<div class="item-content">
									<h6 class="font-weight-normal">Application Error</h6>
									<p class="font-weight-light small-text mb-0 text-muted">
										Just now
									</p>
								</div>
							</a>
							<a class="dropdown-item">
								<div class="item-thumbnail">
									<div class="item-icon bg-warning">
										<i class="mdi mdi-settings mx-0"></i>
									</div>
								</div>
								<div class="item-content">
									<h6 class="font-weight-normal">Settings</h6>
									<p class="font-weight-light small-text mb-0 text-muted">
										Private message
									</p>
								</div>
							</a>
							<a class="dropdown-item">
								<div class="item-thumbnail">
									<div class="item-icon bg-info">
										<i class="mdi mdi-account-box mx-0"></i>
									</div>
								</div>
								<div class="item-content">
									<h6 class="font-weight-normal">New user registration</h6>
									<p class="font-weight-light small-text mb-0 text-muted">
										2 days ago
									</p>
								</div>
							</a>
							<a class="dropdown-item">
								<div class="item-thumbnail">
									<div class="item-icon bg-success">
										<i class="mdi mdi-information mx-0"></i>
									</div>
								</div>
								<div class="item-content">
									<h6 class="font-weight-normal">Application Error</h6>
									<p class="font-weight-light small-text mb-0 text-muted">
										Just now
									</p>
								</div>
							</a>
							<a class="dropdown-item">
								<div class="item-thumbnail">
									<div class="item-icon bg-warning">
										<i class="mdi mdi-settings mx-0"></i>
									</div>
								</div>
								<div class="item-content">
									<h6 class="font-weight-normal">Settings</h6>
									<p class="font-weight-light small-text mb-0 text-muted">
										Private message
									</p>
								</div>
							</a>
							<a class="dropdown-item">
								<div class="item-thumbnail">
									<div class="item-icon bg-info">
										<i class="mdi mdi-account-box mx-0"></i>
									</div>
								</div>
								<div class="item-content">
									<h6 class="font-weight-normal">New user registration</h6>
									<p class="font-weight-light small-text mb-0 text-muted">
										2 days ago
									</p>
								</div>
							</a>
							<a class="dropdown-item">
								<div class="item-thumbnail">
									<div class="item-icon bg-success">
										<i class="mdi mdi-information mx-0"></i>
									</div>
								</div>
								<div class="item-content">
									<h6 class="font-weight-normal">Application Error</h6>
									<p class="font-weight-light small-text mb-0 text-muted">
										Just now
									</p>
								</div>
							</a>
							<a class="dropdown-item">
								<div class="item-thumbnail">
									<div class="item-icon bg-warning">
										<i class="mdi mdi-settings mx-0"></i>
									</div>
								</div>
								<div class="item-content">
									<h6 class="font-weight-normal">Settings</h6>
									<p class="font-weight-light small-text mb-0 text-muted">
										Private message
									</p>
								</div>
							</a>
							<a class="dropdown-item">
								<div class="item-thumbnail">
									<div class="item-icon bg-info">
										<i class="mdi mdi-account-box mx-0"></i>
									</div>
								</div>
								<div class="item-content">
									<h6 class="font-weight-normal">New user registration</h6>
									<p class="font-weight-light small-text mb-0 text-muted">
										2 days ago
									</p>
								</div>
							</a>
							<a class="dropdown-item">
								<div class="item-thumbnail">
									<div class="item-icon bg-success">
										<i class="mdi mdi-information mx-0"></i>
									</div>
								</div>
								<div class="item-content">
									<h6 class="font-weight-normal">Application Error</h6>
									<p class="font-weight-light small-text mb-0 text-muted">
										Just now
									</p>
								</div>
							</a>
							<a class="dropdown-item">
								<div class="item-thumbnail">
									<div class="item-icon bg-warning">
										<i class="mdi mdi-settings mx-0"></i>
									</div>
								</div>
								<div class="item-content">
									<h6 class="font-weight-normal">Settings</h6>
									<p class="font-weight-light small-text mb-0 text-muted">
										Private message
									</p>
								</div>
							</a>
							<a class="dropdown-item">
								<div class="item-thumbnail">
									<div class="item-icon bg-info">
										<i class="mdi mdi-account-box mx-0"></i>
									</div>
								</div>
								<div class="item-content">
									<h6 class="font-weight-normal">New user registration</h6>
									<p class="font-weight-light small-text mb-0 text-muted">
										2 days ago
									</p>
								</div>
							</a>
						</div>
					</li>
					<li class="nav-item nav-profile dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
							<img src="images/faces/face5.jpg" alt="profile" />
							<span class="nav-profile-name" id='display-username'>
								<?php
								$username = $_SESSION['username'];
								echo $username;
								?>
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
							<a class="dropdown-item">
								<i class="mdi mdi-settings text-primary"></i>
								Settings
							</a>
							<a class="dropdown-item" href="index.php">
								<i class="mdi mdi-logout text-primary"></i>
								Logout
							</a>
						</div>
					</li>
				</ul>
				<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
					<span class="mdi mdi-menu"></span>
				</button>
			</div>
		</nav>
		<!-- partial -->
		<div class="container-fluid page-body-wrapper" style="padding-left: 0!important; padding-right: 0!important;">
			<!-- partial:partials/_sidebar.php -->
			<nav class="sidebar sidebar-offcanvas" id="sidebar">
				<ul class="nav">
					<li class="nav-item">
						<a class="nav-link" href="map.php">
							<i class="mdi mdi-map-marker-multiple menu-icon"></i>
							<span class="menu-title">Map</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="dashboard.php">
							<i class="mdi mdi-home menu-icon"></i>
							<span class="menu-title">Dashboard</span>
						</a>
					</li>
					<!-- <li class="nav-item">
							<a class="nav-link" href="manage.php">
								<i class="mdi mdi-buffer menu-icon"></i>
								<span class="menu-title">Manage</span>
							</a>
						</li> -->
					<li class="nav-item">
						<a class="nav-link" href="bin-table.php">
							<i class="mdi mdi-beer menu-icon"></i>
							<span class="menu-title">Trash Bin Manage</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="vehicle-table.php">
							<i class="mdi mdi-truck menu-icon"></i>
							<span class="menu-title">Vehicle Manage</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="driver-table.php">
							<i class="mdi mdi-account-check menu-icon"></i>
							<span class="menu-title">Driver Manage</span>
						</a>
					</li>
					<!-- <li class="nav-item">
							<a class="nav-link" href="pages/tables/basic-table.php">
								<i class="mdi mdi-grid-large menu-icon"></i>
								<span class="menu-title">Tables</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="pages/icons/mdi.php">
								<i class="mdi mdi-emoticon menu-icon"></i>
								<span class="menu-title">Icons</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="documentation/documentation.php">
								<i class="mdi mdi-file-document-box-outline menu-icon"></i>
								<span class="menu-title">Documentation</span>
							</a>
						</li> -->
				</ul>
			</nav>
			<!-- partial -->
			<div class="map-container">
				<div class="map" id="map"></div>
				<div id="information-side" class="information-side">
					<i id="information-side-close" class="mdi mdi-close information-side-close"></i>
					<div>
						<div id="information-side-img" class="information-side-img">
							<img src="./images/green-vehicle.png" alt="">
						</div>
						<h3>Vehicle Information</h3>
					</div>
					<div class="information-side-content">
						<div class="information-side-content-item">
							<div class="information-side-content-item-title">
								<span>ID</span>
							</div>
							<div class="information-side-content-item-content">
								<span id="vehicle-id">HN1234</span>
							</div>
						</div>
						<div class="information-side-content-item">
							<div class="information-side-content-item-title">
								<span>Latitude</span>
							</div>
							<div class="information-side-content-item-content">
								<span id="vehicle-lat">22.1212</span>
							</div>
						</div>
						<div class="information-side-content-item">
							<div class="information-side-content-item-title">
								<span>Longitude</span>
							</div>
							<div class="information-side-content-item-content">
								<span id="vehicle-long">21.000</span>
							</div>
						</div>
						<div class="information-side-content-item">
							<div class="information-side-content-item-title">
								<span>Status</span>
							</div>
							<div class="information-side-content-item-content">
								<span id="vehicle-status">On work</span>
							</div>
						</div>
						<div class="information-side-content-item">
							<div class="information-side-content-item-title">
								<span>Address</span>
							</div>
							<div class="information-side-content-item-content">
								<span id="vehicle-address">hanoi</span>
							</div>
						</div>
						<div class="information-side-content-item">
							<div class="information-side-content-item-title">
								<span>Plate</span>
							</div>
							<div class="information-side-content-item-content">
								<span id="vehicle-plate">1234567</span>
							</div>
						</div>
						<!-- page-body-wrapper ends -->
					</div>
				</div>
				<div id="information-side-2" class="information-side">
					<i id="information-side-close-2" class="mdi mdi-close information-side-close"></i>
					<h3>Trash Bin Information</h3>
					<div class="information-side-content">
						<div class="information-side-content-item">
							<div class="information-side-content-item-title">
								<span>ID</span>
							</div>
							<div class="information-side-content-item-content">
								<span id="bin-id">HN1234</span>
							</div>
						</div>
						<div class="information-side-content-item">
							<div class="information-side-content-item-title">
								<span>Latitude</span>
							</div>
							<div class="information-side-content-item-content">
								<span id="bin-lat">22.1212</span>
							</div>
						</div>
						<div class="information-side-content-item">
							<div class="information-side-content-item-title">
								<span>Longitude</span>
							</div>
							<div class="information-side-content-item-content">
								<span id="bin-long">21.000</span>
							</div>
						</div>
						<div class="information-side-content-item">
							<div class="information-side-content-item-title">
								<span>Status</span>
							</div>
							<div class="information-side-content-item-content">
								<span id="bin-status">Full</span>
							</div>
						</div>
						<div class="information-side-content-item">
							<div class="information-side-content-item-title">
								<span>Address</span>
							</div>
							<div class="information-side-content-item-content">
								<span id="bin-address">hanoi</span>
							</div>
						</div>
						<!-- page-body-wrapper ends -->
					</div>
				</div>
			</div>
			<!-- main-panel ends -->
			<!-- container-scroller -->

			<!-- plugins:js -->
			<script src="./node_modules/leaflet/dist/leaflet.js"></script>
			<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
			<script src="vendors/base/vendor.bundle.base.js"></script>
			<script src="js/off-canvas.js"></script>
			<script src="js/hoverable-collapse.js"></script>
			<script src="js/template.js"></script>
			<script src="js/map1.js"></script>
			<script src="js/leaflet-providers.js"></script>
			<!-- <script src='js/update.js'></script> -->
</body>

</html>

<script src="js/vevent.js"></script>