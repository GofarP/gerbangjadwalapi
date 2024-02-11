<?php
    include "koneksi.php";

    $email=$_POST['email'];
	$password=$_POST['password'];

    $getuseraccount=$dbh->prepare("SELECT * FROM user where email=:email");
	$getuseraccount->BindParam(":email",$email);
	$getuseraccount->execute();
	$getuserdata=$getuseraccount->fetch(PDO::FETCH_ASSOC);


    if($getuseraccount->rowCount()>0 && password_verify($password,$getuserdata['password']))
	{
			$response=new stdClass();
			$response->success=1;
            $response->message="akun ditemukan";
			echo json_encode($response);			
	}

    else
	{
		$response=new stdClass();
		$response->success=0;
		$response->message="akun tidak ditemukan";
		echo json_encode($response);
	}


?>