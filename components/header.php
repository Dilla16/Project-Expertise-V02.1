<?php
$SYSTEM_USER_AUTH = 1;
$SYSTEM_CONNECT_DB = 1;
$SYSTEM_USE_SESSION = 1;
include('../boot.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expertise</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>

    <div class="wrapper">
        <div class="overlay"></div>
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="scroll">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

            <div class="sidebar-header">
                <h2>Expertise Quarantine</h2>
            </div>
            <div class="line"></div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="../contents/index.php">Home</a>
                </li>
                <li>
                    <a href="#rtaList" data-toggle="collapse" aria-expanded="false">Data Quarantine<span class="down"><i class="fas fa-caret-down"></i></span></a>
                    <ul class="collapse list-unstyled" id="rtaList">
                        <li>
                            <a href="../contents/view.php?viewRTA=1">Sample RTA</a>
                        </li>
                        <li>
                            <a href="../contents/view.php?viewSampleNDF=1">Sample NDF</a>
                        </li>
                        <li>
                            <a href="../contents/view.php?viewManufacturing=1">Manufacturing</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#scrapList" data-toggle="collapse" aria-expanded="false">Data Scrap<span class="down"><i class="fas fa-caret-down"></i></span></a>
                    <ul class="collapse list-unstyled" id="scrapList">
                        <li>
                            <a href="../contents/Insert.php?insertScrap=1">Hold List</a>
                        </li>
                        <li>
                            <a href="../contents/view.php?viewScrap=1">Scrap List</a>
                        </li>
                    </ul>
                </li>
                <?php
                if ($_SESSION['level'] == 2 || $_SESSION['level'] == 3 ) { ?>
                <li>
                    <a href="../contents/View.php?viewUser=1">Data User</a>
                </li>
                <li>
                    <a href="#product" data-toggle="collapse" aria-expanded="false">Data Product<span class="down"><i class="fas fa-caret-down"></i></span></a>
                    <ul class="collapse list-unstyled" id="product">
                        <li>
                            <a href="../contents/view.php?viewProduct=1">Insert Product</a>
                        </li>

                    </ul>
                </li>
                <?php } ?>
                <!-- <li>
                    <a href="#scrapList" data-toggle="collapse" aria-expanded="false">Data Scrap<span class="down"><i class="fas fa-caret-down"></i></span></a>
                    <ul class="collapse list-unstyled" id="scrapList">
                        <li>
                            <a href="../contents/Insert.php?insertScrap=1">Scrap RTA</a>
                        </li>
                        <li>
                            <a href="../contents/view.php?viewScrap=1">View Scrap</a>
                        </li>
                    </ul>
                </li>
                <?php
                //if ($_SESSION['level'] == 2) { ?>
                    <li>
                        <a href="#userList" data-toggle="collapse" aria-expanded="false">Data User<span class="down"><i class="fas fa-caret-down"></i></span></a>
                        <ul class="collapse list-unstyled" id="userList">
                            <li>
                                <a href="../contents/Insert.php?insertUser=1">Add User</a>
                            </li>
                            <li>
                                <a href="../contents/view.php?viewUser=1.php">View User</a>
                            </li>
                        </ul>
                    </li>
                <?php // } ?> -->
                <li>
                    <a href="#">About</a>
                </li>
            </ul>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-success">
                    <i class="fas fa-align-justify"></i>
                    <span>Menu</span>
                </button>

                <div class="" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <div class="nav-link" title="Sesa">Hello, &nbsp<?= $_SESSION['sesa'] ?>&nbsp;|</div>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="../auth/logout.php"><i class="fas fa-power-off"></i>&nbsp;Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        </div>
    </div>




</body>

</html>