<?php
include("conn.php");


if (isset($_POST['modifieruser'])) {

                              $data1      = $_POST['nomuser'];
                              $data14     = $_POST['paswwordishere'];
                              $data16     = $_POST['sexeuser'];
                              $iduserthis = $_POST['idusrmdf'];

                                    foreach ($data1 as $key => $data1a) {

                                if (!empty($data1a) ) 
                                            {
                                $update1aa="UPDATE `user` SET `user_name` = '".$data1a."' WHERE `user`.`user_id` = '".$iduserthis[$key]."'";
                                mysqli_query($conn, $update1aa);
                                            }

                                if (!empty($data14[$key]) )
                                            {
                                $update1aa="UPDATE `user` SET `user_password` = '".md5($data14[$key])."' WHERE `user`.`user_id` = '".$iduserthis[$key]."'";
                                mysqli_query($conn, $update1aa);
                                            }
                    
                                if (!empty($data16[$key]) ) {
                                    $update1aa="UPDATE `user` SET `sexe` = '".$data16[$key]."' WHERE `user`.`user_id` = '".$iduserthis[$key]."'";
                                    mysqli_query($conn, $update1aa);
                                                }
                    

                              }
                              if ($iduserthis[$key] == $iduser) {
                              header('Location: login.php');
                              }else{
                              header('Location: user.php');
                              }
}

if(isset($_POST["ajoutuser"]))
                            {
                                $data1        = $_POST['nomuser'];
                                $data14       = $_POST['paswwordishere'];
                                $data16       = $_POST['sexeuser'];
                                $statut=0;
                                $password2md5 = md5($data14);

                                $result = $conn->query("SELECT * FROM user where user_name='".$data1."'");  
                                $row_cnt = $result->num_rows;
                                if ($row_cnt>0){

                                  $message = "Utilisateur déjà enregistré !";
                                  echo "<-script type='text/javascript'>alert('$message');</-script>";
                                }else{

                              if(!empty($_POST['nomuser']))
                              { 
                              $sqlcontact = "INSERT INTO `user` (`user_name`, `user_password`, ` statut`) VALUES ('$data1', '$password2md5','$statut')";
                              mysqli_query($conn, $sqlcontact);


                              }else{
                                $message = "Erreur !";
                                echo "<-script type='text/javascript'>alert('$message');</-script>";
                              }
                          }

                              header('Location: user.php');
                            } 



?>


<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

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
<body>
<?php
	include ("header.php")
	?>



	<?php
	include ("sidebar.php")
	?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-sm-6">
						
							<nav aria-label="breadcrumb" role="navigation">
                            <h5 class="widget-title"><i class="ace-icon fa fa-users icon-animated-bell orange"></i> Les sessions : </h5>
							</nav>
						</div>
                
					</div>
				</div>
				<div class="pd-20 bg-white  box-shadow mb-30">
                               <!-- Modal -->
                  
                               <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">

                             <form action="" method="post">
                        <div class="modal-body">
                          <legend class=" center" style="background-color: #FFB752;width: 100%">Ajouter des sessions</legend>

                          <div class="row" style="padding: 2%">
                                 <input type="text" value="Session :" class="col-xs-12 col-sm-7"  class="form-control" disabled>
                                 <input type="text" class="col-xs-12 col-sm-5 form-control" placeholder="Nom" name="nomuser" required>

                                 <input type="text" value="Mot de passe :" class="col-xs-12 col-sm-7" class="form-control" disabled>
                                 <input type="password" class="col-xs-12 col-sm-5 form-control" placeholder="Mot de passe" name="paswwordishere" required>


                                <input type="text" class="col-xs-12 col-sm-7" placeholder="Sexe" class="form-control" disabled>
                                <select  class="col-xs-12 col-sm-5 form-control"  name="sexeuser" required>
                                  <option></option>
                                  <option value="Homme">Homme</option>
                                  <option value="Femme">Femme</option>
                                </select>
                                </div>
                     
                        </div>
                          <div class="modal-footer center">
                          <input type="submit" class="btn btn-success btn-app" name="ajoutuser" value="Ajouter">
                          <button type="button" class="btn btn-danger btn-app" data-dismiss="modal">Fermer</button>
                          </div>   
                        </form>
                      </div>
                      </div>
                   </div>

            	<div class="col pb-3 pt-3" align="right " >
                            
                            
                            <button  class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#myModal" > <i class="fa fa-user-plus"></i> </button>

                                                                     </div>

                                                                     <?php
                                        $query2 = "SELECT * FROM user where user_id>1 ORDER by user_name ASC "; 
                                        $result2 = mysqli_query($conn, $query2);  
                                        if(mysqli_num_rows($result2) > 0)  
                                        {  
                                             while($row = mysqli_fetch_array($result2))  
                                             { 
                                              $iduserthis = $row['user_id'];
                                              ?>

<div class="col-sm-12 col-md-12 col-lg-4 mb-30">
<a href="" data-toggle="modal" data-target="#user<?php echo $row['user_id'];?>">

						<div class="card card-box">
                        <span class="profile-picture">

<?php 
if ($row['sexe'] == 'Homme'){
?>
<img  class="editable img-responsive" src="vendors/images/homme1.png" />
<?php
}else{
?>
<img  class="editable img-responsive" src="vendors/images/femme1.jpg" />
<?php
}
?>
    </span>
							<div class="card-body">
					
                            <strong><span class="badge badge-warning" style="width: 100%"> <?php echo $row['user_name'];?></strong>
                                </a>
                                <small>Dernière connexion : <?php echo $row['last_activity'];?></small>
							</div>
						</div>
					</div>



                    <div class="modal fade" id="user<?php echo $row['user_id'];?>" role="dialog">
                  <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">

                             <form action="" method="post">
                                <div class="modal-body">
                                    <legend class=" center" style="background-color: #FFB752;width: 100%">Modifier la session</legend>

                          <div class="row" style="padding: 2%">
                                 <input type="text" style="display: none;"  value="<?php echo $row['user_id'];?>" name="idusrmdf[]">
                                 <input type="text" value="* Session:" class="col-xs-12 col-sm-7" class="form-control" disabled>
                                 <input type="text" class="col-xs-12 col-sm-5 form-control" placeholder="* Nom" value="<?php echo $row['user_name'];?>" name="nomuser[]" required>

                                 <input type="text" value="* Mot de passe:" class="col-xs-12 col-sm-7" class="form-control" disabled>
                                 <input type="password" class="col-xs-12 col-sm-5 form-control" placeholder="Mot de passe" name="paswwordishere[]" >


                                <input type="text" class="col-xs-12 col-sm-7" placeholder="Sexe" class="form-control" disabled>
                                <select  class="col-xs-12 col-sm-5 form-control" name="sexeuser[]">
                                  <option></option>
                                  <option value="Homme">Homme</option>
                                  <option value="Femme">Femme</option>
                                </select>
                                </div>
                     
                        </div>
                          <div class="modal-footer center">
                          <input type="submit" class="btn btn-warning btn-app" name="modifieruser" value="Modifier">
                          <button type="button" class="btn btn-danger btn-app" data-dismiss="modal">Fermer</button>
                          </div>   
                        </form>
                      </div>
                      </div>
                   </div>








<?php
                          }
                        }
                        ?>
				</div>
			</div>
			
		</div>
	</div>
	<!-- js -->


<script>




    
</script>

	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>