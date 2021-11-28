<?php 

include('conn.php');
// include('session.php');



$req = "SELECT * from categorie_med ";
$rs4 = mysqli_query($conn,$req) ;
$row6=mysqli_fetch_array($rs4);



if (isset($_POST['ajouter'])) {

	$cat  = $_POST['cat'];
	$req  ="INSERT INTO categorie_med(nom_cat) values ('$cat');";  
  $row3 =mysqli_query($conn,$req);

	header('location:category.php');
   
  }
 
  $sql_all    ="SELECT * FROM categorie_med  ORDER BY id_cat ";
  $result_all = mysqli_query($conn,$sql_all);

//   $code = $_GET['code'];    
// $req2 = "SELECT * FROM medicament WHERE id_cat=$code  ";
// $rs9 = mysqli_query($conn,$req2) ;
// $row5=mysqli_fetch_array($rs9);
		  

?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Catégories</title>

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
			
				<div class="col pb-5 pt-3" align="right " >
                            
                            <a >    
					            <button data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-danger pull-right" > <i class="fa fa-medkit"></i> &nbsp;          Ajouter une categorie</button>
                             </a>
                </div>
				<br>
				<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form action="" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une categorie :</h5>
      </div>
      
      <div class="modal-body">


      <input type="hidden" name="id">
  
    
    <p> Le nom de categorie : </p>
    <input type="text" name="cat"  class="form-control" >


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
			</div>
			<div class="row">
                    <!-- seo fact area start -->
                   
                            


   <div style="padding-left: 8% ">
        <div class="row">
		<div class="space"></div>
		<?php  while ($et = mysqli_fetch_assoc($result_all))  {  ?>

        <div class="col-xs-12 col-sm-5" style="margin-right:38px">

	
  <a href="medicine.php?code=<?php echo ($et['id_cat']); ?>" >  <input style="width:100% ; height:90px ;  border-radius:20px, " class="btn btn-info btn-app"    value="<?php echo ($et['nom_cat']); ?>" readonly /></a> 
  <hr class="my-3">

  </div>
  <?php } ?>
</div></div>







                        
                 
                    </div>   </div>
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