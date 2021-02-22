<?php

include 'pearlfirebase.php';

if(isset($_POST['signin'])){
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    if($username != null){
        if($password != null){
            $reference = 'admin/'.$username;
            $checkdata = $database->getReference($reference)->getValue();
            if($checkdata != null){
                if($password != null)
                {
                    
                    // ambil data
                    $password_admin_saat_ini = $checkdata['password'];

                    if($password == $password_admin_saat_ini) {
                        // jawaban benar
                        session_start();
                        $_SESSION['username'] = $username;
                        header('location: ../index.php');
                    }
                    else {
                        echo 'password salah';
                    }

                    
                }
                else {
                    echo 'password salah';
                }
            }
            else {
                echo 'data tidak ada!';
            }
        }
    }

}


else if(isset($_POST['updateAdmin'])){

    $username_admin_url = htmlspecialchars($_POST['username_admin_url']);

    $nama_admin = htmlspecialchars($_POST['nama_admin']);
    $email_admin = htmlspecialchars($_POST['email_admin']);
    $password = htmlspecialchars($_POST['password']);

    $reference = 'admin/'.$username_admin_url;

    $data = [
        'username' => $username_admin_url,
        'nama_admin' => $nama_admin,
        'email_admin' => $email_admin,
        'password' => $password
    ];

    // upload to server
    $pushData = $database->getReference($reference)->update($data);


    // lempar ke index.php
    header('location: ../index.php');

}

