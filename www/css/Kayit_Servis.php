<?php

//izinler
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Headers: X-gelen_dataed-With');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');


// DB Bağlantısı yapılır

$host = '45.87.80.154';
$user = 'u883150773_test';
$pass = 'Test1234';
$data = 'u883150773_test';

$dba = mysqli_connect($host,$user,$pass,$data);
	
	if ($dba) {
		$utf = "SET NAMES'utf8'";
		mysqli_query($dba,$utf);
		if (!(empty($_POST['ad'])|| empty($_POST['soyad'])||empty($_POST['email'])||empty($_POST['sifre']))){
			$ad = $_POST['ad'];
			$soyad = $_POST['soyad'];
			$email = $_POST['email'];
			$sifre = $_POST['sifre'];
			
			if (strlen($sifre) < 5) {
				echo "Şifreniz en az 5 karakter olması gerekiyor";
				return;
			}
			
			$query = "SELECT * FROM users Where user_ad = '$ad'";
			$result = mysqli_query ($dba,$query);  
			
			if($row = $result->fetch_assoc()){
				echo "Farklı bir kullanıcı adı belirleyiniz!..";
				return;
			}else{
				$query = "INSERT INTO users(user_ad,user_soyad,user_email,user_sifre)VALUES('$ad','$soyad','$email','$sifre')";
				if(!mysqli_query($data,$query)){
					die('Errorr: '.mysqli_error());
				}
				echo"";
				return;
					
			}
		}else{
			$hata= "Girilecek Alanları Boş Bırakmayınız!.."
			echo $hata;
	}
	}else{
		die("Veritabanına baglanamadı");
	{
?>