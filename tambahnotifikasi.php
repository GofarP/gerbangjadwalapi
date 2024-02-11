<?php
    include "koneksi.php";

    if(isset($_POST['judul']) && isset($_POST['isi']) && isset($_POST['waktu']))
    {
        $judul=$_POST['judul'];
        $isi=$_POST['isi'];
        $waktu=$_POST['waktu'];
    }

    else
    {
        header('Content-Type: application/json');

        date_default_timezone_set('Asia/Jakarta');

        $data_notifikasi=json_decode(file_get_contents('php://input'), true);
        $judul=$data_notifikasi['judul'];
        $isi=$data_notifikasi['isi'];
        $waktu=date("Y-m-d H:i:s");

    }
    
    $tambah_notifikasi=$dbh->prepare('insert into notifikasi(judul, isi, waktu) values(:judul, :isi, :waktu)');
    $tambah_notifikasi->bindParam(':judul', $judul);
    $tambah_notifikasi->bindParam(':isi', $isi);
    $tambah_notifikasi->bindParam(':waktu', $waktu);

    $tambah_notifikasi->execute();

    if($tambah_notifikasi->rowCount()>0)
    {
        $response=new stdClass();
        $response->success=1;
        $response->message="Sukses menambah notifikasi";
    }

    else
    {
        $response=new stdClass();
        $response->success=0;
        $response->message="Gagal menambah notifikasi";
    }


    echo json_encode($response);


?>