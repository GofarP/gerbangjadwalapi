<?php
    include "koneksi.php";

    $get_notifikasi=$dbh->prepare("SELECT * FROM notifikasi ORDER BY id DESC LIMIT 10;");
    $get_notifikasi->execute();
    $results = $get_notifikasi->fetchAll(PDO::FETCH_ASSOC); 
    
    $json = json_encode($results);

    echo ($json);
?>