<?php 

include('conn.php');


$req2="SELECT nom, prenom , date  ,heure,type, statut  , id_rdv FROM  rdv , patient pat where pat.pat_id=rdv.pat_id ";
$rs6 = mysqli_query($conn,$req2);

$req = "select * from patient";
$rs = mysqli_query($conn,$req) or die(mysqli_error());
$option = NULL;

while($row = mysqli_fetch_assoc($rs))
    {
      $option .= '<option value = "'.$row['pat_id'].'">'.$row['nom'].' '.$row['prenom'].' '.$row['ddn'].'</option>';
    }

    if (isset($_POST['ajouter'])) {
      $patient = $_POST['patient'];
      $date =  date("Y-m-d");
      $heure = date("H:m:s");
      $type = $_POST['type'];
	  $statut=0;
  
      
      $req="INSERT INTO rdv(date,heure,type,statut,pat_id ) values ('$date','$heure','$type','$statut','$patient');";  //requete SQL insertion 
      mysqli_query($conn,$req);

      header('location:calendar.php');
     
    }

	?>

	
   

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Rendez-vous</title>
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
                            
	<a data-toggle="modal" data-target="#myModal"  >    
                            <button  class="btn btn-sm btn-primary pull-right" > <i class="fa fa-user-plus"></i> &nbsp; Nouveau Rendez-vous</button>
  </a>
                                                                     </div>
																	<!----------- Modal --------------->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form action="" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un rendez-vous :</h5>
      </div>
      
      <div class="modal-body">
      <form method="post" action="">

      <input type="hidden" name="id">
    <p>Patient:</p>
    <select name="patient" class="form-control"> 
        <option value = "<?php while($row = mysqli_fetch_assoc($rs))
    {
      $option .= '<option value = "'.$row['pat_id'].'">'.$row['pat_nom'].'+'.$row['pat_prenom'].'+'.$row['pat_ddn'].'</option>';
    }  ?>"><?php echo $option; ?></option>
    </select>
    <br>
    <p>date de rendez vous :</p>
<input class="form-control date-picker" placeholder="Select Date" type="text" name="date">
    <br>
    <p>heure du rendez vous:</p>
	<input class="form-control time-picker-default" placeholder="time" type="text" name="time">
        <br>
    <p>type : </p>
    <select class="form-control" name="type">
                                                <option>--</option>
                                                <option value="consultation">Consultation</option>
                                                <option value="controle">Controle</option>
                                            
                                            </select>



	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input  type="submit" class="btn btn-info " name="ajouter"  value="ajouter">
      </div>
    </form>
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
						<h4 class="text-blue h4">La liste des rendez-vous</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table  hover nowrap" id="example">
							<thead>
								<tr>
								<th>Patient</th>
                <th>Date de RDV</th>
                <th>Heure de RDV</th>
                <th>Type</th
								</tr>
							</thead>
							<tbody>
							<?php  while ($et = mysqli_fetch_assoc($rs6))  {  ?>
								<tr>
                <td>															<b>		 <?php echo ($et['nom']); ?>            <?php echo ($et['prenom']); ?></a></b>	
</td>
                <td>			<?php echo ($et['date']); ?></td>
                <td><?php echo ($et['heure']); ?></td>
                <td><?php echo ($et['type']); ?></td>
           
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