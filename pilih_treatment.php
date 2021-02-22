<?php
error_reporting(0); 
    include 'includes/user_token.php';
    include 'includes/pearlfirebase.php';
    
    // dapatkan nama treatment dari url
    $crew_url = $_GET['nama_crew'];
    $cus_url = $_GET['username'];
    $jadwal_url = $_GET['tanggal'];
    $id_schedule = $_GET['id_schedule'];

    // data admin
    $reference = 'admin/'.$_SESSION['username'];
    $checkdata = $database->getReference($reference)->getValue();

    // cetak data admin
    $nama_admin_p = $checkdata['nama_admin'];
    $photo_admin_p = $checkdata['photo_admin'];

    // data treatment
    $data_treatment = 'treatment/detail';
    $checkdata_treatment = $database->getReference($data_treatment)->getChildKeys();

    // data paket
    $data_paket = 'treatment/paket';
    $checkdata_paket = $database->getReference($data_paket)->getChildKeys();

    // data detail treatment
    $path_mycustreatment = 'customer/'.$cus_url.'/myschedule/mytreatmentfix/'.$id_schedule;
    $checkdata_mycustreatment= $database->getReference($path_mycustreatment)->getValue();

    $data_antrian = 'antrian/'.$crew_url.'/'.$jadwal_url;
    $checkdata_antrian = $database->getReference($data_antrian)->getChildKeys();
    
    $status = 'Menunggu Antrian';
    $id_antrian = count($checkdata_antrian);

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
                    Choose Treatment
                </p>
                <p class="sub-header-title">
                    Pick the treatments
                </p>
            </div>
        </div>


        <div class="row report-group">

                <div class="col-md-10">
                    <div class="item-addtreat-zone">
                                <div class="row user-wisata-places">
                                    <?php

                                        // extract data
                                        $total=0;
                                        $waktu=0;
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
                                                    <input type="hidden" name="id_schedule" value="<?php echo $id_schedule; ?>" />
                                                    <button name="deleteCustreatment" type="submit" onclick="return confirm('Yakin akan dihapus ?');" class="btn btn-success btn-primary-tiketsaya-second" style="margin-top:5px; color:#FFF;">
                                                        X
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <?php 
                                            $mytotal=$total+=$checkdata_mycustreatment_value['harga_treatment'];
                                        ?>

                                        <?php 
                                            $mytotalwaktu=$waktu+=$checkdata_mycustreatment_value['waktu'];
                                        ?>
                                    <?php } ?>

                                </div>
                            <hr>
                                    <div class="item-wisata-place col-md-3">
                                        <p class="title-info-wisata-place" style="font-size:20px;">
                                            Total: <?php echo $mytotal ?> K
                                        </p>
                                    </div> 

                                    <div class="item-wisata-place col-md-3">
                                        <p class="title-info-wisata-place" style="font-size:20px;">
                                            Waktu: <?php echo $mytotalwaktu ?> Menit
                                        </p>
                                    </div>
                            <hr>

                            <form enctype='multipart/form-data' method="POST" action="includes/data_model.php">
                                    <p class="title">
                                        My info
                                    </p>
                                    <p class="desc">
                                        ID Schedule : <?php echo $id_schedule; ?> 
                                    </p>
                                    <p class="desc">
                                        Nama Crew : <?php echo $crew_url; ?> 
                                    </p>
                                    <p class="desc">
                                        Jadwal : <?php echo ($jadwal_url); ?> 
                                    </p>
                                    <input type="hidden" name="id_schedule" value="<?php echo $id_schedule; ?>"/>
                                    <input type="hidden" name="nama_crew" value="<?php echo $crew_url; ?>"/>
                                    <input type="hidden" name="jadwal" value="<?php echo $jadwal_url; ?>"/>
                                    <input type="hidden" name="status" value="<?php echo $status; ?>"/>
                                    <input type="hidden" name="id_antrian" value="<?php echo $id_antrian+1; ?>"/>
                                    <input type="hidden" name="username_url" value="<?php echo $cus_url; ?>"/>
                                    <input type="hidden" name="total_harga" value="<?php echo $mytotal; ?>"/>
                                    <input type="hidden" name="total_waktu" value="<?php echo $mytotalwaktu; ?>"/>
                                    <button type="submit" name="saveSchedule"class="btn-add btn btn-success">
                                        Save
                                    </button>
                                </form>
                        <hr> 
                    </div>
                </div>

                <div class="col-md-12">
                    <p class="header-title-add">
                        Choose Treatment
                    </p>
                </div>

            <div class="col-md-10">
                <div class="item-big-report col-md-12" style="max-height: 340px; overflow-y: auto;">
                    <table class="table-wisata table-tiketsaya table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Nama Treatment</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Group</th>
                                <th scope="col">Menu</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                            foreach($checkdata_treatment as $data_treatment_final => $key) {

                                $path_data_based_on_treatment = 'treatment/detail/'.$key;
                                $print_data_treatment = $database->getReference($path_data_based_on_treatment)->getValue();

                                foreach($print_data_treatment as $print_data_treatment_final => $value_data_treatment)
                                {}

                    ?>

                            <tr>
                                <td><?php echo $print_data_treatment['nama_treatment']; ?></td>
                                <td><?php echo $print_data_treatment['harga_treatment']; ?> K</td>
                                <td><?php echo $print_data_treatment['waktu']; ?> Menit</td>
                                <td><?php echo $print_data_treatment['group']; ?></td>
                                <td>
                                    <a href="pilih_treatment_detail.php?nama_treatment=<?php echo $print_data_treatment['nama_treatment']; ?>&username=<?php echo $cus_url; ?>&id_schedule=<?php echo $id_schedule; ?>"  class="btn btn-small-table btn-primary ">Details</a>
                                </td>
                            </tr>

                        <?php } ?>

                        </tbody>
                    </table>


                </div>



            </div>

            

        </div>


        <div class="row report-group">
            <div class="col-md-12">
                <p class="header-title-add">
                    Choose Paket
                </p>
            </div>

        <div class="col-md-10">
            <div class="item-big-report col-md-12" style="max-height: 340px; overflow-y: auto;">
                <table class="table-wisata table-tiketsaya table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">Nama Treatment</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Menu</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                            foreach($checkdata_paket as $data_paket_final => $key) {

                                $path_data_based_on_paket = 'treatment/paket/'.$key;
                                $print_data_paket = $database->getReference($path_data_based_on_paket)->getValue();

                                foreach($print_data_paket as $print_data_paket_final => $value_data_paket)
                                {}

                    ?>
                        <tr>
                            <td><?php echo $print_data_paket['nama_treatment']; ?></td>
                            <td><?php echo $print_data_paket['harga_treatment']; ?> K</td>
                            <td><?php echo $print_data_paket['waktu']; ?> Menit</td>
                            <td>
                                <a href="pilih_treatment_detail_package.php?nama_treatment=<?php echo $print_data_paket['nama_treatment']; ?>&username=<?php echo $cus_url; ?>&id_schedule=<?php echo $id_schedule; ?>"  class="btn btn-small-table btn-primary ">Details</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>


            </div>



        </div>


    </div>
    </div>


    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>

</html>