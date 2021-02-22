<?php
error_reporting(0);
    include 'includes/user_token.php';
    include 'includes/pearlfirebase.php';

    // data admin
    $reference = 'admin/'.$_SESSION['username'];
    $checkdata = $database->getReference($reference)->getValue();

    // data jadwal
    $path_jad = 'crew_jadwal';
    $checkdata_jad= $database->getReference($path_jad)->getChildKeys();

    // cetak data admin
    $nama_admin_p = $checkdata['nama_admin'];
    $photo_admin_p = $checkdata['photo_admin'];

    // data crew
    $data_crew = 'crew';
    $checkdata_crew = $database->getReference($data_crew)->getChildKeys();

        //date
    $now = date('Y-m-d');
    $week = date('Y-m-d', time() + (60 * 60 * 24 * 7));


?>

<html>

    <head>
        <title>Schedule</title>
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

                <div class="item-menu">
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
                    <li>
                        Treatment
                    </li>
                </a>
                <a href="schedule.php">
                    <li class="active-link">
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
                    Schedule Crew
                </p>
                <p class="sub-header-title">
                    Manage crew data and schedules in the system
                </p>
            </div>
        </div>

        <div class="row report-group" style="max-height:500px; overflow-y: auto;">

            <div class="col-md-10" >
                <div class="item-crew-zone">
                    <p class="title">
                        Add Crew
                    </p>
                    <p class="desc">
                        add new data crew
                    </p>
                    <a href="add_crew.php" class="btn-crew btn btn-success">
                        Add
                    </a>
                </div>
            </div>

            <?php
                foreach($checkdata_crew as $data_crew_final => $key) {

                $path_data_based_on_crew = 'crew/'.$key;
                $print_data_mycrew = $database->getReference($path_data_based_on_crew)->getValue(SORT_DESC);

                foreach($print_data_mycrew as $print_data_mycrew_final => $value_data_mycrew)
                    {}

            ?>
            <div class="col-md-4">
                <div class="item-crew col-md-12">
                    <div class="row">
                        <div class="content col-md-12">

                            <div class="info">
                                <a href="info_crew.php?nama_crew=<?php echo $print_data_mycrew['nama_crew']; ?>">
                                    <img class="primary-user-picture-circle" src="images/ic_info.png"/>
                                </a>
                            </div>

                            <div class="wrap-picture">
                                <img class="primary-user-picture-circle" src="<?php echo $print_data_mycrew['photo_crew']; ?>" />
                            </div>

                            <p class="title">
                            <?php echo $print_data_mycrew['nama_crew']; ?>
                            </p>
                            <p class="sub-title">
                            <?php echo $print_data_mycrew['status']; ?>
                            </p>

                            <form enctype='multipart/form-data' action="includes/data_model.php" method="POST">
                                <div class="form-group col-md-12">
                                    <select name="tanggal" class="form-control input-type-primary-tiketsaya" style="text-align:center;margin-bottom:5px;" data-size="4" required>
                                        <option value="">-- Pilih Tanggal --</option>
                                                        <?php
                                                        foreach($checkdata_jad as $data_jad_final => $key){
                                                            echo "<option value=$key>$key</option>";}
                                                        ?>
                                    </select>
                                    <input type="hidden" name="nama_crew" value="<?php echo $print_data_mycrew['nama_crew']; ?>"/>
                                    <input type="hidden" name="photo_crew" value="<?php echo $print_data_mycrew['photo_crew']; ?>"/>
                                    <button type="submit" name="addTanggal" class="btn btn-success btn-primary-tiketsaya" style="width:80px;border-radius:8px;margin-top:10px;">Add</button>
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
                            List Jadwal
                        </p>
                        <p class="sub-header-title">
                            Manage jadwal crew in the system
                        </p>
                    </div>
                </div>
            <div class="row report-group" style="max-height:500px; overflow-y: auto;">
                <div class="col-md-10" >
                    <div class="item-crew-zone">
                        <p class="title">
                            Add Tanggal
                        </p>
                        <p class="desc">
                            add new data tanggal crew
                        </p>
                        <form enctype='multipart/form-data' action="includes/data_model.php" method="POST">
                        <input type="date" value="<?php echo $now; ?>" name="jadwal" id="date1" min="<?php echo $now; ?>" max="<?php echo $week; ?>" class="form-control input-type-primary-tiketsaya col-md-10" style="text-align:center;margin-bottom:10px;">
                        <button type="submit" name="addJadwal" class="btn-crew btn btn-success" style="width:80px;border-radius:8px;">Add</button>
                        </form>
                    </div>
                </div>
                <div class="item-big-report col-md-12" style="width:1500px;max-height:400px; overflow-y: auto;">
                    <table class="table-wisata table-tiketsaya table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jumlah crew</th>
                                <th scope="col">Menu</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                                foreach($checkdata_jad as $data_schedule_final => $key) {
                                    

                                    $path_data_based_on_jad = 'crew_jadwal/'.$key;
                                    $print_data_jad = $database->getReference($path_data_based_on_jad)->getValue();

                            ?>

                            <tr>
                                <td><?php echo $key; ?></td>
                                <td><?php echo count($print_data_jad); ?> Crew</td>
                                <td>
                                    <a href="delete_schedule.php?tanggal=<?php echo $key; ?>" onclick="return confirm('Yakin akan dihapus ?');" class="btn btn-small-table btn-primary">Delete</a>
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