<?php
    include 'koneksi.php';
    $id=$_POST['id'];
    $waktu_awal=$_POST['waktu_awal'];
    $waktu_akhir=$_POST['waktu_akhir'];
    $durasi=$_POST['durasi'];

    $update_jadwal=$dbh->prepare("UPDATE jadwal set waktu_awal=:waktuawal, waktu_akhir=:waktuakhir, durasi=:durasi where id=:id");
    $update_jadwal->bindParam(':waktuawal',$waktu_awal);
    $update_jadwal->bindParam(':waktuakhir',$waktu_akhir);
    $update_jadwal->bindParam(':durasi',$durasi);
    $update_jadwal->execute();

    if($update_jadwal->rowCount() > 0)
    {
        $response=new stdClass();
        $response->success=1;
        $response->message="Sukses Mengubah Jadwal";
    }

    else
    {
        $response=new stdClass();
        $response->success=0;
        $response->message="Gagal Mengubah Jadwal";
    }
    
?>