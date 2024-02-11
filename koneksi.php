<?php
    //koneksi ke database dengan nama tanaman
    $host="localhost";
    $port="3306";
    $user="root";
    $pass="";
    $db="gerbang";
    $dbh=new PDO('mysql:dbname='.$db.';host='.$host.'; port='.$port,$user,$pass);
?>