<?php
    include 'koneksi.php';


    // $status="";

    // $status_gerbang=json_decode(file_get_contents('php://input'), true);

    // if(isset($_POST['status']))
    // {
    //     $status=$_POST['status'];
    // }

    // else
    // {
    //     $status=$status_gerbang['status'];
    // }
    
    $id=1;
    $status="tutup";

    $tutup_gerbang=$dbh->prepare("UPDATE gerbang set status=:status where id=:id");
    $tutup_gerbang->bindParam(':status',$status);
    $tutup_gerbang->bindParam(':id',$id);
    $tutup_gerbang->execute();

    $response=new stdClass();
	$response->success=1;
    $response->message="Gerbang Ditutup";
	echo json_encode($response);

    $status_menunggu="menunggu";

    $menunggu=$dbh->prepare("UPDATE gerbang set status=:status where id=:id");
    $menunggu->bindParam(':status',$status_menunggu);
    $menunggu->bindParam(':id',$id);
    $menunggu->execute();


?>