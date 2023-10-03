<?php
include "../koneksi.php";
include "../database.php";
session_start();

// Check if user is logged in
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
  $isLoggedIn = true;
} else {
  $isLoggedIn = false;
  header("Location: ../login.php");
  exit();
}

$IdMuzakki = $_SESSION['id_muzakki'];

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $KKmz = $_POST['kmz'];
  $namamz = $_POST['namamz'];
  $Tmz = $_POST['tmz'];
  $jebayar = $_POST['jebayar'];
  $jubayar = $_POST['jubayar'];
  $query = "INSERT INTO mzput (id_akunmz, KKmz, namamz, Tmz, jebayar, jubayar)
          VALUES ('$IdMuzakki', '$KKmz', '$namamz', '$Tmz', '$jebayar', '$jubayar')";
  mysqli_query($conn, $query);
  header("Location: input_dat.php");
  exit();
}
?>
