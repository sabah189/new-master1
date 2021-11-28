<?php


include("conn.php");


if (isset($_POST['go'])) 
{

    $name              = addslashes($_POST['log']);
    $password          = addslashes($_POST['pas']);
    $statut            = 0;
    $activity          = date('Y-m-d H:i:s');
    $inscri            = date('Y-m-d');
     
 
    $req    ="INSERT INTO user(user_name,user_password,statut,last_activity,user_date) values ('$name','$password','$statut','$activity ','$inscri');"; 
    $result = mysqli_query($conn, $req);


	if($result){
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Félicitations enregistrement effectué avec succès')
		window.location.href='index.php';
		</script>");
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

	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h5 class="text-center text-primary">Veuillez saisir vos informations :</h5>
						</div>
						<form method="post">
							<div class="select-role">
								
							</div>
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" placeholder="Nom d'utilisateur" name="log" required>
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
                            <div class="input-group custom">
								<input type="password" class="form-control form-control-lg" placeholder="confirmer mot de passe" name="pas">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
                                          
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<!--
											use code for form submit
										-->
										<input class="btn btn-primary btn-lg btn-block" name="go" type="submit" value="Valider">

									</div>
                                    <br>

									<i style="color: #84cde1" class="fa fa-long-arrow-left" aria-hidden="true"></i>  <a href="index.php" style="color: #84cde1">Page de connexion.</a>

									
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