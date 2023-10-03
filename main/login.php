<!DOCTYPE html>
<html>
	<head>
	  <title>Login Form</title>
	  <style>
		body {
		  margin: 0;
		  background-color: #F5F5F5;
		}
		
		.error {

		   background: #F2DEDE;

		   color: #0c0101;

		   padding: 10px;

		   width: 95%;

		   border-radius: 5px;

		   margin: 20px auto;
		}
		
		.wrapper {
		  display: flex;
		  align-items: center;
		  justify-content: center;
		  height: 100vh;
		  background: linear-gradient(45deg,#CCCCCC, #EFEFEF, #8A8A8A, #F4F4F4, #616161, #141414);
		  background-size: 800% 100%;
		  animation: gradient 20s linear infinite;
		  animation-direction: alternate;
		}

		@keyframes gradient {
		  0% {background-position: 0%}
		  100% {background-position: 100%}
		}

		.form-container {
		  background-color: #FFFFFF;
		  border-radius: 10px;
		  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
		  width: 400px;
		  padding: 50px;
		  display: flex;
		  flex-direction: column;
		  align-items: center;
		  justify-content: center;
		}

		h1 {
		  font-size: 2.5rem;
		  margin-bottom: 20px;
		}

		input[type="text"],
		input[type="password"] {
		  width: 100%;
		  margin: 10px 0;
		  padding: 15px;
		  border: none;
		  border-radius: 5px;
		  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
		  font-size: 1.2rem;
		}

		input[type="submit"] {
		  background: linear-gradient(45deg,#F4F4F4, #141414);
		  margin-top: 10px;
		  width: 120px;
		  border: none;
		  color: #FFFFFF;
		  cursor: pointer;
		  font-size: 1rem;
		  padding: 15px;
		  border-radius: 5px;
		  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
		  transition: background 2s ease;
		}

		input[type="submit"]:hover {
		  background: linear-gradient(45deg,#141414, #F4F4F4);
		}
		a {
			color: #333;
			bottom: 30px;
			text-decoration: none;
			font-size: 14px;
			margin-top: 13px;
			transition: color 0.5s ease;
		}

		a:hover {
			color: #CCCCCC;
		}
		span {
		  font-size: 0.8rem;
		  margin-top: 10px;
		  color: #FF3706;
		}
	  </style>
	</head>
	<body>
	  <div class="wrapper">
		<form class="form-container" method="POST" action="proseslogin.php">
		  <h1>Login</h1>
		  <input type="text" name="username_email" placeholder="Username/Email" oninvalid="this.setCustomValidity('tolong isi username/email terlebih dahulu')" required>
		  <input type="password" name="password" placeholder="Password" oninvalid="this.setCustomValidity('tolong isi password terlebih dahulu')" required>
		  <input type="submit" value="Login">
		  <a href="#">Forgot Password?</a>
		  <?php if(isset($_GET['error'])): ?>
			<span class="error">Username/Email atau password salah</span>
		  <?php endif; ?>
		</form>
	  </div>
	</body>
</html>
