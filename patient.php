
<?php 

include('conn.php');

$req1 = "SELECT * from patient  ";
$rs1 = mysqli_query($conn,$req1) ;

 


		  

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
	<div class="col pb-5 pt-3" align="right " >
                            
                            <a href="ajoutpat.php ">    
                            <button  class="btn btn-sm btn-primary pull-right" > <i class="fa fa-user-plus"></i> &nbsp; Nouveau patient</button>
  </a>
                                                                     </div>
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
	
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">La liste des patients</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table  hover nowrap" id="example">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Patient</th>
									<th>Cin</th>
									<th>Sexe</th>
									<th>Date de naissance</th>
									<th>Type de mutuelle</th>
									<th>Telephone</th>
									<th>Adresse</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
							<?php  while ($et = mysqli_fetch_assoc($rs1))  {  ?>
								<tr>
									<td class="table-plus">		<b>			<a href="dossier.php?code=<?php echo ($et['pat_id']); ?>" style="font-size:15px;color:black; background-color:#e0e0e0">   <?php echo ($et['nom']); ?>            <?php echo ($et['prenom']); ?></a></b></td>
									<td><?php echo ($et['cin']); ?></td>
									<td><?php echo ($et['sexe']); ?></td>
									<td><?php echo ($et['ddn']); ?> </td>
									<td><?php echo ($et['mutuelle']); ?></td>
									<td> <?php echo ($et['telephone']); ?></td>
									<td><?php echo ($et['adresse']); ?></td>
									<td>
							
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
												<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Editer</a>
												<a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Supprimer</a>
											</div>
										</div>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
		
			</div>
			
		</div>
	</div>



	
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="vendors/scripts/datatable-setting.js"></script>






</body>
</html>