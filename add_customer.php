<?php
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
        <title>Customer</title>
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
                    Add Customer
                </p>
                <nav aria-label="sitemap-ts breadcrumb">
                    <ol class="breadcrumb" style="margin-left: -15px; background: none;">
                        <li class="breadcrumb-item"><a style="color: #C7C7C7;" href="customer.php">Customer</a></li>
                        <li style="color: #21272C;" class="breadcrumb-item active" aria-current="page">
                            Add
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
                                        <img id="img_photo_customer" class="primary-user-picture-circle" src="images/icon_nopic.png" />
                                    </div>
                                    <div>
                                        <button id="open_file_customer" class="btn btn-success btn-primary-tiketsaya-second">+</button>
                                    </div> 
                                </div>
                            </div>

                            <div class="form-new-user row">
                                <div class="col-md-8">
                                <form>
                                        <div class="form-group content-sign-in">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputEmail1">Username</label>
                                            <input id="username" value="" type="text" class="form-control input-type-primary-tiketsaya" id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Password</label>
                                            <input id="password" value="" type="text" class="form-control input-type-primary-tiketsaya" id="exampleInputPassword1" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Alamat Email</label>
                                            <input id="email" value="" type="text" class="form-control input-type-primary-tiketsaya" id="exampleInputPassword1" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Phone</label>
                                            <input id="phone" value="" type="number" class="form-control input-type-primary-tiketsaya" id="exampleInputPassword1" placeholder="Phone" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="title-input-type-primary-tiketsaya"
                                                        for="exampleInputPassword1">Firstname</label>
                                                    <input id="firstname" type="text" class="form-control input-type-primary-tiketsaya" id="exampleInputPassword1" placeholder="Firstname" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="title-input-type-primary-tiketsaya"
                                                        for="exampleInputPassword1">Lastname</label>
                                                    <input id="lastname" type="text" class="form-control input-type-primary-tiketsaya" id="exampleInputPassword1" placeholder="Lastname" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleFormControlTextarea1">Address</label>
                                            <textarea id="address" class="input-type-primary-tiketsaya form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Address" required></textarea>
                                        </div>
                                    </form>
                                    <button id="addcustomer" type="submit" class="btn btn-success btn-primary-tiketsaya">Add</button>
                                    <a href="customer.php" style="margin-left: 10px;" class="btn btn-cancel-secondary">Cancel</a>
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
<!--------------------------FIRBASE LIBRARIES-------------------------------------------------->
    <script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-database.js"></script> 
    <script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-storage.js"></script> 

    <script id="MainScript">
        
//--------------------------Variabels--------------------------------------------------//
        
                var ImgName, ImgUrl, username, password, email, phone, firstname, lastname, address;
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
        
                document.getElementById("open_file_customer").onclick = function(e){
                    var input = document.createElement('input');
                    input.type= 'file';

                    input.onchange = e => {
                        files = e.target.files;
                        reader = new FileReader();
                        reader.onload = function() {
                            document.getElementById("img_photo_customer").src = reader.result;
                        }
                        reader.readAsDataURL(files[0]);
                    }
                    input.click();
                }


//--------------------------Upload firebase storage--------------------------------------------------//

                document.getElementById('addcustomer').onclick = function(){
                    ImgName = document.getElementById('username').value;
                    username = document.getElementById('username').value;
                    password = document.getElementById('password').value;
                    email = document.getElementById('email').value;
                    phone = document.getElementById('phone').value;
                    firstname = document.getElementById('firstname').value;
                    lastname = document.getElementById('lastname').value;
                    address = document.getElementById('address').value;
                    var uploadTask = firebase.storage().ref('Photousers/'+ImgName+'/'+ImgName+".png").put(files[0]);

                    uploadTask.on('state_changed', function(snapshot){
                        var progress=(snapshot.bytesTranferred/snapshot.totalBytes)*100;
                    },

                    function(error){
                        alert('Gagal menambah customer');
                    },

//--------------------------Upload firebase database--------------------------------------------------//
                    function(){
                            uploadTask.snapshot.ref.getDownloadURL().then(function(url){
                                ImgUrl = url;

                                firebase.database().ref('customer/'+ImgName+'/info_customer').set({
                                    url_photo_profile: ImgUrl,
                                    username: ImgName,
                                    password: password,
                                    email: email,
                                    phone: phone,
                                    firstname: firstname,
                                    lastname: lastname,
                                    address: address
                                });
                                alert('Customer berhasil di tambah');
                                window.location = 'customer.php'
                            }
                        );
                        
                    });

                }

    </script>
</body>

</html>