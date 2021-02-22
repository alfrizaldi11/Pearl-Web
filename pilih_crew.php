<?php
error_reporting(0);
    include 'includes/user_token.php';
    include 'includes/pearlfirebase.php';

    $schedule_url = $_GET['tanggal'];
    $cus_url = $_GET['username'];

    // data admin
    $reference = 'admin/'.$_SESSION['username'];
    $checkdata = $database->getReference($reference)->getValue();

    // cetak data admin
    $nama_admin_p = $checkdata['nama_admin'];
    $photo_admin_p = $checkdata['photo_admin'];

    // data crew
    $data_crew = 'crew_jadwal/'.$schedule_url;
    $checkdata_crew = $database->getReference($data_crew)->getChildKeys();

    $id_schedule = mt_rand();

?>

<html>

    <head>
        <title>Treatment Customer</title>
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
                    Choose Crew
                </p>
                <p class="sub-header-title">
                    Pick the crew for treatment
                </p>
            </div>
        </div>

        <div class="row report-group" style="max-height: 800px; overflow-y: auto;">

        <?php
                $schedule_url = $_GET['tanggal'];
                foreach($checkdata_crew as $data_crew_final => $key) {

                $path_data_based_on_crew = 'crew_jadwal/'.$schedule_url.'/'.$key;
                $print_data_mycrew = $database->getReference($path_data_based_on_crew)->getValue();

                foreach($print_data_mycrew as $print_data_mycrew_final => $value_data_mycrew)
                    {}



            ?>

            <div class="col-md-4">
                <div class="item-crew col-md-12">
                    <div class="row">
                        <div class="content col-md-12">

                            <div class="wrap-picture">
                                <img class="primary-user-picture-circle" src="<?php echo $print_data_mycrew['photo_crew']; ?>" />
                            </div>

                            <p class="title">
                                <?php echo $print_data_mycrew['nama_crew']; ?>
                            </p>
                            <p class="sub-title">
                                <?php echo $print_data_mycrew['status']; ?>
                            </p>

                            <a href="pilih_treatment.php?nama_crew=<?php echo $print_data_mycrew['nama_crew']; ?>&username=<?php echo $cus_url; ?>&tanggal=<?php echo $schedule_url; ?>&id_schedule=<?php echo $id_schedule; ?>" class="btn btn-view btn-primary btn-primary-tiketsaya">Pilih Crew</a>

                        </div>
                    </div>
                </div>
            </div>

         <?php } ?>

        </div>


    </div>
    </div>


    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>

</html>