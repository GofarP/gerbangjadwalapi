<?php
    include "koneksi.php";

    $status="buka";
    $id=1;

    $buka_pintu=$dbh->prepare("UPDATE gerbang set status=:status");
    $buka_pintu->bindParam(':status',$status);
    $buka_pintu->execute();

    $response=new stdClass();
	$response->success=1;
    $response->message="Gerbang Dibuka";
	echo json_encode($response);
?>