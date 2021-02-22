<?php
error_reporting(0);
    include 'includes/user_token.php';
    include 'includes/pearlfirebase.php';

    // dapatkan nama treatment dari url
    $treatment_url = $_GET['nama_treatment'];
    $cus_url = $_GET['username'];
    $id_schedule = $_GET['id_schedule'];

    // data detail treatment
    $path_paket_details = 'treatment/paket/'.$treatment_url;
    $checkdata_paket_details= $database->getReference($path_paket_details)->getValue();

    // data admin
    $reference = 'admin/'.$_SESSION['username'];
    $checkdata = $database->getReference($reference)->getValue();

    // cetak data admin
    $nama_admin_p = $checkdata['nama_admin'];
    $photo_admin_p = $checkdata['photo_admin'];
    
    $id_treat = mt_rand();

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
                    Detail Paket
                </p>
                <nav aria-label="sitemap-ts breadcrumb">
                    <ol class="breadcrumb" style="margin-left: -15px; background: none;">
                        <li class="breadcrumb-item"><a style="color: #C7C7C7;" href="#">Package</a></li>
                        <li style="color: #21272C;" class="breadcrumb-item active" aria-current="page"><?php echo $checkdata_paket_details['nama_treatment']; ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row report-group">

            <div class="col-md-12">
                <div class="item-big-report col-md-8">


                    <div class="row">

                        <div class="col-md-10">
                            
                        <form method="POST" action="includes/data_model.php">
                                <div class="thumbnail-box col-md-5">
                                <label class="title-input-type-primary-tiketsaya" for="exampleInputEmail1">Photo Treatment</label>
                                    <img class="thumbnail-wisata" src="<?php echo $checkdata_paket_details['photo_treatment']; ?>" alt="">
                                    <input type="hidden" name="photo_treatment" value="<?php echo $checkdata_paket_details['photo_treatment']; ?>"/>
                                </div>
                                <div class="form-group content-sign-in">
                                    <label class="title-input-type-primary-tiketsaya" for="exampleInputEmail1">Nama Treatment</label>
                                    <input disabled name="nama_treatment" value="<?php echo $checkdata_paket_details['nama_treatment']; ?>" class="form-control input-type-primary-tiketsaya"/>
                                    <input type="hidden" name="nama_treatment" value="<?php echo $checkdata_paket_details['nama_treatment']; ?>"/> 
                                </div>
                                <div class="form-group">
                                    <label class="title-input-type-primary-tiketsaya" for="exampleInputPassword1">Keterangan</label>
                                    <input disabled name="keterangan" value="<?php echo $checkdata_paket_details['keterangan']; ?>" class="form-control input-type-primary-tiketsaya"/>
                                    <input type="hidden" name="keterangan" value="<?php echo $checkdata_paket_details['keterangan']; ?>"/>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Harga Treatment</label>
                                            <input disabled name="harga_treatment" value="<?php echo $checkdata_paket_details['harga_treatment']; ?>" class="form-control input-type-primary-tiketsaya"/>
                                            <input type="hidden" name="harga_treatment" value="<?php echo $checkdata_paket_details['harga_treatment']; ?>"/>
                                        </div>
                                        <div style="padding-left: 0px; margin-top: 15px;" class="col-md-1">
                                            <br>
                                            <h5>K</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Waktu</label>
                                            <input disabled name="waktu" value="<?php echo $checkdata_paket_details['waktu']; ?>" class="form-control input-type-primary-tiketsaya"/>
                                            <input type="hidden" name="waktu" value="<?php echo $checkdata_paket_details['waktu']; ?>"/>
                                        </div>
                                        <div style="padding-left: 0px; margin-top: 15px;" class="col-md-1">
                                            <br>
                                            <h6>Menit</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="title-input-type-primary-tiketsaya"
                                        for="exampleFormControlTextarea1">Deskripsi Treatment</label>
                                    <textarea disabled class="input-type-primary-tiketsaya form-control" id="exampleFormControlTextarea1" rows="8"><?php echo $checkdata_paket_details['deskripsi']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="title-input-type-primary-tiketsaya"
                                        for="exampleFormControlTextarea1">Catatan</label>
                                    <textarea name="catatan" class="input-type-primary-tiketsaya form-control" id="exampleFormControlTextarea1" rows="3" required>-</textarea>
                                </div>

                                <input type="hidden" name="treatment_url" value="<?php echo $checkdata_paket_details['nama_treatment']; ?>" />
                                <input type="hidden" name="id_treatment" value="<?php echo $id_treat; ?>" />
                                <input type="hidden" name="username_url" value="<?php echo $cus_url; ?>"/>
                                <input type="hidden" name="id_schedule" value="<?php echo $id_schedule; ?>"/>
                                <button type="submit" name="pilihPaket" class="btn btn-success btn-primary-tiketsaya">Save</button>
                            </form>
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