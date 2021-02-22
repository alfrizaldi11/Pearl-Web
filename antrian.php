<?php
error_reporting(0);
    include 'includes/user_token.php';
    include 'includes/pearlfirebase.php';

    //date
    $now = date('Y-m-d');
    $week = date('Y-m-d', time() + (60 * 60 * 24 * 7));

    // data admin
    $reference = 'admin/'.$_SESSION['username'];
    $checkdata = $database->getReference($reference)->getValue();

    // cetak data admin
    $nama_admin_p = $checkdata['nama_admin'];
    $photo_admin_p = $checkdata['photo_admin'];

    // data crew
    $data_crew = 'crew';
    $checkdata_crew = $database->getReference($data_crew)->getChildKeys();
    
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
                    Antrian
                </p>
                <p class="sub-header-title">
                    Select crew to set antrian
                </p>
            </div>
        </div>

        <div class="row report-group" style="max-height: 440px; overflow-y: auto;">

        <?php
                foreach($checkdata_crew as $data_crew_final => $key) {

                $path_data_based_on_crew = 'crew/'.$key;
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

                            <form enctype='multipart/form-data' action="#" method="POST">
                                <div class="form-group col-md-12">
                                    <input type="date" value="<?php echo $now; ?>" name="date1" id="date1" min="<?php echo $now; ?>" max="<?php echo $week; ?>" class="form-control input-type-primary-tiketsaya" style="text-align:center;">
                                    <input type="hidden" name="nama_crew" value="<?php echo $print_data_mycrew['nama_crew']; ?>"/>
                                    <button type="submit" name="submit_crew" class="btn btn-success btn-primary-tiketsaya" style="width:80px;border-radius:8px;">Search</button>
                                </div>
                            </form>


                        </div>
                        
                    </div>
                </div>
            </div>

         <?php } ?>

        </div>

        <div class="header row">
            <div class="col-md-12">
                <p class="header-title">
                    List Antrian
                </p>
            </div>
        </div>
                        <div class="col-md-12">
                                <div class="item-big-report col-md-12" style="max-height: 500px; overflow-y: auto;">
                                    <table class="table-wisata table-tiketsaya table table-borderless">
                                        <thead>
                                            <tr>
                                            <th scope="col">Username</th>
                                            <th scope="col">Antrian</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Menu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            include 'includes/pearlfirebase.php';

                                            if (isset($_POST['submit_crew'])) {
                                                $date = $_POST['date1'];
                                                $namacrew = $_POST['nama_crew'];
                                            
                                                if (!empty($date)) {
                                                    // perintah tampil data berdasarkan periode bulan
                                                    $data_antrian_crew = 'antrian/'.$namacrew.'/'.$date.'/';
                                                    $checkdata_antrian = $database->getReference($data_antrian_crew)->getChildKeys();
                                                } else {
                                                    echo "Data kosong !. Harap isi kolom tanggal."; 
                                                }
                                            
                                            }else {
                                                echo "Data kosong !. Harap isi kolom tanggal."; 
                                            }
                                            foreach($checkdata_antrian as $data_antrian_final => $key) {
                                                $path_data_based_on_myantrian = 'antrian/'.$namacrew.'/'.$date.'/'.$key;
                                                $print_data_myantrian = $database->getReference($path_data_based_on_myantrian)->orderByChild("id_antrian")->getValue();

                                                foreach($print_data_myantrian as $print_data_antrian_final => $value_data_antrian)
                                                {}

                                    ?>
                                            <tr>
                                                <td><?php echo $print_data_myantrian['username']; ?></td>
                                                <td><?php echo $print_data_myantrian['id_antrian']; ?></td>
                                                <td><?php echo $print_data_myantrian['status']; ?></td>
                                                <td>
                                                    <a href="antrian_update.php?nama_crew=<?php echo $namacrew;?>&tanggal=<?php echo $date;?>&id_antrian=<?php echo $print_data_myantrian['id_antrian']; ?>&username=<?php echo $print_data_myantrian['username']; ?>&id_schedule=<?php echo $print_data_myantrian['id_schedule']; ?>" class="btn btn-small-table btn-primary ">Update</a>
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