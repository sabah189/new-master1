<?php 

include('conn.php');




		  

?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title> Dashboard</title>

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
	<link rel="stylesheet" type="text/css" href="design.css">

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
		<div class="xs-pd-20-10 pd-ltr-20">

			<div class="title pb-20">
				<h2 class="h3 mb-0">l'Aperçu du cabinet</h2>
			</div>

			<div class="row pb-10">
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
							<?php

$result = mysqli_query($conn,"SELECT * FROM patient ");
	 $num_rows = mysqli_num_rows($result);
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

$result = mysqli_query($conn,"SELECT * FROM rdv ");
	$num_rows = mysqli_num_rows($result);
{
?>
							<a href="patient.php" style ="color:white">		<div class="weight-700 font-24 text-dark"><?php echo htmlentities($num_rows);  } ?>	</div>
								<div class="font-14 text-secondary weight-500">Patient</div></a>
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

			<div class="row pb-10">
		

				<div class="col-md-6 mb-20">
					<div class="card-box min-height-200px pd-20 mb-20" data-bgcolor="#ffff">
					<h5 class="header-title mb-3">les rendez vous d'aujourd'hui :</h4>
			


					<table class="data-table table  hover nowrap" id="example">
							<thead>
								<tr>
                                <th>Patient</th>
                <th>Heure</th>
                <th>Type</th>
                <th>Etat</th>
								</tr>
							</thead>
							<tbody>
							<?php  
			$query  = "SELECT rdv.id_rdv,rdv.type as type,rdv.heure as heure,pat.nom as nom,pat.prenom as prenom,statut FROM patient pat,rdv rdv 
					   WHERE rdv.pat_id=pat.pat_id AND DATE(`date`) = CURDATE() and statut=0 " ;

						$result =  mysqli_query($conn,$query);

						while ($et = mysqli_fetch_assoc($result))  { 
							 ?>
                                <tr>
								<td><?php echo ($et['nom']); ?>      <?php echo ($et['prenom']); ?></td>
                <td><?php echo ($et['heure']); ?></td>
                <td><?php echo ($et['type']); ?></td>

				<td>
              <?php 
	  
	  if ($et ['statut'] == 1) {
		  echo '<p> <a style="font-size:15px;color:black; background-color:#e0e0e0" href="statut.php?id_rdv= '.$et[ 'id_rdv' ] . '& statut=0 " > En attente</a></p>';
	  }
	  else{
		  echo '<p> <a style="font-size:15px;color:black; background-color:#e0e0e0" href="statut.php?id_rdv= '.$et[ 'id_rdv' ] . '& statut=1 " class=" label label-warning"> En cours</a></p>';
		  
	  }
			
	  
	  
?>
</td>                
                                                </tr>
								<?php } ?>
							</tbody>
						</table>





					
						
					</div>

				
				</div>


				<div class="col-md-6 mb-20">
					<div class="card-box min-height-200px pd-20 mb-20" data-bgcolor="#ffff">
					<h5 class="header-title mb-3">En attente :</h4>
			
					<table class="data-table table  hover nowrap" id="example">
							<thead>
								<tr>
                <th>Patient</th>
                <th>Heure</th>
                <th>Type</th>
                <th>Etat</th>
								</tr>
							</thead>
							<tbody>
        <?php  
			$query  = "SELECT rdv.id_rdv,rdv.type as type,rdv.heure as heure,pat.nom as nom,pat.prenom as prenom,statut FROM patient pat,rdv rdv 
					   WHERE rdv.pat_id=pat.pat_id AND DATE(`date`) = CURDATE() and statut=1 " ;

						$result =  mysqli_query($conn,$query);

						while ($et = mysqli_fetch_assoc($result))  { 
							 ?>
        
    
            <tr>
                <td><?php echo ($et['nom']); ?>      <?php echo ($et['prenom']); ?></td>
                <td><?php echo ($et['heure']); ?></td>
                <td><?php echo ($et['type']); ?></td>
               
              <td>
              <?php 
	  
	  if ($et ['statut'] == 1) {
		  echo '<p>  En attente</p>';
	  }
	  else{
		  echo '<p> <a href="statut.php?id_rdv= '.$et[ 'id_rdv' ] . '& statut=1 " class=" label label-warning"> En cours</a></p>';
		  
	  }
			
	  
	  
?>
</td>
            </tr>
   
         
            <?php } ?>
                </tbody>
						</table>


	




					
						
					</div>

				
				</div>



				<div class="col-md-12 mb-20">
					<div class="card-box height-100-p pd-20">
						<div class="d-flex flex-wrap justify-content-between align-items-center pb-0 pb-md-3">
							<div class="h5 mb-md-0">les activities du cabinet</div>
							<div class="form-group mb-md-0">
								<select class="form-control form-control-sm selectpicker">
									<option value="">La semaine derniere</option>
									<option value="">Le mois dernier </option>
									<option value="">6 derniers mois </option>
									<option value="">1 dernière année </option>
								</select>
							</div>
						</div>
						<div id="activities-chart"></div>
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
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="vendors/scripts/dashboard3.js"></script>
</body>
</html>