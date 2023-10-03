<?php

	// Konfigurasi koneksi ke database
	$host = "localhost";
	$username = "root";
	$password = "";
	$dbname = "zakatfitrah";

	// Membuat koneksi ke database
	$conn = mysqli_connect($host, $username, $password, $dbname);

	// Fungsi untuk mengecek apakah ID sudah ada atau belum di database
	function isIDExist($id) {
		global $conn;
		$query = "SELECT id_muzakki FROM muzakki WHERE id_muzakki='$id'";
		$result = mysqli_query($conn, $query);
		return mysqli_num_rows($result) > 0;
	}

?>
