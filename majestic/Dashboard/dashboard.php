<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}
?>
<!--<!DOCTYPE html>-->
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,
			shrink-to-fit=no" />
    <title>Map Admin</title>
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/scrool-bar.css" />
    <link rel="stylesheet" href="css/table.css" />
    <link rel="shortcut icon" href="images/favicon.png" />
    <link rel="stylesheet" href="css/dashboard.css">
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
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
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
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
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
                                <i class="mdi mdi-settings text-primary"></i> Settings
                            </a>
                            <a class="dropdown-item" href="index.php">
                                <i class="mdi mdi-logout text-primary"></i> Logout
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
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="d-flex justify-content-between flex-wrap">
                                <div class="d-flex align-items-end flex-wrap">
                                    <div class="mr-md-3 mr-xl-5">
                                        <h2 id="display-fullname">Welcome back
                                            <?php
                                            $fullname = $_SESSION['fullname'];
                                            echo $fullname;
                                            ?>
                                        </h2>
                                        <p class="mb-md-0">Have a nice day at work.</p>
                                    </div>
                                    <div class="d-flex">
                                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                                        <p class="text-muted mb-0 hover-cursor">
                                            &nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;
                                        </p>
                                        <p class="text-primary mb-0 hover-cursor">Analytics</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-end flex-wrap">
                                    <button type="button" class="btn btn-light bg-white btn-icon mr-3
											d-none d-md-block">
                                        <i class="mdi mdi-download text-muted"></i>
                                    </button>
                                    <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2
											mt-xl-0">
                                        <i class="mdi mdi-clock-outline text-muted"></i>
                                    </button>
                                    <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2
											mt-xl-0">
                                        <i class="mdi mdi-plus text-muted"></i>
                                    </button>
                                    <button class="btn btn-primary mt-2 mt-xl-0">
                                        Download report
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body dashboard-tabs p-0">
                                    <ul class="nav nav-tabs px-4" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" id="sales-tab" data-toggle="tab" href="#sales"
                                                role="tab" aria-controls="sales" aria-selected="false">Sales</a>
                                        </li> -->
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" id="purchases-tab" data-toggle="tab" href="#purchases"
                                                role="tab" aria-controls="purchases" aria-selected="false">Purchases</a>
                                        </li> -->
                                    </ul>
                                    <div class="tab-content py-0 px-0">
                                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                            <div class="d-flex flex-wrap justify-content-xl-between">
                                                <div class="d-none d-xl-flex border-md-right flex-grow-1
														align-items-center justify-content-center p-3 item">
                                                    <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                                                    <div class="d-flex flex-column justify-content-around">
                                                        <small class="mb-1 text-muted">Date</small>
                                                        <div class="dropdown">
                                                            <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent
																	border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <h5 class="mb-0 d-inline-block">
                                                                    26 Jul 2021
                                                                </h5>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                                                                <a class="dropdown-item" href="#">12 Aug 2021</a>
                                                                <a class="dropdown-item" href="#">22 Sep 2021</a>
                                                                <a class="dropdown-item" href="#">21 Oct 2021</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex border-md-right flex-grow-1 align-items-center
														justify-content-center p-3 item">
                                                    <i class="mdi mdi-checkbox-multiple-marked mr-3 icon-lg text-warning"></i>
                                                    <div class="d-flex flex-column justify-content-around">
                                                        <small class="mb-1 text-muted">Total</small>
                                                        <h5 class="mr-2 mb-0">5.6 Tons</h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex border-md-right flex-grow-1 align-items-center
														justify-content-center p-3 item">
                                                    <i class="mdi mdi-delete mr-3 icon-lg text-success"></i>
                                                    <div class="d-flex flex-column justify-content-around">
                                                        <small class="mb-1 text-muted">Bin</small>
                                                        <h5 class="mr-2 mb-0">283/404</h5>
                                                    </div>
                                                </div>

                                                <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center
														justify-content-center p-3 item">
                                                    <i class="mdi mdi-account-multiple mr-3 icon-lg text-danger"></i>
                                                    <div class="d-flex flex-column justify-content-around">
                                                        <small class="mb-1 text-muted">Driver</small>
                                                        <h5 class="mr-2 mb-0">34/62</h5>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- <div class="tab-pane fade" id="sales" role="tabpanel"
                                            aria-labelledby="sales-tab">
                                            <div class="d-flex flex-wrap justify-content-xl-between">
                                                <div class="d-none d-xl-flex border-md-right flex-grow-1
														align-items-center justify-content-center p-3 item">
                                                    <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                                                    <div class="d-flex flex-column justify-content-around">
                                                        <small class="mb-1 text-muted">Start date</small>
                                                        <div class="dropdown">
                                                            <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent
																	border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <h5 class="mb-0 d-inline-block">
                                                                    26 Jul 2018
                                                                </h5>
                                                            </a>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuLinkA">
                                                                <a class="dropdown-item" href="#">12 Aug 2018</a>
                                                                <a class="dropdown-item" href="#">22 Sep 2018</a>
                                                                <a class="dropdown-item" href="#">21 Oct 2018</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex border-md-right flex-grow-1 align-items-center
														justify-content-center p-3 item">
                                                    <i class="mdi mdi-download mr-3 icon-lg text-warning"></i>
                                                    <div class="d-flex flex-column justify-content-around">
                                                        <small class="mb-1 text-muted">Downloads</small>
                                                        <h5 class="mr-2 mb-0">2233783</h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex border-md-right flex-grow-1 align-items-center
														justify-content-center p-3 item">
                                                    <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                                                    <div class="d-flex flex-column justify-content-around">
                                                        <small class="mb-1 text-muted">Total views</small>
                                                        <h5 class="mr-2 mb-0">9833550</h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex border-md-right flex-grow-1 align-items-center
														justify-content-center p-3 item">
                                                    <i class="mdi mdi-currency-usd mr-3 icon-lg text-danger"></i>
                                                    <div class="d-flex flex-column justify-content-around">
                                                        <small class="mb-1 text-muted">Revenue</small>
                                                        <h5 class="mr-2 mb-0">$577545</h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center
														justify-content-center p-3 item">
                                                    <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                                                    <div class="d-flex flex-column justify-content-around">
                                                        <small class="mb-1 text-muted">Flagged</small>
                                                        <h5 class="mr-2 mb-0">3497843</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- <div class="tab-pane fade" id="purchases" role="tabpanel"
                                            aria-labelledby="purchases-tab">
                                            <div class="d-flex flex-wrap justify-content-xl-between">
                                                <div class="d-none d-xl-flex border-md-right flex-grow-1
														align-items-center justify-content-center p-3 item">
                                                    <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                                                    <div class="d-flex flex-column justify-content-around">
                                                        <small class="mb-1 text-muted">Start date</small>
                                                        <div class="dropdown">
                                                            <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent
																	border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <h5 class="mb-0 d-inline-block">
                                                                    26 Jul 2018
                                                                </h5>
                                                            </a>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuLinkA">
                                                                <a class="dropdown-item" href="#">12 Aug 2018</a>
                                                                <a class="dropdown-item" href="#">22 Sep 2018</a>
                                                                <a class="dropdown-item" href="#">21 Oct 2018</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex border-md-right flex-grow-1 align-items-center
														justify-content-center p-3 item">
                                                    <i class="mdi mdi-currency-usd mr-3 icon-lg text-danger"></i>
                                                    <div class="d-flex flex-column justify-content-around">
                                                        <small class="mb-1 text-muted">Revenue</small>
                                                        <h5 class="mr-2 mb-0">$577545</h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex border-md-right flex-grow-1 align-items-center
														justify-content-center p-3 item">
                                                    <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                                                    <div class="d-flex flex-column justify-content-around">
                                                        <small class="mb-1 text-muted">Total views</small>
                                                        <h5 class="mr-2 mb-0">9833550</h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex border-md-right flex-grow-1 align-items-center
														justify-content-center p-3 item">
                                                    <i class="mdi mdi-download mr-3 icon-lg text-warning"></i>
                                                    <div class="d-flex flex-column justify-content-around">
                                                        <small class="mb-1 text-muted">Downloads</small>
                                                        <h5 class="mr-2 mb-0">2233783</h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center
														justify-content-center p-3 item">
                                                    <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                                                    <div class="d-flex flex-column justify-content-around">
                                                        <small class="mb-1 text-muted">Flagged</small>
                                                        <h5 class="mr-2 mb-0">3497843</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">Total this year</p>
                                    <p class="mb-4">
                                        Column chart data shows that in the last months of the year, the amount of waste in the city increased significantly and decreased sharply in December.
                                    </p>
                                    <div id="cash-deposits-chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">total garbage</p>
                                    <h1>712 tons</h1>
                                    <h4>Total in recent years</h4>
                                    <p class="text-muted">
                                        In the city. According to statistics from the chart, every year in the city, there are about 800 tons of waste discharged into the environment, but only a few of it is recycled and utilized by facilities and businesses.
                                    </p>
                                    <div id="total-year-chart"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">Recent actions</p>
                                    <div class="table-responsive">
                                        <table id="recent-purchases-listing" class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Vehicle ID</th>
                                                    <th>Bin ID</th>
                                                    <th>Address</th>
                                                    <th>Driver ID</th>
                                                    <th>Driver Name</th>
                                                    <!--<th>More</th>-->
                                                </tr>
                                            </thead>
                                            <tbody id="body-table">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.php -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright
                            © 2022
                            <a href="index.php" target="_blank">NNA Team</a>. All rights reserved.
                        </span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted
                            & made with
                            <i class="mdi mdi-heart text-danger"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="vendors/base/vendor.bundle.base.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="./vendors/chart.js/Chart.min.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/getDataDB.js"></script>
</body>

</html>