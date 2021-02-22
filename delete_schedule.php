<?php
    include 'includes/pearlfirebase.php';

    $tanggal_url = $_GET['tanggal'];

    $reference = 'crew_jadwal/'.$tanggal_url;
    $pushData = $database->getReference($reference)->remove();

    echo '<script type="text/javascript">history.go(-1);</script>';

?>