<?php
error_reporting(0);
    include 'includes/user_token.php';
    include 'includes/pearlfirebase.php';

    // dapatkan nama treatment dari url
    $cus_url = $_GET['username'];
    $id_schedule_url = $_GET['id_schedule'];

    // data detail treatment
    $path_mycus = 'customer/'.$cus_url.'/myschedule/myinfofix/'.$id_schedule_url;
    $checkdata_mycus= $database->getReference($path_mycus)->getValue();
    
    // data detail treatment
    $path_mycustreatment = 'customer/'.$cus_url.'/myschedule/mytreatmentfix/'.$id_schedule_url;
    $checkdata_mycustreatment= $database->getReference($path_mycustreatment)->getValue();

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
                    Detail Info
                </p>
                <nav aria-label="sitemap-ts breadcrumb">
                    <ol class="breadcrumb" style="margin-left: -15px; background: none;">
                        <li class="breadcrumb-item"><a style="color: #C7C7C7;" href="customer.php">Info</a></li>
                        <li style="color: #21272C;" class="breadcrumb-item active" aria-current="page">
                        <?php echo $id_schedule_url; ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row report-group">

            <div class="col-md-12">
                <div class="item-big-report col-md-12">

                    <div class="row">
                        <div class="col-4">
                            <p class="total-balance">
                                Jadwal: <span class="value-balance"><?php echo $checkdata_mycus['jadwal']; ?></span>
                            </p>
                        </div>
                    </div>

                    <div class="row user-wisata-places">
                        <div class="col-md-12">
                            <p class="title">
                            <?php echo $cus_url; ?> Treatment
                            </p>
                            <hr>
                        </div>
                        <?php

                            // extract data
                            $total=0;
                            foreach($checkdata_mycustreatment as $checkdata_mycustreatment_final => $checkdata_mycustreatment_value) {

                        ?>
                            <div class="item-wisata-place col-md-3">
                                <img src="<?php echo $checkdata_mycustreatment_value['photo_treatment']; ?>" alt="">
                                <p class="title-info-wisata-place">
                                <?php echo $checkdata_mycustreatment_value['nama_treatment']; ?>
                                </p>
                                <p class="subtitle-info-wisata-place">
                                <?php echo $checkdata_mycustreatment_value['harga_treatment']; ?> K
                                </p>
                                <p class="thirdtitle-info-wisata-place">
                                Catatan: <?php echo $checkdata_mycustreatment_value['catatan']; ?>
                                </p>
                                <div>
                                    <form method="POST" action="includes/data_model.php">
                                        <input type="hidden" name="id_treatment" value="<?php echo $checkdata_mycustreatment_value['id_treatment']; ?>" />
                                        <input type="hidden" name="username" value="<?php echo $cus_url; ?>" />
                                        <input type="hidden" name="id_schedule" value="<?php echo $id_schedule_url; ?>" />
                                        <button name="deleteCustreatment" type="submit" onclick="return confirm('Yakin akan dihapus ?');" class="btn btn-success btn-primary-tiketsaya-second" style="margin-top:5px; color:#FFF;">
                                            X
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <?php $mytotal=$total+=$checkdata_mycustreatment_value['harga_treatment'];?>
                        <?php } ?>

                    </div>
                    <hr>
                        <div class="item-wisata-place col-md-3">
                            <p class="title-info-wisata-place" style="font-size:20px;">
                                Total: <?php echo $mytotal ?> K
                            </p>
                        </div>   



                </div>



            </div>



        </div>


    </div>
    </div>


    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>

</html>