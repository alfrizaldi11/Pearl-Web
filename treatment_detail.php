<?php
error_reporting(0);
    include 'includes/user_token.php';
    include 'includes/pearlfirebase.php';

    // dapatkan nama treatment dari url
    $treatment_url = $_GET['nama_treatment'];

    // data detail treatment
    $path_treatment_details = 'treatment/detail/'.$treatment_url;
    $checkdata_treatment_details= $database->getReference($path_treatment_details)->getValue();

    $path_treatment_details_header = 'treatment/header_detail/'.$treatment_url;
    $checkdata_treatment_details_header= $database->getReference($path_treatment_details_header)->getValue();

    // data admin
    $reference = 'admin/'.$_SESSION['username'];
    $checkdata = $database->getReference($reference)->getValue();

    // cetak data admin
    $nama_admin_p = $checkdata['nama_admin'];
    $photo_admin_p = $checkdata['photo_admin'];

?>

<html>

    <head>
        <title>Treatment</title>
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
                    Detail Treatment
                </p>
                <nav aria-label="sitemap-ts breadcrumb">
                    <ol class="breadcrumb" style="margin-left: -15px; background: none;">
                        <li class="breadcrumb-item"><a style="color: #C7C7C7;" href="treatment.php">Treatment</a></li>
                        <li style="color: #21272C;" class="breadcrumb-item active" aria-current="page"><?php echo $checkdata_treatment_details['nama_treatment']; ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row report-group">

            <div class="col-md-5">
                <div class="item-delete-zone">
                    <p class="title">
                        Danger Zone
                    </p>
                    <p class="desc">
                        If you want delete this treatment
                    </p>
                    <form method="POST" action="includes/data_model.php">
                    <input type="hidden" name="nama_treatment" value="<?php echo $checkdata_treatment_details['nama_treatment']; ?>" />
                    <button name="deleteTreatment" type="submit" onclick="return confirm('Yakin akan dihapus ?');" class="btn-delete btn btn-danger">
                        Delete treatment
                    </button>
                    </form>
                </div>
            </div>

            <div class="col-md-12">
                <div class="item-big-report col-md-12">


                    <div class="row">
                        <div class="overlay-box col-md-4">
                            <button id="open_file_photo" class="btn btn-success btn-third-tiketsaya">Search</button>
                        </div>
                        <div style="padding-left: 30px;" class="thumbnail-box col-md-4">
                            <p class="label-thumbnail">
                                Photo Treatment
                            </p>
                            <img id="img_photo_treatment" class="thumbnail-wisata" src="<?php echo $checkdata_treatment_details['photo_treatment']; ?>" alt="">
                            
                        </div>

                        <div class="col-md-5">
                            
                        <form method="POST" action="includes/data_model.php">
                                <div class="form-group content-sign-in">
                                    <label class="title-input-type-primary-tiketsaya" for="exampleInputEmail1">Nama Treatment</label>
                                    <input disabled name="nama_treatment" value="<?php echo $checkdata_treatment_details['nama_treatment']; ?>" type="text" class="form-control input-type-primary-tiketsaya"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                </div>
                                <div class="form-group">
                                    <label class="title-input-type-primary-tiketsaya" for="exampleInputPassword1">Keterangan</label>
                                    <input name="keterangan" value="<?php echo $checkdata_treatment_details['keterangan']; ?>" type="text" class="form-control input-type-primary-tiketsaya" id="exampleInputPassword1" required>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Harga Treatment</label>
                                            <input name="harga_treatment" value="<?php echo $checkdata_treatment_details['harga_treatment']; ?>" type="number" class="form-control input-type-primary-tiketsaya" id="exampleInputPassword1" required>
                                        </div>
                                        <div style="padding-left: 0px; margin-top: 15px;" class="col-md-1">
                                            <br>
                                            <h5>K</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Waktu</label>
                                            <input name="waktu" value="<?php echo $checkdata_treatment_details['waktu']; ?>" type="number" class="form-control input-type-primary-tiketsaya" id="exampleInputPassword1" required>
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
                                    <textarea name="deskripsi" class="input-type-primary-tiketsaya form-control" id="exampleFormControlTextarea1" rows="8" required><?php echo $checkdata_treatment_details['deskripsi']; ?></textarea>
                                </div>
                                <div style="margin-bottom: -40px; visibility: hidden;" class="form-group content-sign-in">
                                        <input id="image_file" type="file" />
                                </div>

                                <input type="hidden" id="nama_treatment" name="treatment_url" value="<?php echo $checkdata_treatment_details['nama_treatment']; ?>" />
                                <button type="submit" id="updatetreatment" name="updateTreatment" class="btn btn-success btn-primary-tiketsaya">Update</button>
                                <a href="treatment.php" style="margin-left: 10px;" type="reset" class="btn btn-cancel-secondary">Cancel</a>
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

    <!--------------------------FIRBASE LIBRARIES-------------------------------------------------->
    <script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-database.js"></script> 
    <script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-storage.js"></script> 

    <script id="MainScript">
        
//--------------------------Variabels--------------------------------------------------//
        
                var ImgName, ImgUrl;
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
        
                document.getElementById("open_file_photo").onclick = function(e){
                    var input = document.createElement('input');
                    input.type= 'file';

                    input.onchange = e => {
                        files = e.target.files;
                        reader = new FileReader();
                        reader.onload = function() {
                            document.getElementById("img_photo_treatment").src = reader.result;
                        }
                        reader.readAsDataURL(files[0]);
                    }
                    input.click();
                }


//--------------------------Upload firebase storage--------------------------------------------------//

                document.getElementById('updatetreatment').onclick = function(){
                    ImgName = document.getElementById('nama_treatment').value;
                    var uploadTask = firebase.storage().ref('Treatment/photo_treatment/'+ImgName+".png").put(files[0]);

                    uploadTask.on('state_changed', function(snapshot){
                        var progress=(snapshot.bytesTranferred/snapshot.totalBytes)*100;
                    },

                    function(error){
                        alert('Gagal mengupdate data treatment');
                    },

//--------------------------Upload firebase database--------------------------------------------------//
                    function(){
                            uploadTask.snapshot.ref.getDownloadURL().then(function(url){
                                ImgUrl = url;

                                firebase.database().ref('treatment/detail/'+ImgName).update({
                                    photo_treatment: ImgUrl
                                });
                                alert('Paket berhasil di update');
                                window.location = 'treatment.php'
                            }
                        );
                        
                    });

                }

    </script>

</body>

</html>