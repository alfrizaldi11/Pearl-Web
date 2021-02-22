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

    $data_report2 = 'report/Cancel/';
    $checkdata_report2 = $database->getReference($data_report2)->getValue();
    
    // data paket
    $data_paket = 'treatment/paket';
    $checkdata_paket = $database->getReference($data_paket)->getChildKeys();

?>

<html>

    <head>
        <title>Report</title>
        <meta charset="UTF-8">
        <meta name="description" content="Login Pearl Admin">
        <meta name="keywords" content="Pearl, Web Dashboard Pearl, Login Pearl">
        <meta name="author" content="Alfian">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
            integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <script src="js/Chart.js"></script>
    </head>

<body>


    <div class="side-left-second">
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

                <div class="item-menu">
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
                    <li>
                        Antrian
                    </li>
                </a>
                <a href="report.php">
                    <li class="active-link">
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
                    Report
                </p>
                <p class="sub-header-title">
                    Manage reports in the system
                </p>
            </div>
        </div>

        <br>
        <hr>
        <div class="col-md-12">
            <p class="header-title-add">
            Crew Performance Graph
            </p>
            <p class="sub-header-title-add">
                Total Treatment Complete
            </p>
        </div>
        <canvas id="myChart" style="width:50px;height:20px;"></canvas>

        <div class="row report-group">
                <div class="col-md-12">
                    <p class="header-title-add">
                        Report
                    </p>
                </div>

                <div class="col-md-10">
                    <div class="item-add-zone">
                        <p class="title">
                            Report Selesai
                        </p>
                        <p class="desc">
                            Antrian completed
                        </p>
                    </div>
                    <div class="col-md-8">
						<form method="POST" action="" class="form-inline">
                            <input type="date" name="date" id="date" class="form-control mr-2" style="width:300px;height:40px;margin-top:10px;">
                            <button type="submit" name="submit" class="btn btn-success btn-primary-tiketsaya mr-2" style="width:80px;border-radius:8px;">Search</button>
                        </form>
					</div>
                </div>

            <div class="col-md-10">
                <div class="item-big-report col-md-12" style="max-height: 340px; overflow-y: auto;">
                    <table class="table-wisata table-tiketsaya table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Id Schedule</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Crew</th>
                                <th scope="col">Username</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                            include 'includes/pearlfirebase.php';
                            if (isset($_POST['submit'])) {
                                $date = $_POST['date'];
                            
                                if (!empty($date)) {
                                    // perintah tampil data berdasarkan periode bulan
                                    $data_report = 'report/Selesai/';
                                    $checkdata_report = $database->getReference($data_report)->orderByChild('tanggal')->equalTo($date)->getValue();
                                } else {
                                    
                                    // perintah tampil semua data
                                    $data_report = 'report/Selesai/';
                                    $checkdata_report = $database->getReference($data_report)->getValue();
                                }

                                }else {
                                    // perintah tampil semua data
                                    $data_report = 'report/Selesai/';
                                    $checkdata_report = $database->getReference($data_report)->getValue();
                                }

                            foreach($checkdata_report as $data_report_final => $value_data_report) {

                    ?>

                            <tr>
                                <td><?php echo $value_data_report['id_schedule']; ?></td>
                                <td><?php echo $value_data_report['tanggal']; ?></td>
                                <td><?php echo $value_data_report['nama_crew']; ?></td>
                                <td><?php echo $value_data_report['username']; ?></td>
                                <td><?php echo $value_data_report['status']; ?></td>
                                <td><?php echo $value_data_report['total']; ?> K</td>
                            </tr>

                        <?php } ?>


                        </tbody>
                    </table>


                </div>



            </div>

            

            

        </div>

        <div class="row report-group">

                <div class="col-md-10">
                    <div class="item-add-zone">
                        <p class="title">
                            Report Cancel
                        </p>
                        <p class="desc">
                            Antrian cancelled
                        </p>
                    </div>
                    <div class="col-md-8">
						<form method="POST" action="" class="form-inline">
                            <input type="date" name="date2" id="date2" class="form-control mr-2" style="width:300px;height:40px;margin-top:10px;">
                            <button type="submit" name="submit_second" class="btn btn-success btn-primary-tiketsaya mr-2" style="width:80px;border-radius:8px;">Search</button>
                        </form>
					</div>
                </div>

            <div class="col-md-10">
                <div class="item-big-report col-md-12" style="max-height: 340px; overflow-y: auto;">
                    <table class="table-wisata table-tiketsaya table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Id Schedule</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Crew</th>
                                <th scope="col">Username</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                            include 'includes/pearlfirebase.php';
                              if (isset($_POST['submit_second'])) {
                                $date2 = $_POST['date2'];
                              
                                if (!empty($date2)) {
                                      // perintah tampil data berdasarkan periode bulan
                                      $data_report = 'report/Cancel/';
                                      $checkdata_report2 = $database->getReference($data_report)->orderByChild('tanggal')->equalTo($date2)->getValue();
                                  } else {
                                      
                                      // perintah tampil semua data
                                      $data_report = 'report/Cancel/';
                                      $checkdata_report2 = $database->getReference($data_report)->getValue();
                                  }
                              
                              }else {
                                  // perintah tampil semua data
                                  $data_report = 'report/Cancel/';
                                  $checkdata_report2 = $database->getReference($data_report)->getValue();
                              }
                            foreach($checkdata_report2 as $data_reportcancel_final => $value_data_reportcancel) {

                    ?>

                            <tr>
                                <td><?php echo $value_data_reportcancel['id_schedule']; ?></td>
                                <td><?php echo $value_data_reportcancel['tanggal']; ?></td>
                                <td><?php echo $value_data_reportcancel['nama_crew']; ?></td>
                                <td><?php echo $value_data_reportcancel['username']; ?></td>
                                <td><?php echo $value_data_reportcancel['status']; ?></td>
                                <td><?php echo $value_data_reportcancel['total']; ?> K</td>
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
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Crew 1", "Crew 2", "Crew 3"],
				datasets: [{
					label: '',
					data: [
                        <?php
                            $data_report = 'report/Selesai/';
                            $checkdata_report = $database->getReference($data_report)->orderByChild('nama_crew')->equalTo('Crew 1')->getValue();
                            echo count($checkdata_report); ?>,

                        <?php
                            $data_report = 'report/Selesai/';
                            $checkdata_report2 = $database->getReference($data_report)->orderByChild('nama_crew')->equalTo('Crew 2')->getValue();
                            echo count($checkdata_report2); ?>,

                        <?php
                            $data_report = 'report/Selesai/';
                            $checkdata_report3 = $database->getReference($data_report)->orderByChild('nama_crew')->equalTo('Crew 3')->getValue();
                            echo count($checkdata_report3); ?>,
                        
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>

</body>

</html>