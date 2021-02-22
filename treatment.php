<?php
error_reporting(0); 
    include 'includes/user_token.php';
    include 'includes/pearlfirebase.php';

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

?>

<html>

    <head>
        <title>Treatment</title>
        <meta charset="UTF-8">s
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

                <div class="item-menu">
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
                    <li class="active-link">
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
                    Manage Treatment
                </p>
                <p class="sub-header-title">
                    Manage treatments in the system
                </p>
            </div>
        </div>


        <div class="row report-group">
                <div class="col-md-12">
                    <p class="header-title-add">
                        Treatment
                    </p>
                </div>

                <div class="col-md-10">
                    <div class="item-add-zone">
                        <p class="title">
                            Add Treatment
                        </p>
                        <p class="desc">
                            add new data treatment
                        </p>
                        <a href="add_treatment.php" class="btn-add btn btn-success">
                            Add
                        </a>
                    </div>
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
                                    <a href="treatment_detail.php?nama_treatment=<?php echo $print_data_treatment['nama_treatment']; ?>"  class="btn btn-small-table btn-primary ">Details</a>
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
                    Paket
                </p>
            </div>

        <div class="col-md-10">
                <div class="item-add-zone">
                    <p class="title">
                        Add Paket
                    </p>
                    <p class="desc">
                        add new data paket
                    </p>
                    <a href="add_treatment_package.php" class="btn-add btn btn-success">
                        Add
                    </a>
                </div>
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
                                <a href="treatment_package_detail.php?nama_treatment=<?php echo $print_data_paket['nama_treatment']; ?>" class="btn btn-small-table btn-primary ">Details</a>
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