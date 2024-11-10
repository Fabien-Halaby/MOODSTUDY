<?php
	session_start();
	include_once("database.php");
	include_once("user.php");
	$database = new Database;
	$user = new User;
	$database->conn = $database->connect();
	if(isset($_POST['signup'])){
		$info = $user->getInformation();
		$email = $user->getEmail();
		if($user->haveAccount($email,$database->conn)){
			header('location:index.php?mess=yes');
		}else{
			$database->insert($info);
			$s = mysqli_query($database->conn,"INSERT INTO `Temps-Libre` VALUES (NULL,'$email','lundi','06:00','09:00')");
			header('location:index.php?mess=log');
		}
	}
	if(isset($_POST['signin'])){
		$email = $user->getEmail();
		$password = $user->getPassword();
		if($user->haveAccount($email,$database->conn) && $user->validPassword($email,$password,$database->conn)){
			$_SESSION['moodstudy.com'] = $email;
			header('location:home.php');
		}else{
			header('location:index.php?mess=no');
		}
	}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Sign up / Login Form</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
			
			<div class="signup">
				<form action="" method="post">
					<label for="chk" aria-hidden="true">Inscription</label>
					<?php
						if(isset($_GET['mess']) && $_GET['mess'] == 'yes'){
						?>
						<div class="alert">
							<span class="close-btn" onclick="this.parentElement.style.display='none'">&times;</span>
							Vous avez déjà un compte
						</div>
						<?php
						}elseif(isset($_GET['mess']) && $_GET['mess'] == 'log'){
							?>
							<div class="alert">
								<span class="close-btn" onclick="this.parentElement.style.display='none'">&times;</span>
								Création du compte avec succès
							</div>
							<?php
						}elseif(isset($_GET['mess']) && $_GET['mess'] == 'no'){
							?>
								<div class="alert">
								<span class="close-btn" onclick="this.parentElement.style.display='none'">&times;</span>
								Mot de passe ou email incorrect
							</div>
							<?php
						}
					?>
					<input type="text" name="name" placeholder="Nom et prénoms" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Mot de passe" required="">
					<button type="submit" name="signup">S'inscrire</button>
				</form>
			</div>

			<div class="login">
				<form action="" method="post">
					<label for="chk" aria-hidden="true">Connexion</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Mot de passe" required="">
					<button  type="submit" name="signin">Se connecter</button>
				</form>
				<a href="#" class="password">Mot de passe oublié ?</a>
			</div>
	</div>
</body>
</html>
<!-- partial -->
  
</body>
</html>
