
<?php 

include('conn.php');
// include('session.php');



$code = $_GET['code'];    
$req2 = "SELECT * FROM medicament WHERE id_cat=$code  ";
$rs9 = mysqli_query($conn,$req2) ;
$row3=mysqli_fetch_array($rs9);
    


	if(isset($_GET['delete_id']))
	{

  
$req3     = "SELECT id_cat FROM categorie_med ";
$rs5      = mysqli_query($conn,$req3) ;
$row_info = mysqli_fetch_assoc($rs5);
// $id = $row_info['id_cat'];

	 $sql_query1="DELETE FROM medicament WHERE id_med=".$_GET['delete_id'];
	 mysqli_query($conn,$sql_query1) ;
	 header('location:medicine.php?code='.$row_info['id_cat'].'');


	}

	
	if (isset($_POST['ajouter'])) {
		$med = $_POST['med'];
		$obs = $_POST['obs'];
		$dos = $_POST['dos'];
		$id_cat=$_POST['id'];
	
	
	// $id=$_GET['code'];
		$req="INSERT INTO medicament (nom_med, dosage,observation,id_cat) values ('$med','$dos', '$obs','$id_cat');";  
		$row4 =mysqli_query($conn,$req);
	
		header('location:medicine.php?code='.$code.'');
	   
	  }


	  $code = $_GET['code'];    
$req = "SELECT * from categorie_med where id_cat=$code  ";
$rs4 = mysqli_query($conn,$req) ;
$row4=mysqli_fetch_array($rs4);



if(isset($_POST['modifier']))
{

$id=$_GET['code'];
$cat=$_POST['cat'];
$update= "UPDATE categorie_med set nom_cat='$cat' WHERE id_cat='$id' ";
$result=mysqli_query($conn,$update);
header('location:medicine.php?code='.$id.'');
}





?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Médicaments</title>

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
			<div class="min-height-200px">
				<div class="page-header" style="background-image: url('vendors/images/opticiens.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: 100% 100%;">
					<div class="row">
					<div class="col-md-6 col-sm-12">
							<div class="title">
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									
									<li class="breadcrumb-item"><a href="category.php">  &nbsp;Retour</a></li>
									<li class="breadcrumb-item active" aria-current="page">Médicaments</li>
								</ol>
								
							</nav>
							
						</div>
						
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								
							
							</div>
							
						</div>
						
					</div>
					
				</div>
	<div class="col pb-5 pt-3" align="left " >
                            
             
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-user-plus"></i>&nbsp; Nouveau Medicament</button>
	<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal1"><i class="fa fa-user-plus"></i>&nbsp; Modifier catégorie</button>
	<button type="button" class="btn btn-danger"><i class="fa fa-user-plus"></i>&nbsp; Supprimer catégorie</button>
                     
     </div>

	 <!----------------AJOUTER medicamanet Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form action="" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un medicament :</h5>
      </div>
      
      <div class="modal-body">
    

      <input type="hidden" name="id" value="<?php echo $code ?>">
  
   <label for="">Medicaments : </label> 
    <input type="text" name="med"  class="form-control" ><br>
    <label for="">Dosage : </label> 
    <input type="text" name="dos"  class="form-control" ><br>

    <label for="">Observation : </label> 
    <input type="text" name="obs"  class="form-control" ><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <input  type="submit" class="btn btn-info " name="ajouter"  value="Ajouter">
      </div>
    
  </div>
</div>
</form>

</div>


<!------------ Fin Modal ---------->
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
	
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">La liste des médicaments : </h4>
					</div>
					<div class="pb-20">
						<table class="data-table table  hover nowrap" id="example">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Médicament</th>
									<th>Observation</th>
									<th>Dosage</th>
									<th>Action</th>
									
									
								</tr>
							</thead>
							<tbody>
							<?php  while ($et = mysqli_fetch_assoc($rs9))  {  ?>
								<tr>
									<td><?php echo ($et['nom_med']); ?></td>
									<td><?php echo ($et['observation']); ?></td>
									<td><?php echo ($et['dosage']); ?> </td>
									
									<td>
							
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="#"><i class="dw dw-eye"></i> Voir</a>
												<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Modifier</a>
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

				                   <!---------------MODIFIER--- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form action="" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier la  categorie :</h5>
      </div>
      
      <div class="modal-body">


      <input type="hidden" name="id">
  
    
    <p> Le nom de categorie : </p>
    <input type="text" name="cat"  class="form-control" value="<?php echo ($row4['nom_cat']); ?>">


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <input  type="submit" class="btn btn-info " name="modifier"  value="Modifier">
      </div>
   
  </div>
</div>
</form>

</div>
         

<!------------ Fin Modal ---------->
		
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