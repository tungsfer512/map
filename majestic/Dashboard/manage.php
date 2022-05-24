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
    <meta name="viewport" content="width=device-width, initial-scale=1,
			shrink-to-fit=no" />
    <title>Map Admin</title>
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/scrool-bar.css" />
    <link rel="stylesheet" href="css/table.css" />
    <link rel="stylesheet" href="css/modal.css" />
    <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.php -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
                <div class="navbar-brand-inner-wrapper d-flex justify-content-between
						align-items-center w-100">
                    <a class="navbar-brand brand-logo" href="map.php"><img src="images/logo-ua.png" alt="logo" /></a>
                    <!-- <a class="navbar-brand brand-logo-mini" href="map.php"><img src="images/logo-mini.svg" alt="logo" /></a> -->
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-sort-variant"></span>
                    </button>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center
					justify-content-end">
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
                        <a class="nav-link count-indicator dropdown-toggle d-flex
								justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
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
                        <a class="nav-link count-indicator dropdown-toggle d-flex
								align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-toggle="dropdown">
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
                            <span class="nav-profile-name" id="display-username">
                                <?php echo $_SESSION['username']; ?>
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
                <button class="navbar-toggler navbar-toggler-right d-lg-none
						align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
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
                    <li class="nav-item">
                        <a class="nav-link" href="manage.php">
                            <i class="mdi mdi-buffer menu-icon"></i>
                            <span class="menu-title">Manage</span>
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
                                        <p class="mb-md-0">Trash Bin Manage Table.</p>
                                    </div>
                                    <div class="d-flex">
                                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                                        <p class="text-muted mb-0 hover-cursor">
                                            &nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;
                                        </p>
                                        <p class="text-primary mb-0 hover-cursor">
                                            Trash Bin Manage
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Bin Status</h4>
                                    <button class="btn btn-primary btn-add" data-bs-target="#modalAddbin" data-bs-toggle="modal">
                                        Add bin
                                    </button>
                                    <div class="table-responsive">
                                        <table class="table table-bin">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Createddate</th>
                                                    <th>Owners</th>
                                                    <th>Latitude</th>
                                                    <th>Longitude</th>
                                                    <th>Address</th>
                                                    <th>More</th>
                                                </tr>
                                            </thead>
                                            <tbody id="body-table-bin">
                                                <!-- <td><label class="badge badge-danger">Pending</label></td> -->
                                                <!-- <td><label class="badge badge-warning">In progress</label></td>
                                      <td><label class="badge badge-info">Fixed</label></td>
                                      <td><label class="badge badge-success">Completed</label></td> -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Vehicle Status</h4>
                                    <button class="btn btn-primary btn-add" data-bs-target="#modalAddvehicle" data-bs-toggle="modal">
                                        Add vehicle
                                    </button>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-vehicle">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Code</th>
                                                    <th>License</th>
                                                    <th>Typed</th>
                                                    <th>Addresses</th>
                                                    <th>Latitude</th>
                                                    <th>Longitude</th>
                                                    <th>More</th>
                                                </tr>
                                            </thead>
                                            <tbody id="body-table-vehicle">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Driver Status</h4>
                                    <button class="btn btn-primary btn-add" data-bs-target="#modalAdddriver" data-bs-toggle="modal">
                                        Add driver
                                    </button>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-driver">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Fullname</th>
                                                    <th>Address</th>
                                                    <th>Phone</th>
                                                    <th>gender</th>
                                                    <th>Birth</th>
                                                    <th>Status</th>
                                                    <th>More</th>
                                                </tr>
                                            </thead>
                                            <tbody id="body-table-driver">

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
                        <span class="text-muted text-center text-sm-left d-block
								d-sm-inline-block">Copyright © 2022
                            <a href="index.php" target="_blank">NNA Team</a>. All rights
                            reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted
                            & made with
                            <i class="mdi mdi-heart text-danger"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary btn-open" data-bs-toggle="modal" data-bs-target="#modalDetailbin">
            Launch demo modal
        </button> -->
        <!-- Modal -->
        <div class="modal fade" id="modalDetailbin" aria-hidden="true" aria-labelledby="modalDetailLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDetailLabel">
                            Trash Bin Information
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label class="col-form-label">Bin ID:</label>
                                <label><span class="vehicle-info-lable" id="content-id">kjdfhshjf</span></label>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Created Date:</label>
                                <label><span class="vehicle-info-lable" id="content-date">kjdfhshjf</span></label>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Owners:</label>
                                <label><span class="vehicle-info-lable" id="content-Owners">kjdfhshjf</span></label>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Name:</label>
                                <label><span class="vehicle-info-lable" id="content-Name">kjdfhshjf</span></label>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Weight:</label>
                                <label><span class="vehicle-info-lable" id="content-Weight">kjdfhshjf</span></label>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Height:</label>
                                <label><span class="vehicle-info-lable" id="content-Height">kjdfhshjf</span></label>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Latitude:</label>
                                <label><span class="vehicle-info-lable" id="content-Lat">kjdfhshjf</span></label>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Longitude:</label>
                                <label><span class="vehicle-info-lable" id="content-Long">kjdfhshjf</span></label>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Address:</label>
                                <label><span class="vehicle-info-lable" id="content-Address">kjdfhshjf</span></label>
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Status:</label>
                                <label><span class="vehicle-info-lable" id="content-Status">kjdfhshjf</span></label>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-target="#modalDetaileditbin" data-bs-toggle="modal">
                            Edit
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalDetaileditbin" aria-hidden="true" aria-labelledby="modalDetaileditbin" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDetaileditbin">
                            Update Trash Bin Infomation
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label class="col-form-label">Bin ID:</label>
                                <input type="text" class="form-control" id="content-b-id" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Created Date:</label>
                                <input type="date" class="form-control" id="content-b-date" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Owners:</label>
                                <input type="text" class="form-control" id="content-b-owners" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Name:</label>
                                <input type="text" class="form-control" id="content-b-name" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Weight:</label>
                                <input type="text" class="form-control" id="content-b-weight" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Height:</label>
                                <input type="text" class="form-control" id="content-b-height" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Latitude:</label>
                                <input type="text" class="form-control" id="content-b-lat" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Longitude:</label>
                                <input type="text" class="form-control" id="content-b-long" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Address:</label>
                                <input type="text" class="form-control" id="content-b-address" />
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Status:</label>
                                <select class="form-control" id="content-b-status">
                                    <option value="empty">Empty</option>
                                    <option value="mid">Mid</option>
                                    <option value="full">Full</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-del" data-bs-target="#modalDetail2" data-bs-toggle="modal" onclick="deleB()">
                            Delete
                        </button>
                        <button class="btn btn-primary" data-bs-target="#modalDetail2" data-bs-toggle="modal" onclick="saveB()">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalAddbin" aria-hidden="true" aria-labelledby="modalAddLable" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAddLabel">Add New Trash Bin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label class="col-form-label">Bin ID:</label>
                                <input type="text" class="form-control" id="content-ba-id" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Created Date:</label>
                                <input type="date" class="form-control" id="content-ba-date" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Owners:</label>
                                <input type="text" class="form-control" id="content-ba-owners" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Name:</label>
                                <input type="text" class="form-control" id="content-ba-name" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Weight:</label>
                                <input type="text" class="form-control" id="content-ba-weight" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Height:</label>
                                <input type="text" class="form-control" id="content-ba-height" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Latitude:</label>
                                <input type="text" class="form-control" id="content-ba-lat" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Longitude:</label>
                                <input type="text" class="form-control" id="content-ba-long" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Address:</label>
                                <input type="text" class="form-control" id="content-ba-address" />
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Status:</label>
                                <select class="form-control" id="content-ba-status">
                                    <option value="empty">Empty</option>
                                    <option value="mid">Mid</option>
                                    <option value="full">Full</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-target="#modalAdd" data-bs-toggle="modal" onclick="addB()">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal End -->
        <!-- Modal -->
        <div class="modal fade" id="modalDetailve" aria-hidden="true" aria-labelledby="modalDetailLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDetailLabel">
                            Vehicle Information
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label class="col-form-label">Vehicle ID:</label>
                                <label><span class="vehicle-info-lable" id="content-id-v">kjdfhshjf</span></label>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Code:</label>
                                <label><span class="vehicle-info-lable" id="content-code">kjdfhshjf</span></label>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Type:</label>
                                <label><span class="vehicle-info-lable" id="content-type">kjdfhshjf</span></label>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">License Plate:</label>
                                <label><span class="vehicle-info-lable" id="content-license">kjdfhshjf</span></label>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Imei:</label>
                                <label><span class="vehicle-info-lable" id="content-imei">kjdfhshjf</span></label>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Timestamps:</label>
                                <label><span class="vehicle-info-lable" id="content-timestamps">kjdfhshjf</span></label>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Latitude:</label>
                                <label><span class="vehicle-info-lable" id="content-lat">kjdfhshjf</span></label>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Longitude:</label>
                                <label><span class="vehicle-info-lable" id="content-long">kjdfhshjf</span></label>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Weight:</label>
                                <label><span class="vehicle-info-lable" id="content-weight">kjdfhshjf</span></label>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Address:</label>
                                <label><span class="vehicle-info-lable" id="content-address">kjdfhshjf</span></label>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Image:</label>
                                <div class="modal-edit-img" id="uploads-img">
                                    <!-- <img src="./images/red-garbage.png" alt="" /> -->
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Status:</label>
                                <label><span class="vehicle-info-lable" id="content-status">kjdfhshjf</span></label>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-target="#modalDetaileditV" data-bs-toggle="modal">
                            Edit
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalDetaileditV" aria-hidden="true" aria-labelledby="modalDetaileditV" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDetaileditV">
                            Update Vehicle Infomation
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label class="col-form-label">Vehicle ID:</label>
                                <input type="text" class="form-control" id="content-v-id" readonly />
                            </div>
                            <div class=" mb-3 ">
                                <label class="col-form-label ">Code:</label>
                                <input type="text " class="form-control " id="content-v-code" />
                            </div>
                            <div class="mb-3 ">
                                <label class="col-form-label ">Type:</label>
                                <input type="text " class="form-control " id="content-v-type" />
                            </div>
                            <div class="mb-3 ">
                                <label class="col-form-label ">License Plate:</label>
                                <input type="text " class="form-control " id="content-v-license" />
                            </div>
                            <div class=" mb-3 ">
                                <label class="col-form-label ">Imei:</label>
                                <input type="text " class="form-control " id="content-v-imei" />
                            </div>
                            <div class=" mb-3 ">
                                <label class="col-form-label ">Timestamps:</label>
                                <input type="date " class="form-control " id="content-v-timestamps" />
                            </div>
                            <div class=" mb-3 ">
                                <label class="col-form-label ">Latitude:</label>
                                <input type="text " class="form-control " id="content-v-lat" />
                            </div>
                            <div class=" mb-3 ">
                                <label class="col-form-label ">Longitude:</label>
                                <input type="text " class="form-control " id="content-v-long" />
                            </div>
                            <div class=" mb-3 ">
                                <label class="col-form-label ">Weight:</label>
                                <input type="text " class="form-control " id="content-v-weight" />
                            </div>
                            <div class=" mb-3 ">
                                <label class="col-form-label ">Address:</label>
                                <input type="text " class="form-control " id="content-v-address" />
                            </div>
                            <div class=" mb-3 ">
                                <label class="col-form-label ">Image:</label>
                                <div class="modal-edit-img " id="image-view">
                                    <!-- <img src="./images/red-garbage.png " alt=" " /> -->
                                </div>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="file" name="file" id="image-ve" />
                                </form>
                            </div>
                            <div class="mb-3 ">
                                <label class="col-form-label ">Status:</label>
                                <select class="form-control" id="content-v-status">
                                    <option value="On work">On Work</option>
                                    <option value="Free">Free</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer ">
                        <button class="btn btn-primary btn-del" data-bs-target="#modalDetaileditV" data-bs-toggle="modal" onclick="deleV()">
                            Delete
                        </button>
                        <button class="btn btn-primary" data-bs-target="#modalDetaileditV" data-bs-toggle="modal" onclick="saveV()">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalAddvehicle" aria-hidden="true" aria-labelledby="modalAddLable" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAddLabel">
                            Add New Vehicle
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label class="col-form-label">Vehicle ID:</label>
                                <input type="text" class="form-control" id="content-va-id" />
                            </div>
                            <div class=" mb-3 ">
                                <label class="col-form-label ">Code:</label>
                                <input type="text " class="form-control " id="content-va-code" />
                            </div>
                            <div class="mb-3 ">
                                <label class="col-form-label ">Type:</label>
                                <input type="text " class="form-control " id="content-va-type" />
                            </div>
                            <div class="mb-3 ">
                                <label class="col-form-label ">License Plate:</label>
                                <input type="text " class="form-control " id="content-va-license" />
                            </div>
                            <div class=" mb-3 ">
                                <label class="col-form-label ">Imei:</label>
                                <input type="text " class="form-control " id="content-va-imei" />
                            </div>
                            <div class=" mb-3 ">
                                <label class="col-form-label ">Timestamps:</label>
                                <input type="date " class="form-control " id="content-va-timestamps" />
                            </div>
                            <div class=" mb-3 ">
                                <label class="col-form-label ">Latitude:</label>
                                <input type="text " class="form-control " id="content-va-lat" />
                            </div>
                            <div class=" mb-3 ">
                                <label class="col-form-label ">Longitude:</label>
                                <input type="text " class="form-control " id="content-va-long" />
                            </div>
                            <div class=" mb-3 ">
                                <label class="col-form-label ">Weight:</label>
                                <input type="text " class="form-control " id="content-va-weights" />
                            </div>
                            <div class=" mb-3 ">
                                <label class="col-form-label ">Address:</label>
                                <input type="text " class="form-control " id="content-va-address" />
                            </div>
                            <div class=" mb-3 ">
                                <label class="col-form-label ">Image:</label>
                                <div class="modal-edit-img " id="image-view">
                                    <!-- <img src="./images/red-garbage.png " alt=" " /> -->
                                </div>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="file" name="images" id="images" />
                                </form>
                            </div>
                            <div class="mb-3 ">
                                <label class="col-form-label ">Status:</label>
                                <select class="form-control" id="content-va-status">
                                    <option value="On Work">On Work</option>
                                    <option value="Free">Free</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer ">
                        <button class="btn btn-primary" data-bs-target="#modalAdd" data-bs-toggle="modal" onclick="addV()">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- vehicle Modal End -->
        <!-- Modal -->
        <div class="modal fade" id="modalDetaildriver" aria-hidden="true" aria-labelledby="modalDetailLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDetailLabel">
                            Driver Information
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label class="col-form-label">Driver ID:</label>
                                <label><span class="vehicle-info-lable" id="content-id-d">kjdfhshjf</span></label>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Full Name:</label>
                                <label><span class="vehicle-info-lable" id="content-fullname">kjdfhshjf</span></label>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Address:</label>
                                <label><span class="vehicle-info-lable" id="content-addresses">kjdfhshjf</span></label>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Phone Number:</label>
                                <label><span class="vehicle-info-lable" id="content-phone">kjdfhshjf</span></label>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Gender:</label>
                                <label><span class="vehicle-info-lable" id="content-gender">kjdfhshjf</span></label>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Date Of Birth:</label>
                                <label><span class="vehicle-info-lable" id="content-birth-d">kjdfhshjf</span></label>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Image:</label>
                                <div class="modal-edit-img" id="uploads-img-d">

                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Status:</label>
                                <label><span class="vehicle-info-lable" id="content-statuses">kjdfhshjf</span></label>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-target="#modalDetaileditdriver" data-bs-toggle="modal">
                            Edit
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalDetaileditdriver" aria-hidden="true" aria-labelledby="modalDetaileditdriver" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDetaileditdriver">
                            Update Driver Infomation
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label class="col-form-label">Driver ID:</label>
                                <input type="text" class="form-control" id="content-d-id" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Full Name:</label>
                                <input type="text" class="form-control" id="content-d-fullname" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Address:</label>
                                <input type="text" class="form-control" id="content-d-address" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Phone:</label>
                                <input type="text" class="form-control" id="content-d-phone" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Gender:</label>
                                <form>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </form>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Date Of Birth:</label>
                                <input type="date" class="form-control" id="content-d-birth" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Image:</label>
                                <div class="modal-edit-img" id="image-view-d">

                                </div>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="file" name="file" id="image" />
                                </form>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Status:</label>
                                <select class="form-control" id="content-d-status">
                                    <option value="On work">On Work</option>
                                    <option value="Free">Free</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-del" data-bs-target="#modalDetaileditdriver" data-bs-toggle="modal" onclick="deleD()">
                            Delete
                        </button>
                        <button class="btn btn-primary" data-bs-target="#modalDetaileditdriver" data-bs-toggle="modal" onclick="saveD()">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalAdddriver" aria-hidden="true" aria-labelledby="modalAddLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAddLabel">Add New Driver</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label class="col-form-label">Driver ID:</label>
                                <input type="text" class="form-control" id="content-da-id" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Full Name:</label>
                                <input type="text " class="form-control" id="content-da-fullname" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Address:</label>
                                <input type="text " class="form-control" id="content-da-address" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Phone:</label>
                                <input type="text " class="form-control" id="content-da-phone" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Gender:</label>
                                <form action=" ">
                                    <select name="gender" id="content-da-gender" class="form-control">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </form>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Date Of Birth:</label>
                                <input type="date" class="form-control" id="content-da-birth" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Image:</label>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="file" name="images" id="images-d" />
                                </form>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Status:</label>
                                <select class="form-control" id="content-da-status">
                                    <option value="On work">On Work</option>
                                    <option value="Free">Free</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-target="#modalAdddriver" data-bs-toggle="modal" onclick="addD()">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- driver Modal End -->

        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="./node_modules/leaflet/dist/leaflet.js"></script>
    <script src="./vendors/base/vendor.bundle.base.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="js/getDataBin.js"></script>
    <script src="js/getDataVehicle.js"></script>
    <script src="js/getDataDriver.js"></script>
    <!-- <script src="js/modal.js"></script> -->
</body>

</html>