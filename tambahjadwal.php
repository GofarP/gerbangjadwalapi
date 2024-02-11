<?php
    include "koneksi.php";
    
    $waktu_terbuka=$_POST["waktu_terbuka"];
    $waktu_tertutup=$_POST["waktu_tertutup"];
    $durasi=$_POST["durasi"];

    $tambah_jadwal=$dbh->prepare("INSERT into jadwal(waktu_terbuka, waktu_tertutup, durasi) values(:waktuterbuka, :waktutertutup, :durasi)");
    $tambah_jadwal->bindParam(":waktuterbuka",$waktu_terbuka);
    $tambah_jadwal->bindParam(":waktutertutup",$waktu_tertutup);
    $tambah_jadwal->bindParam(":durasi",$durasi);
    $tambah_jadwal->execute();

    if($tambah_jadwal->rowCount()>0)
    {
        $response=new stdClass();
        $response->success=1;
        $response->message="Sukses menambah jadwal";
    }

    else
    {
        $response=new stdClass();
        $response->success=0;
        $response->message="Gagal menambah jadwal";
    }

    echo json_encode($response);

?>