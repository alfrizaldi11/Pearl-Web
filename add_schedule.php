<?php
    include 'includes/user_token.php';
    include 'includes/pearlfirebase.php';

        //date
        $now = date('Y-n-j');
        $week = date('Y-n-j', time() + (60 * 60 * 24 * 7));

    // dapatkan nama treatment dari url
    $schedule_url = $_GET['nama_crew'];


    // data admin
    $reference = 'admin/'.$_SESSION['username'];
    $checkdata = $database->getReference($reference)->getValue();

    // cetak data admin
    $nama_admin_p = $checkdata['nama_admin'];
    $photo_admin_p = $checkdata['photo_admin'];

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
                    Add Jadwal
                </p>
                <nav aria-label="sitemap-ts breadcrumb">
                    <ol class="breadcrumb" style="margin-left: -15px; background: none;">
                        <li class="breadcrumb-item"><a style="color: #C7C7C7;" href="wisata.php">Jadwal</a></li>
                        <li style="color: #21272C;" class="breadcrumb-item active" aria-current="page">Add
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="row report-group">

                    <div class="col-md-12">
                        <div class="item-big-report col-md-12">

                            <div class="form-new-user row">
                                <div class="col-md-8">
                                <form method="POST" action="includes/data_model.php">
                                        <div class="form-group content-sign-in">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputEmail1">Nama Crew</label>
                                            <input name="nama_crew" disabled value="<?php echo $schedule_url; ?>" type="text" class="form-control input-type-primary-tiketsaya" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                        </div>

                                        <div class="form-group content-sign-in">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputEmail1">ID Jadwal</label>
                                            <input name="id_jadwal" type="number" class="form-control input-type-primary-tiketsaya" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ID Jadwal" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Tanggal</label>
                                            <input name="tanggal" type="date" min="<?php echo $now; ?>" max="<?php echo $week; ?>" class="form-control input-type-primary-tiketsaya" id="exampleInputPassword1" placeholder="Tanggal" required>
                                        </div>

                                        <input type="hidden" name="nama_crew_url" value="<?php echo $schedule_url; ?>" />
                                        <button name="addSchedule" type="submit" class="btn btn-success btn-primary-tiketsaya">Add</button>
                                        <a href="schedule.php" style="margin-left: 10px;"
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