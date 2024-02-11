<?php
    
    include "koneksi.php";

    date_default_timezone_set('Asia/Jakarta');

    $waktu=date("H:i:s");

    $cek_waktu_buka=$dbh->prepare("SELECT * from jadwal where waktu_terbuka=:waktu");
    $cek_waktu_buka->bindParam('waktu',$waktu);
    $cek_waktu_buka->execute();
    $result = $cek_waktu_buka->fetch(PDO::FETCH_ASSOC); 
    if($result)
    {
        $response=new stdClass();
        $response->success=1;
        $response->message="Jadwal Dengan Waktu Tersebut Ditemukan";
        $response->time=$waktu;
        $response->durasi=$result['durasi'];   
    }

    else
    {
        $response=new stdClass();
        $response->success=0;
        $response->message="Jadwal Dengan Waktu Tersebut Tidak Ditemukan";
        $response->time=$waktu;
    } 

    echo json_encode($response);

?>