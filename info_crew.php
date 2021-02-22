<?php
error_reporting(0);
    include 'includes/user_token.php';
    include 'includes/pearlfirebase.php';

    // dapatkan nama treatment dari url
    $crew_url = $_GET['nama_crew'];

    // data detail treatment
    $path_crew = 'crew/'.$crew_url;
    $checkdata_crew= $database->getReference($path_crew)->getValue();

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
                    Info Crew
                </p>
                <nav aria-label="sitemap-ts breadcrumb">
                    <ol class="breadcrumb" style="margin-left: -15px; background: none;">
                        <li class="breadcrumb-item"><a style="color: #C7C7C7;" href="wisata.php">Crew</a></li>
                        <li style="color: #21272C;" class="breadcrumb-item active" aria-current="page">Info
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

                            <div class="row">
                                <div class="col-4">
                                    <div class="wrap-user-picture-circle">
                                        <img id="img_photo_crew" class="primary-user-picture-circle" src="<?php echo $checkdata_crew['photo_crew']; ?>" />
                                    </div>
                                    <div>
                                        <button id="open_file_crew" class="btn btn-success btn-primary-tiketsaya-second">+</button>
                                    </div> 
                                </div>
                            </div>

                            <div class="form-new-user row">
                                <div class="col-md-8">
                                <form method="POST" action="includes/data_model.php">

                                        <div class="form-group content-sign-in">
                                            <label class="title-input-type-primary-tiketsaya" for="exampleInputEmail1">Nama Crew</label>
                                            <input name="nama_crew" disabled value="<?php echo $checkdata_crew['nama_crew']; ?>" type="text" class="form-control input-type-primary-tiketsaya" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="form-group content-sign-in"">
                                            <label class="title-input-type-primary-tiketsaya"
                                            for="exampleInputEmail1">Status</label>
                                            <select name="status" class="form-control input-type-primary-tiketsaya">
                                            <option value="<?php echo $checkdata_crew['status']; ?>"><?php echo $checkdata_crew['status']; ?></option>
                                                <option value="">-- Pilih Status --</option>
                                                <option value="aktif">aktif</option>
                                                <option value="off">off</option>
                                            </select>
                                        </div>

                                        <input id="mycrew" type="hidden" name="nama_crew_url" value="<?php echo $checkdata_crew['nama_crew']; ?>"/>
                                        <button id="updatecrew" name="updateCrew" type="submit" class="btn btn-success btn-primary-tiketsaya">Update</button>
                                        <a href="schedule.php" style="margin-left: 10px;" class="btn btn-cancel-secondary">Cancel</a>
                                    </form>
                                </div>
                            </div>

                        </div>



                    </div>



                </div>
            </div>
            <div class="col-md-5">
                <div class="item-danger-zone">
                    <p class="title">
                        Danger Zone
                    </p>
                    <p class="desc">
                        If you wanna delete this crew
                    </p>
                    <form method="POST" action="includes/data_model.php">
                    <input type="hidden" name="nama_crew" value="<?php echo $checkdata_crew['nama_crew']; ?>" />
                    <button name="deleteCrew" type="submit" onclick="return confirm('Yakin akan dihapus ?');" class="btn-delete btn btn-danger">
                        Delete crew
                    </button>
                    </form>
                </div>
            </div>
            
        </div>

    </div>
    </div>

    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
<!--------------------------FIRBASE LIBRARIES-------------------------------------------------->
    <script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-database.js"></script> 
    <script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-storage.js"></script> 

    <script id="MainScript">
        
//--------------------------Variabels--------------------------------------------------//
        
                var ImgName, ImgUrl, UrlCrew;
                var files = [];
                var reader = new FileReader();

//--------------------------Configurasi--------------------------------------------------//
        
                var firebaseConfig = {
                    apiKey: "81c605177565ef481567b6ebfe5414cf13c96ca5",
                    authDomain: "pearl-78bab.firebaseapp.com",
                    databaseURL: "https://pearl-78bab.firebaseio.com/",
                    projectId: "pearl-78bab",
                    storageBucket: "gs://pearl-78bab.appspot.com",
                    messagingSenderId: "679286064831",
                    appId: "1:679286064831:android:f56a15ae50dfec90c0e80a"
                };
                // initialize firebase
                firebase.initializeApp(firebaseConfig);

//--------------------------Select proses--------------------------------------------------//
        
                document.getElementById("open_file_crew").onclick = function(e){
                    var input = document.createElement('input');
                    input.type= 'file';

                    input.onchange = e => {
                        files = e.target.files;
                        reader = new FileReader();
                        reader.onload = function() {
                            document.getElementById("img_photo_crew").src = reader.result;
                        }
                        reader.readAsDataURL(files[0]);
                    }
                    input.click();
                }


//--------------------------Upload firebase storage--------------------------------------------------//

                document.getElementById('updatecrew').onclick = function(){
                    ImgName = document.getElementById('mycrew').value;
                    var uploadTask = firebase.storage().ref('Photocrew/'+ImgName+'/'+ImgName+".png").put(files[0]);

                    uploadTask.on('state_changed', function(snapshot){
                        var progress=(snapshot.bytesTranferred/snapshot.totalBytes)*100;
                    },

                    function(error){
                        alert('Gagal menambah data crew');
                    },

//--------------------------Upload firebase database--------------------------------------------------//
                    function(){
                            uploadTask.snapshot.ref.getDownloadURL().then(function(url){
                                ImgUrl = url;
                                UrlCrew = ImgName;

                                firebase.database().ref('crew/'+UrlCrew).update({
                                    photo_crew: ImgUrl
                                });
                                alert('Crew berhasil di update');
                                window.location = 'schedule.php'
                            }
                        );
                        
                    });

                }
    </script>

</body>

</html>