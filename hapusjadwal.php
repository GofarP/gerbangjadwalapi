<?php
    include "koneksi.php";

    $id=$_POST['id'];
    
    $hapus_jadwal=$dbh->prepare("DELETE from jadwal where id=:id");
    $hapus_jadwal->BindParam(':id',$id);
    $hapus_jadwal->Execute();


    if($hapus_jadwal->rowCount()>0)
    {
        $response=new stdClass();
        $response->success=1;
        $response->message="Sukses Menghapus Jadwal";
    }


    else
    {
        $response=new stdClass();
        $response->success=0;
        $response->message="Gagal Menghapus Jadwal";
    }

    echo json_encode($response);

?>