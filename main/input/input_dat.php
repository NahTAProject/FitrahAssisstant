<?php
	session_start();
	
	// Check if user is logged in
	if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
	  $isLoggedIn = true;
	} else {
	  $isLoggedIn = false;
	  header("Location: ../login.php");
	  exit();
	}
	
	// Ambil data akun dari session
	$nama = $_SESSION['nama_muzakki'];
	$IdMuzakki = $_SESSION['id_muzakki'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Input Data</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script defer src="../JS/Typing.js" ></script>
  <link rel = "stylesheet" href="../Css/Typing.css">
  <script defer src="../JS/indat/indatmzms.js"></script>
  <link rel = "stylesheet" href="../Css/CalcZFitrah.css">
  <script defer src="../JS/Calc/CalcBtn.js" ></script>
</head>
<body>
	<div class="fmcont">
	  <a>Form Input Data Muzakki<a>
	  <a><form id ="formisi" action="pronputmz.php" method="POST">
		<label for="kmz">No Kartu Keluarga:</label>
		<input class="Fisi" type="text" id="kmz" name="kmz" required maxlength="16" oninput="validateInput(this)"/>
		<label for="namamz">Nama Muzakki:</label>
		<input class="Fisi" type="text" id="namamz" name="namamz" required maxlength="50">
		<label for="tmz">Orang yang Ditanggung:</label>
		<input class="Fisi" type="number" id="tmz" name="tmz" required value="1" min="1" step="1" onchange="hitungjubayar()">
		<label for="jebayar">Jenis Bayar:</label>
		<div class="seform">
			<img id="arocon1" class="arocon" src="http://localhost/PWeb%20Zakat/main/img_assets/select/arrow.png">
			<select class="Fisi" id="jebayar" name="jebayar" required onchange="hitungjubayar()">
			  <option value="makanan_pokok">Makanan Pokok</option>
			  <option value="uang">Uang</option>
			</select>
		</div>
		<label for="jumlahsha">Jumlah 1 Sha:</label>
		<div class="seform">
			<img id="arocon2" class="arocon" src="http://localhost/PWeb%20Zakat/main/img_assets/select/arrow.png">
			<select class="Fisi" id="jumlahsha" name="jumlahsha" required onchange="hitungjubayar()">
			  <option value="2.2">2.2 kg (1 Sha)</option>
			  <option value="2.5">2.5 kg (1 Sha)</option>
			  <option value="2.7">2.7 kg (1 Sha)</option>
			  <option value="3.8">3.8 kg (1 Sha)</option>
			</select>
		</div>
		<label for="hargaperkg">Harga per kg:</label>
		<input class="Fisi" type="number" id="hargaperkg" name="hargaperkg" step="50" required min="1000" value="11500" max="1000000" onchange="hitungjubayar()">
		<label for="jubayar">Jumlah Bayar:</label>
		<input class="Fisi" type="text" id="jubayar" name="jubayar" >
		<br><br>
		<input type="submit" value="Submit">
	  </form></a>
	</div>
	
  <div id="fm2" class="fmcont">
	  <a>Form Input Data Mustahik</a>
	  <a><form id ="formisi" action="pronputms.php" method="POST">
		<label for="kms">No Kartu Keluarga:</label>
		<input class="Fisi" type="text" id="kms" name="kms" required maxlength="16" oninput="validateInput(this)"/>
		<label for="namams">Nama Mustahik:</label>
		<input class="Fisi" type="text" id="namams" name="namams" required maxlength="50">
		<br>
		<label for="kategori">Kategori Mustahik:</label>
		<div class="seform">
			<img id="arocon3" class="arocon" src="http://localhost/PWeb%20Zakat/main/img_assets/select/arrow.png">
			<select class="Fisi" id="kategori" name="kategori" onchange="updateJumlahMenerima()">
			  <option value="Fakir">Fakir</option>
			  <option value="Fakir II">Fakir II</option>
			  <option value="Fakir III">Fakir III</option>
			  <option value="Miskin">Miskin</option>
			  <option value="Miskin II">Miskin II</option>
			  <option value="Miskin III">Miskin III</option>
			  <option value="Amil">Amil</option>
			  <option value="Mu'allaf">Mu'allaf</option>
			  <option value="Gharim">Gharim</option>
			  <option value="Fi Sabilillah">Fi Sabilillah</option>
			  <option value="Ibnu Sabil">Ibnu Sabil</option>
			</select>
		</div>
		<br>
		<label for="jerim">Jenis Menerima:</label>
		<div class="seform">
			<img id="arocon4" class="arocon" src="http://localhost/PWeb%20Zakat/main/img_assets/select/arrow.png">
			<select class="Fisi" id="jerim" name="jerim" onchange="updateJumlahMenerima()">
			  <option value="makanan_pokok">Makanan Pokok</option>
			  <option value="uang">Uang</option>
			</select>
		</div>
		<br>
		<label for="jurim">Jumlah Menerima Zakat:</label>
		<input class="Fisi" type="text" id="jurim" name="jurim" required maxlength="100">
		<br><br>
		<input type="submit" value="Submit">
	  </form></a>
  </div>
	<div id="gifcont">
		<div id="botcont">
			<img id="gifimg" src="../BotEA/Levitating_BotEA.gif">
		</div>
		<div id="jcont">
			<div id="incont">
				<p id="jawabP"></p><br>
			</div>
		</div>
		<p style="text-align: center;">apa ada pertanyaan?</p>
		<div id="btncont">
			  <button id="per1" onclick="jwbper('per1')">Mengapa tidak ada tabel?</button> 
			  <button id="per2" onclick="jwbper('per2')">Apa form ini sudah otomatis?</button> 
			  <button id="per3" onclick="jwbper('per3')">lalu dimana saya bisa melihat isi tabel?</button> 
		</div>
	</div>
	<script>
		const nama = '<strong><?php echo htmlspecialchars($nama, ENT_QUOTES); ?></strong>';
	</script>
</body>
</html>

