<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ielogošanās sistēmā</title>
    <link rel="stylesheet" href="../files/style_login.css">
</head>
<body>
	<div class="container" id="container">
		<div class="form-container sign-in-container">
			<form action="#" method="post">
				<img class="logo" src="../images/lvt.png">
				<h1>Ielogoties sistēmā</h1>
				<input type="email" name="email" placeholder="Lietotājvārds" />
				<input type="password" name="password" placeholder="Parole" />
				<button type="submit" name="loginBtn">Ielogoties</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<h1>Esi sveicināts!</h1>
					<p>Audzēkņu uzņemšanas sistēmas administrēšanas vietne paredzēta tikai skolas vadībai!</p>
					<button class="ghost" id="signUp" type="submit" onclick="toMainPage()">Doties uz galveno lapu</button>
					<script>
						function toMainPage() {
							window.location.href="../index.php";
						}
 					</script>
				</div>
			</div>
		</div>
	</div>
	<?php 
		session_start();
		if(isset($_POST['loginBtn'])){
			require("../files/connect_db.php");
			$userEmail = mysqli_real_escape_string($con,$_POST['email']);
			$pass = mysqli_real_escape_string($con,$_POST['password']);

			$selUser_SQL = "SELECT * FROM users WHERE email = '$userEmail'";
			$rsUser = mysqli_query($con,$selUser_SQL);
				if(mysqli_num_rows($rsUser) == 1){
					$recordUser = mysqli_fetch_assoc($rsUser);
					if(password_verify($pass,$recordUser['password'])){
						$_SESSION["userName"] = $userEmail;
						
						header("location: index.php");
						echo "<script>alert('{$userEmail}')</script>";
					}else{
						echo "<script>alert('aaa')</script>";
						echo "Nepareizs lietotājvārds vai parole!";
					}
				}else{
					echo "Nepareizs lietotājvārds vai parole";
				}
			}
		?>
</body>
</html>