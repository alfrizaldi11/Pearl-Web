<?php
error_reporting(0);
    include 'includes/user_token.php';
    include 'includes/pearlfirebase.php';

    // dapatkan nama treatment dari url
    $antrian_crew_url = $_GET['nama_crew'];
    $antrian_tanggal_url = $_GET['tanggal'];
    $antrian_id_url = $_GET['id_antrian'];
    $username_url = $_GET['username'];
    $id_schedule_url = $_GET['id_schedule'];

    // data detail treatment
    $path_myantrian_detail = 'antrian/'.$antrian_crew_url.'/'.$antrian_tanggal_url.'/'.$antrian_id_url;
    $checkdata_myantrian_detail= $database->getReference($path_myantrian_detail)->getValue();

    // data detail treatment
    $path_mycus = 'antrian/'.$antrian_crew_url.'/'.$antrian_tanggal_url.'/'.$antrian_id_url.'/myinfo';
    $checkdata_mycus= $database->getReference($path_mycus)->getValue();

    $path_mycustreatment ='customer/'.$username_url.'/myschedule/mytreatmentfix/'.$id_schedule_url;
    $checkdata_mycustreatment= $database->getReference($path_mycustreatment)->getChildKeys();

    // data admin
    $reference = 'admin/'.$_SESSION['username'];
    $checkdata = $database->getReference($reference)->getValue();

    // cetak data admin
    $nama_admin_p = $checkdata['nama_admin'];
    $photo_admin_p = $checkdata['photo_admin'];



?>

<html>

    <head>
        <title>Antrian</title>
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

                <div class="item-menu">
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
                    <li class="active-link">
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
                    Antrian Update
                </p>
                <nav aria-label="sitemap-ts breadcrumb">
                    <ol class="breadcrumb" style="margin-left: -15px; background: none;">
                        <li class="breadcrumb-item"><a style="color: #C7C7C7;" href="antrian.php">Antrian</a></li>
                        <li style="color: #21272C;" class="breadcrumb-item active" aria-current="page"><?php echo $checkdata_myantrian_detail['username'];?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="row report-group">

                    <div class="col-md-12">
                        <div class="item-big-report col-md-12">

                        <div class="row user-wisata-places" style="max-height: 380px; overflow-y: auto;" >
                                <div class="col-md-12">
                                    <p class="title">
                                    <?php echo $checkdata_myantrian_detail['username']; ?> Treatment
                                    </p>
                                    <hr>
                                </div>
                                <?php
                                    $total=0;
                                    $username_url = $_GET['username'];
                                    $id_schedule_url = $_GET['id_schedule'];
                                    foreach($checkdata_mycustreatment as $data_mycustreatment_final => $key) {

                                        $path_data_based_on_mycustreatment = 'customer/'.$username_url.'/myschedule/mytreatmentfix/'.$id_schedule_url.'/'.$key;
                                        $print_data_mycustreatment = $database->getReference($path_data_based_on_mycustreatment)->getValue();

                                        foreach($print_data_mycustreatment as $print_data_mycustreatment_final => $value_data_mycustreatment)
                                        {}


                                ?>
                                    <div class="item-wisata-place col-md-3">
                                        <img src="<?php echo $print_data_mycustreatment['photo_treatment']; ?>" alt="">
                                        <p class="title-info-wisata-place">
                                        <?php echo $print_data_mycustreatment['nama_treatment']; ?>
                                        </p>
                                        <p class="subtitle-info-wisata-place">
                                        <?php echo $print_data_mycustreatment['harga_treatment']; ?> K
                                        </p>
                                        <p class="thirdtitle-info-wisata-place">
                                        Catatan: <?php echo $print_data_mycustreatment['catatan']; ?>
                                        </p>
                                    </div>
                                    <?php $mytotal=$total+=$print_data_mycustreatment['harga_treatment'];?>
                                <?php } ?>
                        
                            </div>
                                    <div class="item-wisata-place col-md-3">
                                        <p class="title-info-wisata-place" style="font-size:20px;">
                                        Total: <?php echo $mytotal ?> K
                                        </p>
                                    </div>   
                            <hr>

                            <div class="form-new-user row">
                                <div class="col-md-10">
                                <form method="POST" action="includes/data_model.php">
                                        <div class="form-group content-sign-in">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputEmail1">Username</label>
                                            <input name="username" disabled value="<?php echo $checkdata_myantrian_detail['username']; ?>" type="text" class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" required>
                                                <input type="hidden" name="username" value="<?php echo $checkdata_myantrian_detail['username'];?>"/>
                                        </div>

                                        <div class="form-group content-sign-in">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputEmail1">Antrian</label>
                                            <input name="id_antrian" disabled value="<?php echo $checkdata_myantrian_detail['id_antrian']; ?>" type="text" class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Antrian" required>
                                        </div>

                                        <div class="form-group content-sign-in"">
                                            <label class="title-input-type-primary-tiketsaya"
                                            for="exampleInputEmail1">Status</label>
                                            <select name="status" class="form-control input-type-primary-tiketsaya">
                                            <option value="<?php echo $checkdata_myantrian_detail['status']; ?>"><?php echo $checkdata_myantrian_detail['status']; ?></option>
                                                <option value="">-- Pilih Status Antrian --</option>
                                                <option value="Menunggu Antrian">Menunggu Antrian</option>
                                                <option value="Sedang Dilayani">Sedang Dilayani</option>
                                                <option value="Selesai">Selesai</option>
                                                <option value="Cancel">Cancel</option>
                                            </select>
                                        </div>

                                            <br>
                                            <br>
                                        
                                        <input type="hidden" name="antrian_url" value="<?php echo $checkdata_myantrian_detail['id_antrian']; ?>"/>
                                        <input type="hidden" name="antriancrew_url" value="<?php echo $antrian_crew_url?>"/>
                                        <input type="hidden" name="antriantanggal_url" value="<?php echo $antrian_tanggal_url?>"/>
                                        <input type="hidden" name="id_schedule" value="<?php echo $id_schedule_url?>"/>
                                        <input type="hidden" name="total" value="<?php echo $mytotal?>"/>
                                        <button name="updateAntrian" type="submit" class="btn btn-success btn-primary-tiketsaya">Save</button>
                                        <a href="antrian.php" style="margin-left: 10px;"
                                            class="btn btn-cancel-secondary">Cancel</a>
                                    </form>
                                </div>
                            </div>

                        </div>



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