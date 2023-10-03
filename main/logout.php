<?php
	// memulai session
	session_start();

	// menghapus semua variabel session
	session_unset();
	// redirect ke halaman home
	header("Location: ../index.html");
	exit;
?>