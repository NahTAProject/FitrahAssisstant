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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $namams = $_POST['namams'];
  $kkms = $_POST['kms'];
  $kms = $_POST['kategori'];
  $jerim = $_POST['jerim'];
  $jurim = $_POST['jurim'];

  $query = "INSERT INTO msput (id_akunmz, KKms, namams, kategori, jerim, jurim) VALUES ('$IdMuzakki', '$kkms', '$namams', '$kms', '$jerim', '$jurim')";
  mysqli_query($conn, $query);
  header("Location: input_dat.php");
  exit();
}
?>
