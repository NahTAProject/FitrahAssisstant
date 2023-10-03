<?php
	//koneksi ke database
	include "koneksi.php";
	include "database.php";
	//membuat fungsi generate ID muzakki
	function generateID() {
		$id = "";
		$digits = "123456789";
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$id_length = 8;
		$has_duplicate = true;
		while ($has_duplicate) {
			$id = "";
			for($i=0; $i < 6; $i++){
				$id .= $digits[rand(0, strlen($digits) - 1)];
			}
			for($i=0; $i < 2; $i++){
				$id .= $chars[rand(0, strlen($chars) - 1)];
			}
			if(!isIDExist($id)){
				$has_duplicate = false;
			}
		}
		return $id;
	}

	//memproses data dari form
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$nama = $_POST["nama"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		$konfirmasi_password = $_POST["konfirmasi_password"];
		$email = $_POST["email"];
		
		//validasi password dan konfirmasi password
		if($password != $konfirmasi_password){
			echo "Password dan konfirmasi password tidak sama";
		}
		//validasi form terisi lengkap
		elseif(empty($nama) || empty($username) || empty($password) || empty($konfirmasi_password) || empty($email)){
			echo "Semua form harus diisi";
		}
		else {
			//cek apakah username atau email sudah terdaftar di database
			$query = "SELECT * FROM akun WHERE username='$username' OR email='$email'";
			$result = mysqli_query($conn, $query);
			if(mysqli_num_rows($result) > 0){
				echo "Username atau email telah terdaftar";
			}
			else {
				//generate ID muzakki
				do {
					$id_muzakki = generateID();
					$query = "SELECT * FROM muzakki WHERE id_muzakki='$id_muzakki'";
					$result = mysqli_query($conn, $query);
				} while(mysqli_num_rows($result) > 0);
				
				//simpan data ke database
				$query = "INSERT INTO akun (username, password, email, id_akun) VALUES ('$username', '$password', '$email', '$id_muzakki')";
				mysqli_query($conn, $query);
				$query = "INSERT INTO muzakki (id_muzakki, nama_muzakki) VALUES ('$id_muzakki', '$nama')";
				mysqli_query($conn, $query);
				//redirect ke halaman sukses
				header("Location: Others/sukses.html");
			}
		}
	}

	//tutup koneksi ke database
	mysqli_close($conn);
?>
