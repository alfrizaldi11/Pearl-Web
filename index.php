<?php
error_reporting(0);
    include 'includes/user_token.php';
    include 'includes/pearlfirebase.php';

    //date
    $now = date('Y-m-d');

    // data admin
    $reference = 'admin/'.$_SESSION['username'];
    $checkdata = $database->getReference($reference)->getValue();

    // data customer
    $data_customer = 'customer';
    $checkdata_customer = $database->getReference($data_customer)->getValue();

     // data customer
    $data_infocustomer = 'customer';
    $checkdata_infocustomer = $database->getReference($data_infocustomer)->getChildKeys();

    // data customer
    $data_crew = 'crew';
    $checkdata_crew = $database->getReference($data_crew)->getValue();

    // data customer
    $data_treatment = 'treatment/detail';
    $checkdata_treatment = $database->getReference($data_treatment)->getChildKeys();

    $data_report = 'report/Selesai/';
    $checkdata_report = $database->getReference($data_report)->orderByChild('tanggal')->equalTo($now)->getValue();

    // cetak data admin
    $nama_admin_p = $checkdata['nama_admin'];
    $photo_admin_p = $checkdata['photo_admin'];


?>


<html>

    <head>
        <title>Dashboard</title>
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

                <div class="item-menu">
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

                <div class="item-menu inactive">
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
                    <a href="includes/user_destroy.php" onclick="return confirm('Lanjut logout ?');">
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
                    <li class="active-link">
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
                    <li>
                        Customers
                    </li>
                </a>
                <a href="setting.php">
                    <li>
                        Settings
                    </li>
                </a>
                <a href="includes/user_destroy.php" onclick="return confirm('Lanjut logout ?');">
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
                    My Dashboard
                </p>
                <br>
            </div>
        </div>
        <div class="row report-group">

            <div class="col-md-3">
                <div class="item-report col-md-12">
                    <div class="row">
                        <div class="content col-md-12">
                            <img src="images/icon_total_income.png" alt="">
                            <p class="title-item">
                                IN COMES
                            </p>
                            <p class="subtitle-item">
                                Incomes Today
                            </p>
                            <?php
                                $total=0;
                                foreach($checkdata_report as $data_report_final => $value_data_report) {

                                $mytotal=$total+=$value_data_report['total'];
                                }
                            ?>

                            <p class="value-item">
                            <?php 
                                if($mytotal == 0){
                                    echo '0';
                                }else{
                                    echo $mytotal; 
                                }
                                ?> K
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="item-report col-md-12">
                    <div class="row">
                        <div class="content col-md-12">
                            <img src="images/icon_total_pengguna_new.png" alt="">
                            <p class="title-item">
                                CUSTOMERS
                            </p>
                            <p class="subtitle-item">
                                Customer registered
                            </p>
                            <p class="value-item">
                            <?php echo count($checkdata_customer); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="item-report col-md-12">
                    <div class="row">
                        <div class="content col-md-12">
                            <img src="images/icon_total_antrian.png" alt="">
                            <p class="title-item">
                                CREW
                            </p>
                            <p class="subtitle-item">
                                Treatment Sevice
                            </p>
                            <p class="value-item">
                            <?php echo count($checkdata_crew); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="item-report col-md-12">
                    <div class="row">
                        <div class="content col-md-12">
                            <img src="images/icon_total_treatment.png" alt="">
                            <p class="title-item">
                                TREATMENT
                            </p>
                            <p class="subtitle-item">
                                Treatment Available
                            </p>
                            <p class="value-item">
                            <?php echo count($checkdata_treatment); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row report-group">

            <div class="col-md-6">
                <div class="item-big-report-new col-md-12" style="overflow-y: auto;">
                    <p class="title">
                        <span class="title-blue">CUSTOMER</span> PEARL
                    </p>
                    <br>
                    <a href="customer.php" class="btn btn-small btn-success btn-primary-tiketsaya">See More</a>

                    <div class="divider-line"></div>
                    <?php
                            foreach($checkdata_infocustomer as $data_customer_final => $key) {

                                $path_data_based_on_username = 'customer/'.$key.'/info_customer';
                                $print_data_user_profile = $database->getReference($path_data_based_on_username)->getValue(SORT_DESC);

                                foreach($print_data_user_profile as $print_data_user_profile_final => $value_data_user_profile)
                                {}

                    ?>

                    <div class="user-item">
                        <div class="user-picture">
                            <img src="<?php echo $print_data_user_profile['url_photo_profile']; ?>" alt="">
                        </div>
                        <div class="user-info">
                            <p class="title">
                            <?php echo $print_data_user_profile['firstname']; ?>
                            </p>
                            <br>
                            <p class="sub-title">
                            <?php echo $print_data_user_profile['username']; ?>
                            </p>
                        </div>
                        <a href="customer_profile.php?username=<?php echo $print_data_user_profile['username']; ?>" class="btn btn-small-border btn-success ">View Profile</a>
                    </div>

                    <?php } ?>

                </div>

            </div>

            <div class="col-md-6">
                <div class="item-big-report-new col-md-12" style="overflow-y: auto;">
                    <p class="title">
                        <span class="title-blue">TREATMENT</span> PEARL
                    </p>
                    <br>
                    <a href="treatment.php" class="btn btn-small btn-success btn-primary-tiketsaya">See More</a>

                    <div class="divider-line"></div>

                    <?php
                            foreach($checkdata_treatment as $data_treatment_final => $key) {

                                $path_data_based_on_treatment = 'treatment/detail/'.$key;
                                $print_data_treatment = $database->getReference($path_data_based_on_treatment)->getValue();

                                foreach($print_data_treatment as $print_data_treatment_final => $value_data_treatment)
                                {}

                    ?>

                    <div class="treatment-item">
                        <div class="treatment-picture">
                            <img src="<?php echo $print_data_treatment['photo_treatment']; ?>" alt="">
                        </div>
                        <div class="treatment-info">
                            <p class="title">
                            <?php echo $print_data_treatment['nama_treatment']; ?>
                            </p>
                            <br>
                            <p class="sub-title">
                            <?php echo $print_data_treatment['keterangan']; ?>
                            </p>
                        </div>
                        <a href="treatment_detail.php?nama_treatment=<?php echo $print_data_treatment['nama_treatment']; ?>" class="btn btn-small-border btn-success ">Details</a>
                    </div>

                    <?php } ?>

                </div>

            </div>



        </div>
    </div>
    </div>


    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

    </body>

</html>