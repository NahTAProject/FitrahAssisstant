<?php
	session_start();
	
	// Check if user is logged in
	if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
	  $isLoggedIn = true;
	} else {
	  $isLoggedIn = false;
	  header("Location: login.php");
	  exit();
	}
	
	// Ambil data akun dari session
	$username = $_SESSION['username'];
	$nama = $_SESSION['nama_muzakki'];
	$IdMuzakki = $_SESSION['id_muzakki'];
	$profile_img = $_SESSION['profilePic'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard | Fitrah Assistant</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Extension -->
	<script defer src="JS/RA/BotEARA1.js"></script>
	<script defer src="JS/RA/BotEARA2.js"></script>
	<script defer src="JS/RA/BotEARA3.js"></script>
	<script defer src="JS/RA/BotEARA4.js"></script>
	<script defer src="JS/RA/BotEARA5.js"></script>
	<script defer src="JS/RA/BotEARA6.js"></script>
	<script defer src="JS/RA/BotEARA7.js"></script>
	<script defer src="JS/RA/BotEARA8.js"></script>
	<script defer src="InteractScript.js"></script>
	<!--framework Materialize-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- Include Materialize JavaScript -->
	<!-- Material Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<style>
		strong {
		  font-weight: bold;
		}
	
		.navbar {
			background-color:#300fac;
		}
		
		.navbar ul:not(.dropdown-content) li a {
            color: white;
        }
		
		.dropdown-content li a {
		  color: #300fac !important;
		}
		
		.profile-img {
			width: 40px;
			height: 40px;
			border-radius: 50%;
			object-fit: cover;
			margin-right: 5px;
			max-height: 40px;
		 }
		 
		.profile-container {
			display: flex;
			align-items: center;
		}
		.blink {
		  animation: blink-animation 1s steps(5, start) infinite;
		  -webkit-animation: blink-animation 1s steps(5, start) infinite;
		}

		@keyframes blink-animation {
		  to {
			visibility: hidden;
		  }
		}

		@-webkit-keyframes blink-animation {
		  to {
			visibility: hidden;
		  }
		}
	</style>
	<link rel = "stylesheet" href="Css/NavBtn.css">
</head>
<body>

<body>
    <nav class="navbar">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">
                <img src="../images/logo.png" alt="Logo" style="margin-left: 20px; height: 64px;">
            </a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger">
                <i class="material-icons" style="color: white;">menu</i>
            </a>
            <ul class="right">
                <li><a href="#"><i class="material-icons left">home</i> Home</a></li>
                <li><a href="#"><i class="material-icons left">info</i> About</a></li>
                <li><a href="#"><i class="material-icons left">phone</i> Contact</a></li>
                <li>
                    <a class="dropdown-trigger" href="#" data-target="dropdown1">
					<?php
					if (empty($profile_img)) {
						$path = "http://localhost/PWeb%20Zakat/main/images/usr.png";
					} else {
						$path = "http://localhost/PWeb%20Zakat/main/images/" . $profile_img;
					}
					?>
						<div class="profile-container">
							<img src="<?php echo $path; ?>" alt="Profile Image" class="circle" style="height: 40px; margin-right: 5px;">
                        <?php echo htmlspecialchars($nama, ENT_QUOTES); ?>
                        <i class="material-icons right">arrow_drop_down</i>
						</div>
                    </a>
						<ul id="dropdown1" class="dropdown-content">
							<li><a href="#"><i class="material-icons left">edit</i>Edit Profile</a></li>
							<li><a href="logout.php"><i class="material-icons left">logout</i>Logout</a></li>
						</ul>
                </li>
            </ul>
        </div>
    </nav>

	<ul class="sidenav" id="mobile-demo">
			<li><a href="#"><i class="material-icons left">home</i> Home</a></li>
			<li><a href="#"><i class="material-icons left">info</i> About</a></li>
			<li><a href="#"><i class="material-icons left">phone</i> Contact</a></li>
			<li>
				<a class="dropdown-trigger black-text" data-target="dropdown-menu-mobile" href="#">
				  <?php
					if(empty($profile_img)) {
					  $path = "http://localhost/PWeb%20Zakat/main/images/user.png";
					} else {
					  $path = "http://localhost/PWeb%20Zakat/main/images/" . $profile_img;
					}
				  ?>
				  <img src="<?php echo $path; ?>" class="profile-img" style="height: 40px; border-radius: 50%; margin-right: 5px; margin-top: 5px;">
				  <?php echo htmlspecialchars($nama, ENT_QUOTES); ?>
				  <i class="material-icons right">arrow_drop_down</i>
				</a>
				<ul id="dropdown-menu-mobile" class="dropdown-content">
				  <li><a href="#"><i class="material-icons left">edit</i>Edit Profile</a></li>
				  <li><a href="logout.php"><i class="material-icons left">logout</i>Logout</a></li>
				</ul>
			</li>
    </ul>

	<div class="Floatnavbar">
	  <a>MENU</a>
	  <a href="http://localhost/PWeb%20Zakat/main/simple.html">Kalkulator Zakat</a>
	  <a href="http://localhost/PWeb%20Zakat/main/input/input_dat.php">Input data</a>
	  <a href="#">Modifikasi data</a>
	  <a href="#">Tema</a>
	  <a href="#">Settings</a>
	</div>
	<!-- Main Content -->
	<div class="container">
		<div class="row">
			<div id="gif-container">
			  <img id="gif-image" src="BotEA\Sleepingbot.gif">
			</div><br>
			<span id= "tdrBotEA" class="kataBotEA">BotEA sedang tidur</span>
			<div style="width: 45%; margin: 0 auto;" id="answer"></div><br>
			<div id="keterangan_BotEA">
				<h2> CHAT BotEA </h2>
			</div>
			<div id="Htxt" class="col-md-12">
				<h1>Selamat Datang!!</h1>
				<p>Mari rasakan pengalaman menarik saat berinteraksi dengan BotEA, sebuah entitas robotik yang sedang dalam fase eksplorasi dan pengembangan dengan segala perjuangan yang dilakukan untuk membuat program ini terwujud. BotEA adalah sebuah chatBot yang beranimasi PixelArt yang sederhana namun inovatif, dan akan membawa pengguna ke dalam pengalaman interaksi yang unik. Mari kita bergabung dengan BotEA, sebuah karya yang hasil dari kerja keras dan perjuangan demi memberikan kebahagiaan dan kesenangan bagi para penggunanya.</p>
				<p>Saya harap BotEA dapat membantu dan menghibur anda "<strong><?php echo htmlspecialchars($nama, ENT_QUOTES); ?></strong>"</p>
			</div>
		</div>
		<button id="change-gif-button">Bangunkan</button> <br>
			<div id="smallButtonsContainer">
			  <button id="btn1" class="smallButton">Assalamualaikum!</button> <button id="btn2" class="smallButton">Hi!</button> <button id="btn3" class="smallButton">siapa kamu?</button><!--Terimakasih!-->
			  <button id="btn4" class="smallButton">Apa tujuan mu?</button> <button id="btn5" class="smallButton">Apa itu zakat?</button> <button id="btn6" class="smallButton">Cara hitung zakat?</button>
			  <button id="btn7" class="smallButton">Fitur yang tersedia saat ini?</button> <button id="btn8" class="smallButton">Apa syarat untuk membayar zakat?</button> <button id="btn9" class="smallButton">Siapa yang berhak untuk menerima zakat?</button>
			  <button id="btn10" class="smallButton">Apa itu mustahik?</button> <button id="btn11" class="smallButton">Apa itu muzakki?</button> <button id="btn12" class="smallButton">Bayar zakat itu wajib?</button>
			  <button id="btn13" class="smallButton">Siapa Developer kamu?</button> <button id="btn14" class="smallButton">1 sha?</button> <button id="btn15" class="smallButton">saya puas</button>
			  <button id="btn16" class="smallButton">Terdapat Kesalahan</button> <button id="btn17" class="smallButton">Panduan</button> <button id="btn18" class="smallButton">Dukungan</button>
			</div>
				<br>
			<div id="bigButtonsContainer">
			  <button class="bigButton">COMING SOON!!</button> <button class="bigButton">COMING SOON!!</button> <button class="bigButton">COMING SOON!!</button>
			  <button class="bigButton">COMING SOON!!</button> <button class="bigButton">COMING SOON!!</button> <button class="bigButton">COMING SOON!!</button>
			  <button class="bigButton">COMING SOON!!</button> <button class="bigButton">COMING SOON!!</button> <button class="bigButton">COMING SOON!!</button>
			  <button class="bigButton">COMING SOON!!</button> <button class="bigButton">COMING SOON!!</button> <button class="bigButton">COMING SOON!!</button>
			</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<!-- Animasi BotEA -->
	<script>
	const nama = '<strong><strong><?php echo htmlspecialchars($nama, ENT_QUOTES); ?></strong></strong>';
		document.addEventListener('DOMContentLoaded', function() {
			var elems = document.querySelectorAll('.sidenav');
			var instances = M.Sidenav.init(elems);

			var dropdowns = document.querySelectorAll('.dropdown-trigger');
			var dropdownOptions = {
			  constrainWidth: false,
			  coverTrigger: false
			};
			var dropdownInstances = M.Dropdown.init(dropdowns, dropdownOptions);
		  });
			window.addEventListener('DOMContentLoaded', (event) => {
				var buttons = document.querySelectorAll('.custom-button');
				buttons.forEach(function(button) {
				  button.classList.remove('waves-effect');
				});
			});
	</script>
	
</body>
</html>
