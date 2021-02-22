<?php
error_reporting(0);
    include 'includes/user_token.php';
    include 'includes/pearlfirebase.php';

    // dapatkan nama treatment dari url
    $cus_url = $_GET['username'];

    // data detail treatment
    $path_cus = 'customer/'.$cus_url.'/myschedule/myinfofix';
    $checkdata_cus= $database->getReference($path_cus)->getChildKeys();

    // data admin
    $reference = 'admin/'.$_SESSION['username'];
    $checkdata = $database->getReference($reference)->getValue();

    // cetak data admin
    $nama_admin_p = $checkdata['nama_admin'];
    $photo_admin_p = $checkdata['photo_admin'];


?>

<html>

    <head>
        <title>Customer</title>
        <meta charset="UTF-8">
        <meta name="description" content="Login Pearl Admin">
        <meta name="keywords" content="Pearl, Web Dashboard Pearl, Login Pearl">
        <meta name="author" content="Alfian">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
            integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>

<body>


    <div class="side-left">
        <div class="shortcut" onmouseover="showAdminProfile()">
            <div class="emblemapp">
                <img src="images/logo_pearl.png" height="29" alt="">
            </div>
            <div class="menus">

                <div class="item-menu inactive">
                    <a href="index.php">
                        <p class="icon-item-menu">
                            <i class="fab fa-delicious"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="antrian.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-bullhorn"></i>
                        </p>
                    </a>
                </div>
                
                <div class="item-menu inactive">
                    <a href="report.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-book"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="treatment.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-clipboard-list"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="schedule.php">
                        <p class="icon-item-menu">
                            <i class="far fa-calendar-alt"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu">
                    <a href="customer.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-users"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="setting.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-cog"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="includes/user_destroy.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-power-off"></i>
                        </p>
                    </a>
                </div>
            </div>
        </div>
        <div class="admin-profile" id="sl_ap" onmouseover="showAdminProfile()" onmouseout="hideAdminProfile()">
            <div class="admin-picture">
                <img src="<?php echo $photo_admin_p; ?> " alt="">
            </div>
            <p class="admin-name">
            <?php echo $nama_admin_p; ?>
            </p>
            <p class="admin-level">
                Super Admin
            </p>
            <ul class="admin-menus">
                <a href="index.php">
                    <li>
                        My Dashboard
                    </li>
                </a>
                <a href="antrian.php">
                    <li>
                        Antrian
                    </li>
                </a>
                <a href="report.php">
                    <li>
                        Report
                    </li>
                </a>
                <a href="treatment.php">
                    <li>
                        Treatment
                    </li>
                </a>
                <a href="schedule.php">
                    <li>
                        Schedule
                    </li>
                </a>
                <a href="customer.php">
                    <li class="active-link">
                        Customers
                    </li>
                </a>
                <a href="setting.php">
                    <li>
                        Settings
                    </li>
                </a>
                <a href="includes/user_destroy.php">
                    <li style="padding-top: 120px;">
                        Log Out
                    </li>
                </a>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="header row">
            <div class="col-md-12">
                <p class="header-title">
                    Info Customer
                </p>
                <nav aria-label="sitemap-ts breadcrumb">
                    <ol class="breadcrumb" style="margin-left: -15px; background: none;">
                        <li class="breadcrumb-item"><a style="color: #C7C7C7;" href="customer.php">Customer</a></li>
                        <li style="color: #21272C;" class="breadcrumb-item active" aria-current="page">
                            Info
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row report-group">

        <div class="col-md-10">
            <div class="item-big-report col-md-12">

                <table class="table-wisata table-tiketsaya table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">ID Schedule</th>
                            <th scope="col">Jadwal</th>
                            <th scope="col">Nama Crew</th>
                            <th scope="col">Jumlah Treatment</th>
                            <th scope="col">Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php    
                            $cus_url = $_GET['username'];
                            foreach($checkdata_cus as $data_cus_final => $key) {

                                $path_data_based_on_cus = 'customer/'.$cus_url.'/myschedule/myinfofix/'.$key;
                                $print_data_cus = $database->getReference($path_data_based_on_cus)->getValue();

                                foreach($print_data_cus as $print_data_cus_final => $value_data_cus)
                                {}

                                $path_place_tr = 'customer/'.$cus_url.'/myschedule/mytreatmentfix/'.$key;
                                $checkdata_place = $database->getReference($path_place_tr)->getValue();

                        ?>
                        <tr>
                            <td><?php echo $print_data_cus['id_schedule']; ?></td>
                            <td><?php echo $print_data_cus['jadwal']; ?></td>
                            <td><?php echo $print_data_cus['nama_crew']; ?></td>
                            <td><?php echo count($checkdata_place); ?> Treatment</td>
                            <td>
                                <a href="customer_info_detail.php?id_schedule=<?php echo $print_data_cus['id_schedule']; ?>&username=<?php echo $cus_url; ?>" class="btn btn-small-table btn-primary ">Details</a>
                            </td>
                        </tr>

                    <?php } ?>

                    </tbody>
                </table>


            </div>



        </div>

        

    </div>


    </div>
    </div>


    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>

</html>