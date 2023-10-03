<?php

	$host = "localhost"; //nama host database
	$user = "root"; //nama user database
	$password = ""; //password database
	$database = "zakatfitrah"; //nama database

	//membuat koneksi ke database
	$conn = mysqli_connect($host, $user, $password, $database);

	//cek koneksi
	if (mysqli_connect_errno()) {
		echo "Koneksi database gagal: " . mysqli_connect_error();
		exit();
	}

?>
