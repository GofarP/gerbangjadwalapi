<?php
   include "koneksi.php";
   

   $waktu=date("Y-m-d H:i:s");
   $cek_status=$dbh->prepare("SELECT * FROM gerbang");
   $cek_status->execute();
   $results = $cek_status->fetch(PDO::FETCH_ASSOC); 
   
   $json = json_encode($results);
   echo ($json);

?>