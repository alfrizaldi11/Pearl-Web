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

?>

<html>

<head>
    <title>Settings — Pearl</title>
    <meta charset="UTF-8">
    <meta name="description" content="Login Pearl Admin">
    <meta name="keywords" content="Pearl, Web Dashboard Pearl, Login Pearl">
    <meta name="author" content="BWA Team">
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

                <div class="item-menu inactive">
                    <a href="customer.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-users"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu">
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
                    <li>
                        Customers
                    </li>
                </a>
                <a href="setting.php">
                    <li class="active-link">
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

    <div class="main-content-user-details main-content">
        <div class="header row">
            <div class="col-md-12">
                <p class="header-title">
                    Settings
                </p>
                <p class="sub-header-title">
                    Manage admin account
                </p>
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
                                        <img id="img_photo_admin" class="primary-user-picture-circle" src="<?php echo $checkdata['photo_admin']; ?>" />
                                    </div>
                                    <div>
                                        <button id="open_file_admin" class="btn btn-success btn-primary-tiketsaya-second">+</button>
                                    </div> 
                                </div>
                            </div>

                            <div class="form-new-user row">
                                <div class="col-md-8">
                                    <form method="POST" action="includes/data_model.php">

                                    <div class="form-group content-sign-in">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputEmail1">Nama Admin</label>
                                            <input name="nama_admin" value="<?php echo $checkdata['nama_admin']; ?>" type="text"
                                                class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Nama Admin">
                                        </div>

                                        <div class="form-group content-sign-in">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputEmail1">Username</label>
                                            <input disabled value="<?php echo $checkdata['username']; ?>" type="text"
                                                class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Alamat Email</label>
                                            <input name="email_admin" value="<?php echo $checkdata['email_admin']; ?>" type="text" class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputPassword1" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Password</label>
                                            <input name="password" value="<?php echo $checkdata['password']; ?>" type="text" class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputPassword1" placeholder="Password">
                                        </div>

                                        <input type="hidden" id="username_admin" name="username_admin_url" value="<?php echo $checkdata['username']; ?>" />

                                        <button id="updateadmin" name="updateAdmin" type="submit" class="btn btn-success btn-primary-tiketsaya">Update</button>
                                        <a href="index.php" style="margin-left: 10px;"class="btn btn-cancel-secondary">Cancel</a>
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
                        If you wanna delete this account
                    </p>
                    <a href="delete_admin.php?username_url=<?php echo $checkdata['username']; ?>" onclick="return confirm('Yakin akan dihapus ?');" class="btn-delete btn btn-danger">
                        Delete admin
                    </a>
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
        
                document.getElementById("open_file_admin").onclick = function(e){
                    var input = document.createElement('input');
                    input.type= 'file';

                    input.onchange = e => {
                        files = e.target.files;
                        reader = new FileReader();
                        reader.onload = function() {
                            document.getElementById("img_photo_admin").src = reader.result;
                        }
                        reader.readAsDataURL(files[0]);
                    }
                    input.click();
                }


//--------------------------Upload firebase storage--------------------------------------------------//

                document.getElementById('updateadmin').onclick = function(){
                    ImgName = document.getElementById('username_admin').value;
                    var uploadTask = firebase.storage().ref('Admin/'+ImgName+".png").put(files[0]);

                    uploadTask.on('state_changed', function(snapshot){
                        var progress=(snapshot.bytesTranferred/snapshot.totalBytes)*100;
                    },

                    function(error){
                        alert('Gagal menambah data admin');
                    },

//--------------------------Upload firebase database--------------------------------------------------//
                    function(){
                            uploadTask.snapshot.ref.getDownloadURL().then(function(url){
                                ImgUrl = url;

                                firebase.database().ref('admin/'+ImgName).update({
                                    photo_admin: ImgUrl
                                });
                                alert('Admin berhasil di update');
                                window.location = 'setting.php'
                            }
                        );
                        
                    });

                }
    </script>
    
</body>

</html>