<?php
    include 'includes/pearlfirebase.php';

    $username_admin_url = $_GET['username_url'];

    $reference = 'admin/'.$username_admin_url;
    $pushData = $database->getReference($reference)->remove();


        // lempar ke customer.php
        header('location: includes/user_destroy.php');

?>