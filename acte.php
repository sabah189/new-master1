

<?php 

include('conn.php');

$req1 = "SELECT * from acte  ";
$rs1 = mysqli_query($conn,$req1) ;


if (isset($_POST['submit'])) {

    $acte = $_POST['acte'];
    $tarif=$_POST['tarif'];


// $id=$_GET['code'];
    $req2="INSERT INTO acte (acte,tarif) values ('$acte','$tarif');";  
    $row2 =mysqli_query($conn,$req2);


    header('location:acte.php');
   
  }

  if(isset($_GET['delete_id']))
  {
   $sql_query1="DELETE FROM acte WHERE id_acte=".$_GET['delete_id'];
   mysqli_query($conn,$sql_query1) ;
   header("Location: acte.php");
  }



  $req3 = "SELECT * from acte  ";
  $rs3 = mysqli_query($conn,$req3) ;
  $row3=mysqli_fetch_array($rs3);
  
  if(isset($_POST['modifier']))
  {


$acte=$_POST['acte'];
$tarif=$_POST['tarif'];


$update= "UPDATE acte set acte='$acte', tarif='$tarif'  ";
$result=mysqli_query($conn,$update);





header("location:acte.php");
  }
		  

?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Actes</title>

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
    <style>
  .dataTable > thead > tr > th[class*="sort"]:before,
    .dataTable > thead > tr > th[class*="sort"]:after {
        content: "" !important;
    }

    </style>
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
                            
                     
                            <button  class="btn btn-sm btn-primary pull-right"  data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-user-plus"></i> &nbsp; Nouveau acte</button>
 
                                                                     </div>
																	 
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
	
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">La liste des actes</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table  hover nowrap" id="example">
							<thead>
								<tr>
                                <th>Actes</th>
                <th>Tarif</th>
                <th>Action</th>
								</tr>
							</thead>
							<tbody>
                            <?php  while ($et = mysqli_fetch_assoc($rs1))  {  ?>
								<tr>
                                <td>         <?php echo ($et['acte']); ?></td>
                <td>		  <?php echo ($et['tarif']." Dhs"); ?></td>
                <td>   &nbsp;&nbsp;&nbsp;&nbsp;    <a href="javascript:delete_id(<?php echo $et['id_acte']; ?>)" class=" fa fa-trash"  ></a>&nbsp;&nbsp;&nbsp;
                <a href="#"data-toggle="modal" data-target="#mymodal" > <i class="fa fa-pencil"></i></a></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
		
			</div>
			                <!-- basic modal start -->

							<div class="card-body">
                       
                       <!-- Modal -->
                       <div class="modal fade" id="exampleModalLong" data-backdrop="static">
                           <div class="modal-dialog">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                   </div>
                                   <div class="modal-body">
                                   <form method="post" enctype="multipart/form-data">
                                   <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Acte:</label>
                                <input class="form-control" type="text" name="acte" id="example-text-input" >
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Tarif:</label>
                                <input class="form-control" type="text" name="tarif" id="example-text-input">
                        </div>
                  
                       
                        
                        
                                   </div>
                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input type="submit" name="submit" class="btn btn-primary" value="Ajouter" >
                                   </div>
                            </form>
                               </div>
                           </div>
                       </div>
                 
         

           </div>
           <!-- basic modal end -->
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



    
    <script type="text/javascript">
function delete_id(id)
{
 if(confirm('Voulez vous vraiment supprimer ce acte ?'))
 {
  window.location.href='acte.php?delete_id='+id;
 }
}

</script>


</body>
</html>