else if(isset($_POST['updateCustomer'])){

    $username_cus_url = htmlspecialchars($_POST['username_cus_url']);

    $password = htmlspecialchars($_POST['password']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $address = htmlspecialchars($_POST['address']);

    $reference = 'customer/'.$username_cus_url.'/info_customer';

    $data = [
        'password' => $password,
        'email' => $email,
        'phone' => $phone,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'address' => $address
    ];

    // upload to server
    $pushData = $database->getReference($reference)->update($data);


    // lempar ke customer.php
    header('location: ../customer.php');

}

else if(isset($_POST['updateCrew'])){

    $nama_crew_url = htmlspecialchars($_POST['nama_crew_url']);

    $status = htmlspecialchars($_POST['status']);

    $reference = 'crew/'.$nama_crew_url;

    $data = [
        'status' => $status
    ];

    // upload to server
    $pushData = $database->getReference($reference)->update($data);


    // lempar ke schedule.php
    header('location: ../schedule.php');

}

else if(isset($_POST['updateAntrian'])){

    $antrian_url = htmlspecialchars($_POST['antrian_url']);
    $antriancrew_url = htmlspecialchars($_POST['antriancrew_url']);
    $antriantanggal_url = htmlspecialchars($_POST['antriantanggal_url']);

    $username = htmlspecialchars($_POST['username']);
    $id_schedule = htmlspecialchars($_POST['id_schedule']);
    $status = htmlspecialchars($_POST['status']);
    $total = htmlspecialchars($_POST['total']);

    $reference = 'antrian/'.$antriancrew_url.'/'.$antriantanggal_url.'/'.$antrian_url;
    $reference2 = 'report/'.$status.'/'.$id_schedule;

    $data = [
        'status' => $status
    ];

    $data2 = [
        'username' => $username,
        'id_schedule' => $id_schedule,
        'nama_crew' => $antriancrew_url,
        'tanggal' => $antriantanggal_url,
        'status' => $status,
        'total' => $total*1
    ];

    // upload to server
    $pushData = $database->getReference($reference)->update($data);
    $pushData2 = $database->getReference($reference2)->update($data2);


    // lempar ke schedule.php
    header('location: ../antrian.php');

}

else if(isset($_POST['updateTreatment'])){

    $treatment_url = htmlspecialchars($_POST['treatment_url']);

    $keterangan = htmlspecialchars($_POST['keterangan']);
    $harga_treatment = htmlspecialchars($_POST['harga_treatment']);
    $waktu = htmlspecialchars($_POST['waktu']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);

    $reference = 'treatment/detail/'.$treatment_url;

    $data = [
        'keterangan' => $keterangan,
        'harga_treatment' => $harga_treatment*1,
        'waktu' => $waktu*1,
        'deskripsi' => $deskripsi
    ];

    // upload to server
    $pushData = $database->getReference($reference)->update($data);


    // lempar ke treatmnet.php
    header('location: ../treatment.php');

}

else if(isset($_POST['updatePaket'])){

    $paket_url = htmlspecialchars($_POST['paket_url']);

    $keterangan = htmlspecialchars($_POST['keterangan']);
    $harga_treatment = htmlspecialchars($_POST['harga_treatment']);
    $waktu = htmlspecialchars($_POST['waktu']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);

    $reference = 'treatment/paket/'.$paket_url;

    $data = [
        'keterangan' => $keterangan,
        'harga_treatment' => $harga_treatment,
        'waktu' => $waktu,
        'deskripsi' => $deskripsi
    ];

    // upload to server
    $pushData = $database->getReference($reference)->update($data);


    // lempar ke treatment.php
    header('location: ../treatment.php');

}

else if(isset($_POST['deleteCustomer'])){

    $username_url = htmlspecialchars($_POST['username_url']);

    $reference = 'customer/'.$username_url;

    // upload to server
    $pushData = $database->getReference($reference)->remove();


    // lempar ke customer.php
    header('location: ../customer.php');

}

else if(isset($_POST['deleteCustreatment'])){

    $id_treatment_url = htmlspecialchars($_POST['id_treatment']);
    $id_schedule_url = htmlspecialchars($_POST['id_schedule']);
    $username_url = htmlspecialchars($_POST['username']);

    $reference = 'customer/'.$username_url.'/myschedule/mytreatmentfix/'.$id_schedule_url.'/'.$id_treatment_url;

    // upload to server
    $pushData = $database->getReference($reference)->remove();


    // lempar ke customer.php
    echo '<script type="text/javascript">history.go(-1);</script>';

}

else if(isset($_POST['deleteTreatment'])){

    $treatment_url = htmlspecialchars($_POST['nama_treatment']);

    $reference = 'treatment/detail/'.$treatment_url;

    // upload to server
    $pushData = $database->getReference($reference)->remove();


    // lempar ke treatment.php
    header('location: ../treatment.php');

}

else if(isset($_POST['deletePaket'])){

    $paket_url = htmlspecialchars($_POST['nama_paket']);

    $reference = 'treatment/paket/'.$paket_url;

    // upload to server
    $pushData = $database->getReference($reference)->remove();


    // lempar ke treatment.php
    header('location: ../treatment.php');

}

else if(isset($_POST['deleteCrew'])){

    $crew_url = htmlspecialchars($_POST['nama_crew']);

    $reference = 'crew/'.$crew_url;
    $reference2 = 'jadwal_crew/'.$crew_url;
    $reference3 = 'antrian/'.$crew_url;

    // upload to server
    $pushData = $database->getReference($reference)->remove();
    $pushData2 = $database->getReference($reference2)->remove();
    $pushData3 = $database->getReference($reference3)->remove();


    // lempar ke schedule.php
    header('location: ../schedule.php');

}

else if(isset($_POST['addCustomer'])){

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $address = htmlspecialchars($_POST['address']);

    $reference = 'customer/'.$username.'/info_customer';

    $data = [
        'username' => $username,
        'password' => $password,
        'email' => $email,
        'phone' => $phone,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'address' => $address
    ];

    // upload to server
    $pushData = $database->getReference($reference)->set($data);


    // lempar ke customer.php
    header('location: ../customer.php');

}

else if(isset($_POST['addCrew'])){

    $nama_crew = htmlspecialchars($_POST['nama_crew']);
    $status = htmlspecialchars($_POST['status']);

    $reference = 'crew/'.$nama_crew;

    $data = [
        'nama_crew' => $nama_crew,
        'status' => $status
    ];

    // upload to server
    $pushData = $database->getReference($reference)->set($data);


    // lempar ke schedule.php
    header('location: ../schedule.php');

}

else if(isset($_POST['addSchedule'])){

    $crew_url = htmlspecialchars($_POST['nama_crew_url']);

    $nama_crew = htmlspecialchars($_POST['nama_crew_url']);
    $id_jadwal = htmlspecialchars($_POST['id_jadwal']);
    $tanggal = htmlspecialchars($_POST['tanggal']);

    $reference = 'jadwal_crew/'.$crew_url.'/'.$id_jadwal;

    $data = [
        'nama_crew' => $nama_crew,
        'id_jadwal' => $id_jadwal,
        'tanggal' => $tanggal
    ];

    // upload to server
    $pushData = $database->getReference($reference)->set($data);


    // lempar ke schedule.php
    echo '<script type="text/javascript">history.go(-2);</script>';

}

else if(isset($_POST['addTreatment'])){

    $nama_treatment = htmlspecialchars($_POST['nama_treatment']);
    $keterangan = htmlspecialchars($_POST['keterangan']);
    $harga_treatment = htmlspecialchars($_POST['harga_treatment']);
    $waktu = htmlspecialchars($_POST['waktu']);
    $group = htmlspecialchars($_POST['group']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);

    $reference = 'treatment/detail/'.$nama_treatment;

    $data = [
        'nama_treatment' => $nama_treatment,
        'keterangan' => $keterangan,
        'harga_treatment' => $harga_treatment,
        'waktu' => $waktu,
        'group' => $group,
        'deskripsi' => $deskripsi
    ];

    // upload to server
    $pushData = $database->getReference($reference)->set($data);


    // lempar ke treatmnet.php
    header('location: ../treatment.php');

}

else if(isset($_POST['addPaket'])){

    $nama_treatment = htmlspecialchars($_POST['nama_treatment']);
    $keterangan = htmlspecialchars($_POST['keterangan']);
    $harga_treatment = htmlspecialchars($_POST['harga_treatment']);
    $waktu = htmlspecialchars($_POST['waktu']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);

    $reference = 'treatment/paket/'.$nama_treatment;

    $data = [
        'nama_treatment' => $nama_treatment,
        'keterangan' => $keterangan,
        'harga_treatment' => $harga_treatment,
        'waktu' => $waktu,
        'deskripsi' => $deskripsi
    ];

    // upload to server
    $pushData = $database->getReference($reference)->set($data);


    // lempar ke treatmnet.php
    header('location: ../treatment.php');

}

else if(isset($_POST['addTanggal'])){

    $nama_crew = htmlspecialchars($_POST['nama_crew']);
    $photo_crew = htmlspecialchars($_POST['photo_crew']);
    $tanggal = htmlspecialchars($_POST['tanggal']);

    $reference = 'crew_jadwal/'.$tanggal.'/'.$nama_crew;

    $data = [
        'nama_crew' => $nama_crew,
        'photo_crew' => $photo_crew,
        'tanggal' => $tanggal
    ];

    // upload to server
    $pushData = $database->getReference($reference)->set($data);


    // lempar ke treatmnet.php
    header('location: ../schedule.php');

}

else if(isset($_POST['addJadwal'])){

    $jadwal = htmlspecialchars($_POST['jadwal']);

    $reference = 'crew_jadwal/'.$jadwal;

    // upload to server
    $pushData = $database->getReference($reference)->set($jadwal);


    // lempar ke treatmnet.php
    header('location: ../schedule.php');

}

else if(isset($_POST['saveSchedule'])){

    $id_schedule = htmlspecialchars($_POST['id_schedule']);
    $nama_crew = htmlspecialchars($_POST['nama_crew']);
    $jadwal = htmlspecialchars($_POST['jadwal']);
    $status = htmlspecialchars($_POST['status']);
    $id_antrian = htmlspecialchars($_POST['id_antrian']);
    $total_harga = htmlspecialchars($_POST['total_harga']);
    $total_waktu = htmlspecialchars($_POST['total_waktu']);

    $username_url = htmlspecialchars($_POST['username_url']);


    $reference = 'customer/'.$username_url.'/myschedule/myinfofix/'.$id_schedule;

    $data = [
        'id_schedule' => $id_schedule,
        'nama_crew' => $nama_crew,
        'jadwal' => $jadwal
    ];
    
    $reference2 = 'antrian/'.$nama_crew.'/'.$jadwal.'/'.$id_antrian;

    $data2 = [
        'id_antrian' => $id_antrian,
        'id_schedule' => $id_schedule,
        'status' => $status,
        'total_harga' => $total_harga,
        'total_waktu' => $total_waktu,
        'username' => $username_url
    ];


    // upload to server
    $pushData = $database->getReference($reference)->set($data);
    $pushData2 = $database->getReference($reference2)->set($data2);


    // lempar ke treatmnet.php
    header('location: ../customer.php');

}

else if(isset($_POST['pilihTreatment'])){

    $treatment_url = htmlspecialchars($_POST['treatment_url']);
    $username_url = htmlspecialchars($_POST['username_url']);
    $id_schedule = htmlspecialchars($_POST['id_schedule']);

    $id_treatment = htmlspecialchars($_POST['id_treatment']);
    $nama_treatment = htmlspecialchars($_POST['nama_treatment']);
    $keterangan = htmlspecialchars($_POST['keterangan']);
    $harga_treatment = htmlspecialchars($_POST['harga_treatment']);
    $waktu = htmlspecialchars($_POST['waktu']);
    $catatan = htmlspecialchars($_POST['catatan']);
    $photo_treatment = htmlspecialchars($_POST['photo_treatment']);

    $reference = 'customer/'.$username_url.'/myschedule/mytreatmentfix/'.$id_schedule.'/'.$id_treatment;

    $data = [
        'id_treatment' => $id_treatment,
        'nama_treatment' => $nama_treatment,
        'keterangan' => $keterangan,
        'harga_treatment' => $harga_treatment,
        'waktu' => $waktu,
        'catatan' => $catatan,
        'photo_treatment' => $photo_treatment
    ];

    // upload to server
    $pushData = $database->getReference($reference)->set($data);


    // lempar ke treatmnet.php
    echo '<script type="text/javascript">history.go(-2);</script>';
}

else if(isset($_POST['pilihPaket'])){

    $treatment_url = htmlspecialchars($_POST['treatment_url']);
    $username_url = htmlspecialchars($_POST['username_url']);
    $id_schedule = htmlspecialchars($_POST['id_schedule']);

    $id_treatment = htmlspecialchars($_POST['id_treatment']);
    $nama_treatment = htmlspecialchars($_POST['nama_treatment']);
    $keterangan = htmlspecialchars($_POST['keterangan']);
    $harga_treatment = htmlspecialchars($_POST['harga_treatment']);
    $waktu = htmlspecialchars($_POST['waktu']);
    $catatan = htmlspecialchars($_POST['catatan']);
    $photo_treatment = htmlspecialchars($_POST['photo_treatment']);

    $reference = 'customer/'.$username_url.'/myschedule/mytreatmentfix/'.$id_schedule.'/'.$id_treatment;

    $data = [
        'id_treatment' => $id_treatment,
        'nama_treatment' => $nama_treatment,
        'keterangan' => $keterangan,
        'harga_treatment' => $harga_treatment,
        'waktu' => $waktu,
        'catatan' => $catatan,
        'photo_treatment' => $photo_treatment
    ];

    // upload to server
    $pushData = $database->getReference($reference)->set($data);


    // lempar ke treatmnet.php
    echo '<script type="text/javascript">history.go(-2);</script>';
}

?>