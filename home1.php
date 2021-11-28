
     <?php  

include('conn.php');
			$query  = "SELECT * FROM patient pat,rdv rdv 
					   WHERE rdv.pat_id=pat.pat_id AND DATE(`date`) = CURDATE() and statut=1 " ;

						$result1 =  mysqli_query($conn,$query);

                   
							 ?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Patient</title>

	<!-- Site favicon -->
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/dent.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
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
		


        <div class="title pb-20">
				<h2 class="h3 mb-0">l'Aperçu du cabinet</h2>
			</div>

			<div class="row pb-10">
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
							<?php

$result3 = mysqli_query($conn,"SELECT * FROM patient ");
	 $num_rows = mysqli_num_rows($result3);
{
 ?>
				<a href="calendar.php" style ="color:white">				<div class="weight-700 font-24 text-dark"> <?php echo htmlentities($num_rows);  } ?>	</div>
					
								<div class="font-14 text-secondary weight-500"> Rendez-vous</div>	</a>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-calendar1"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
							<?php

$result2 = mysqli_query($conn,"SELECT * FROM rdv ");
	$num_rows = mysqli_num_rows($result2);
{
?>
			<a href="patient.php" style ="color:white">							<div class="weight-700 font-24 text-dark"><?php echo htmlentities($num_rows);  } ?>	</div>
								<div class="font-14 text-secondary weight-500">Patient</div> </a>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#ff5b5b"><span class="icon-copy ti-user"></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">5</div>
								<div class="font-14 text-secondary weight-500">En attente</div>
							</div>
							<div class="widget-icon">
								<div class="icon"><i class="icon-copy fa fa-stethoscope" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">DH50,000</div>
								<div class="font-14 text-secondary weight-500">Revenus</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#09cc06"><i class="icon-copy fa fa-money" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>


            <div class="page-header" >
					<div class="row" >
						<div class="col-md-12 col-sm-12">
					
							<nav aria-label="breadcrumb" role="navigation"  >
								<ol class="breadcrumb" >
									<li class="breadcrumb-item active" aria-current="page">La liste d'attente</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>


		
            <div class="min-height-200px">
			<div class="row clearfix">
            <?php
	while ($et = mysqli_fetch_assoc($result1))  { 
        ?>
                    <div class="col-sm-12 col-md-4 mb-30">
                        
						<div class="card card-box text-center">


                            <a href="dossier.php?code=<?php echo ($et['pat_id']); ?>">
							<div class="card-body">
								<h5 class="card-title"><?php echo ($et['nom']); ?>      <?php echo ($et['prenom']); ?></h5>
								<p class="card-text"><?php echo ($et['heure']); ?></p>
						
							</div>
                            </a>
						</div>
                    
					</div>
                    
                    <?php } ?>

		
			</div>
			














			
		</div>
	</div>




	
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>



</body>
</html>