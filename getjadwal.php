<?php
    include "koneksi.php";

    $get_notifikasi=$dbh->prepare("SELECT * FROM jadwal");
    $get_notifikasi->execute();
    $results = $get_notifikasi->fetchAll(PDO::FETCH_ASSOC); 
    
    $json = json_encode($results);

    echo ($json);
?>