<?php
session_start();

// Koneksi ke database
	include('koneksi.php');
	function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }
	$uname = validate($_POST['username_email']);
    $pass = validate($_POST['password']);
	// Query untuk mencari username atau email yang cocok dengan input pengguna
	$query = "SELECT akun.*, muzakki.nama_muzakki
			  FROM akun
			  JOIN muzakki ON akun.id_akun = muzakki.id_muzakki
			  WHERE (username = '$uname' OR email = '$uname') AND password = '$pass'";
	$result = mysqli_query($conn, $query);

	// Jika data ditemukan, maka login berhasil
	if (mysqli_num_rows($result) > 0) {
		$user_data = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $user_data['username'];
		$_SESSION['id_muzakki'] = $user_data['id_akun'];
		$_SESSION['nama_muzakki'] = $user_data['nama_muzakki'];
		$_SESSION['profilePic'] = $user_data['profilePic'];
		$_SESSION['login'] = true;
		header("Location: dashboard.php");
		exit;
	}
	// Jika data tidak ditemukan, maka login gagal
	else {
		$_SESSION['login'] = false;
		header("Location: login.php?error=1");
		exit;
	}

mysqli_close($conn);
?>
