<?php 

include('conn.php');
// include('session.php');

if (isset($_POST['ajout'])) 
{

    $nom              = addslashes($_POST['nom']);
    $prenom           = addslashes($_POST['prenom']);
    $cin              = addslashes($_POST['cin']);
    $ddn              = addslashes($_POST['ddn']);
    $ville            = addslashes($_POST['ville']);
    // $inscri              = date("Y-m-d");
    $sitfam           = addslashes($_POST['sitfam']);
    $tel              = addslashes($_POST['tel']);
    $adresse          = addslashes($_POST['adresse']);
    $prof             = addslashes($_POST['prof']);
    $typemut          = addslashes($_POST['typemut']);
    $sexe             = addslashes($_POST['sexe']);

    $ant              = addslashes($_POST['ant']);
    $chirurg          = addslashes($_POST['chirurg']);
    $fam              = addslashes($_POST['fam']);
    $chron            = addslashes($_POST['chron']);
    
   
 
    $req="INSERT INTO patient(nom,prenom,cin,ddn,ville,sitfam,telephone,adresse,profession,mutuelle,sexe,ant,chirurg,fam,chron) 
    values ('$nom','$prenom','$cin','$ddn','$ville','$sitfam','$tel','$adresse','$prof','$typemut','$sexe','$ant','$chirurg','$fam','$chron');";  
    mysqli_query($conn,$req);
    header('location:patient.php');
 
 }

		  

?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>ajouter Patient</title>

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
						<div class="col-md-6 col-sm-12">
							<div class="title">
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									
									<li class="breadcrumb-item"><a href="patient.php"> <i class="icon-copy fa fa-users" aria-hidden="true"></i> &nbsp;Retour</a></li>
									<li class="breadcrumb-item active" aria-current="page">Ajouter un patient</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
				<div class="pd-20 bg-white  box-shadow mb-30">


				<form action="" method="post">
            <!-- page title area end -->
            <div class="main-content-inner" >
                <div class="row" align="center">
              
                    <!-- data table start -->

                    <div class="col-12 mt-5"  >
                        <div class="card col-sm-12"  style="   margin: 0 auto; ">
                            <div class="card-body col-sm-12"  style="   margin: 0 auto; ">
                       
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                  
          
              <div class="row col-sm-12" style="border: 2px solid #99bcd0;border-radius: 12px;padding: 1%">
          
                <input type="text" class="  form-control mb-3" name="nom" placeholder="Nom" >
              
                
                   

          
                <input class="form-control mb-3" type="text" name="prenom" id="example-tel-input" placeholder="Prenom">
    
                <input class="form-control mb-3" type="text" name="cin" id="example-tel-input" placeholder="Cin">

                <input class="form-control mb-3" type="text" name="tel" id="example-tel-input" placeholder="Telephone">

   
                                 <b class="text-muted   d-block">Sexe: &nbsp; &nbsp; &nbsp;</b>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" value="Femme"  id="customRadio" name="sexe" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio">Femme</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" value="Homme" id="customRadio2" name="sexe" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio2">Homme</label>
                                            </div>
              </div>
            

                                    </div>


                                </div>
                  
                    
              

                                    <!---------------------- start 2-------------------->


                                <div class="row">
                                    <div class="col-md-12 mt-5">
                                        
                                  
          
              <div class="row col-sm-12" style="border: 2px solid #99bcd0;border-radius: 12px;padding: 1%">
                <input type="text" value="Né (le)" class=" col-sm-4 form-control mb-3" disabled>
                <input type="date" class=" col-sm-4 form-control mb-3" name="ddn" ><br>
                <input type="text" class=" col-sm-4 form-control mb-3" placeholder="à" name="ville" ><br><br>
                <select class=" form-control mb-3" name="sitfam">
                                                <option >Situation Familliale</option>
                                                <option value="marié">Marié</option>
                                                <option value="célibataire">Célibataire</option>
                                                <option value="divorcé">Divorcé</option>
                                            </select>
                   

          
                <input class="form-control mb-3" type="text" name="adresse" id="example-tel-input" placeholder="Adresse">
    
                <input class="form-control mb-3" type="text" name="prof" id="example-tel-input" placeholder="Profession">
   
                                 <b class="text-muted   d-block">Mutuelle: &nbsp; &nbsp; &nbsp;</b>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio"  id="customRadio1" name="typemut" class="custom-control-input" value="Cnss">
                                                <label class="custom-control-label" for="customRadio1">Cnss</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio3" name="typemut" class="custom-control-input" value="Cnops"> 
                                                <label class="custom-control-label" for="customRadio3">Cnops</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio5" name="typemut" class="custom-control-input" value="Autre">
                                                <label class="custom-control-label" for="customRadio5">Autre</label>
                                            </div>


                            
                                            
                           
              </div>
              

                                    </div>


                               
                                </div>
                  
                    
                            <!----------------- end 2---------------->


                                
                                
                                                          <!---------------------- start 3------------------------------------------>
                                            

                                <div class=" col-xs-12 col-sm-12 mt-5 " >
              <div class="space space-10"></div>
                <div class=" row center" style="border: 2px solid #99bcd0;border-radius: 12px;padding: 4%">
                  <div name="ant" class="col-sm-3">
                    <label style="width: 100%; background-color:#E0E0E0">Antécédents Médicaux</label>
                    <textarea class="form-control" aria-label="With textarea" name="ant"></textarea>

                  </div>
                  <div name="chirurg" class="col-sm-3">
                    <label class="label label-success label-white" style="width: 100%; background-color:#E0E0E0">Chirugicaux</label>
                    <textarea class="form-control" aria-label="With textarea" name="chirurg"></textarea>

                  </div>
                  <div name="fam"  class="col-sm-3">
                    <label class="label label-success label-white" style="width: 100%; background-color:#E0E0E0">Familiaux</label>
                    <textarea class="form-control" aria-label="With textarea" name="fam"></textarea>

                  </div>
                  <div name="chron" class="col-sm-3">
                    <label class="label label-success label-white" style="width: 100%; background-color:#E0E0E0">Affections Chroniques</label>
                    <textarea class="form-control" aria-label="With textarea" name="chron"></textarea>

                  </div>
                </div>
              </div>

                    

                    <!------- end 3------->

                    <input type="submit" class="btn btn-primary btn-lg mt-3 " value="valider" name="ajout" style="width: 50%;">


                     


                            </div>
                        </div>
                    </div>
                    <!-- data table end -->
                 
                </div>
            </div>
        </div>
    </div>
</form>
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