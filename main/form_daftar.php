<!DOCTYPE html>
<html>
<head>
	<title>Form Pendaftaran</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		form {
			background-color: #ffffff;
			max-width: 500px;
			margin: 0 auto;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0px 0px 5px #cccccc;
		}
		input[type="text"], input[type="password"], input[type="email"] {
			width: 100%;
			padding: 12px;
			border: 1px solid #cccccc;
			border-radius: 4px;
			box-sizing: border-box;
			margin-top: 6px;
			margin-bottom: 16px;
			resize: vertical;
			font-size: 16px;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 16px;
		}
		input[type="submit"]:hover {
			background-color: #45a049;
		}
		.error {
			color: red;
		}
	</style>
</head>
<body>
	<form method="post" action="prosesdaftar.php">
		<h2>Form Pendaftaran</h2>
		<label for="nama">Nama:</label>
		<input type="text" id="nama" name="nama" required>
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" required>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required>
		<label for="konfirmasi_password">Konfirmasi Password:</label>
		<input type="password" id="konfirmasi_password" name="konfirmasi_password" required>
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required>
		<input type="submit" value="Daftar">
	</form>
</body>
</html>
