<?php
    include "koneksi.php";

    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $cek_akun=$dbh->prepare("SELECT * from user where email=:email");
    $cek_akun->BindParam(':email',$email);
    $cek_akun->execute();
    $result=$cek_akun->fetch(PDO::FETCH_ASSOC);

    if($cek_akun->rowCount()>0)
    {
        $response=new stdClass();
		$response->success=0;
		$response->message="Email Ini Sudah Dipakai Sebelumnya";

		echo json_encode($response);
    }

    else
    {
        $hashed_pass=password_hash($password,PASSWORD_BCRYPT);
        $daftar_akun=$dbh->prepare("INSERT into user(email,password) values(:email,:password)");
        $daftar_akun->bindParam(":email",$email);
        $daftar_akun->bindParam(":password",$hashed_pass);
        $daftar_akun->execute();

        if($daftar_akun->rowCount()>0)
        {
            $response=new stdClass();
            $response->success=1;
            $response->message="Sukses Mendaftarkan Akun";

            echo json_encode($response);
        }

        else
        {
            $response=new stdClass();
            $response->success=1;
            $response->message="Gagal Mendaftarkan Akun";

            echo json_encode($response);
        }
    }

?>