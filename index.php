<?php


include("conn.php");

 $datenow = date('Y-m-d H:i:s');
    //session_start();    

if(isset($_POST["go"])){
	$user   = $_POST["log"];
	$passe1 = $_POST["pas"];
	$passe  = ($passe1);

    $query = "SELECT * FROM user WHERE user_name='".$user."' AND user_password='".$passe."'";
    $result = mysqli_query($conn, $query);


if ($result) 
{

    $row                      = mysqli_fetch_assoc($result);
	$iduseris                 = $row['user_id'];
	$statut                   = $row['statut'];
	$_SESSION["session_login"]= $row['user_name'];
	


    $update1="UPDATE user set last_activity='".$datenow."' WHERE user_name='".$user."' AND user_password='".$passe."'";
    mysqli_query($conn, $update1);


	if ($user=!$row['user_name'] || $passe=!$row['user_password'])
	{
        echo "<script>alert(\"Attention ! le nom d'utilisateur ou le mot de passe est incorrect.\")</script>";
    }
	
	else{
        header('location: home.php');
     }
}
}



    

?>



<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Dento app</title>

	<!-- Site favicon -->
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/dent.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page" style="background-image: url('vendors/images/login.jpeg');background-repeat: no-repeat;background-attachment: fixed;background-size: 100% 100%;">

	<div class="login-wrap" style="width: 100%;  
  min-height: 100vh;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  padding: 15px;">
		<div class="container" >
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10 ">
						<div class="login-title">
							<h5 class="text-center text-primary">Veuillez saisir vos informations :</h5>
						</div>
						<form method="post">
							<div class="select-role">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn active">
										<input type="radio" name="options" id="admin">
										<div class="icon"><img src="vendors/images/briefcase.svg" class="svg" alt=""></div>
										<span>Je suis </span>
										Assistant(e)
									</label>
									<label class="btn">
										<input type="radio" name="options" id="user">
										<div class="icon"><img src="vendors/images/person.svg" class="svg" alt=""></div>
										<span>Je suis</span>
										Docteur
									</label>
								</div>
							</div>
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" placeholder="Nom d'utilisateur" name="log">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" placeholder="Mot de passe" name="pas">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-4">
										<!--
											use code for form submit
										-->
										<input class="btn btn-primary btn-lg btn-block" name="go" type="submit" value="Se connecter">

									</div>
									<div class="input-group mb-8">
										<a class="btn btn-outline-primary btn-lg btn-block" href="register.php">Créer un compte</a>
									</div> 

									<div class="row mb-3" style="padding-left: 20px; font-family: Courier New, monospace;">
<div class="col ">
	<label>Pour plus d’informations contactez nous.<br><br>
	<i> Mail : <a href="mailto:both1suppo@gmail.com" style="color: #0573c1">both1suppo@gmail.com</a></i><br><br>
		<i> Tél/Whtsp : <a href="tel:+212684486046" style="color: #0573c1">+212684486046</a></i><br>
	</label><br>
</div>

									
								</div>
							
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>