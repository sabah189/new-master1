<?php

include('conn.php');
$code = $_GET['code']; 
$req1 = "SELECT * from patient  WHERE pat_id=$code  ";
$rs1 = mysqli_query($conn,$req1) ;
$row1 = mysqli_fetch_assoc($rs1);



$sql_all    ="SELECT * FROM categorie_med  ORDER BY id_cat ";
$result_all = mysqli_query($conn,$sql_all);

$req2    ="SELECT * FROM rdv  ";
$rs2= mysqli_query($conn,$req2);
$row2 = mysqli_fetch_assoc($rs2);


	
if (isset($_POST['ajouter'])) {
    $pat = $_POST['pat'];
    $date=$_POST['date'];
    $type = $_POST['type'];
    $motif = $_POST['motif'];
    $acte = $_POST['acte'];
    $tarif=$_POST['tarif'];


// $id=$_GET['code'];
    $req3="INSERT INTO consultation ( date_cons, motif,type,tarif,pat_id,id_acte) values ('$date','$motif','$type', '$tarif','$pat','$acte');";  
    $row3 =mysqli_query($conn,$req3);

    header('location:dossier.php?code='.$code.'');

   
  }


   
  $code = $_GET['code'];    
  $req5 = "SELECT * from certificat  WHERE pat_id=$code";
  $rs5 = mysqli_query($conn,$req5) ;

 
  $req19="SELECT *  FROM consultation where pat_id=$code ";
$rs19 = mysqli_query($conn,$req19);
$row19 = mysqli_fetch_assoc($rs19);

  
  $req9="SELECT *  FROM consultation cons , acte act where act.id_acte=cons.id_acte and pat_id=$code ";
$rs9 = mysqli_query($conn,$req9);

  
             if (isset($_POST['ajou'])) {
              $id = $_POST['id'];
              $de = $_POST['de'];
              $a = $_POST['a'];
      
           
          
          
          // $id=$_GET['code'];
              $req6="INSERT INTO certificat (de,a,pat_id) values ('$de', '$a','$id');";  
              $row6 =mysqli_query($conn,$req6);
         
              header('location:dossier.php?code='.$code.'');
            }
             

?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Dossier</title>

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
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header" style="background-image: url('vendors/images/opticiens.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: 100% 100%;">
					<div class="row" >
						<div class="col-md-12 col-sm-12">
					
							<nav aria-label="breadcrumb" role="navigation"  >
								<ol class="breadcrumb" >
									<li class="breadcrumb-item"><a href="patient.php"><i class="icon-copy fa fa-users" aria-hidden="true"></i> &nbsp;Retour</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dossier du patient</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

                <h4>
							<?php echo ($row1['nom']); ?>						<?php echo ($row1['prenom']); ?>
							
									<i class="ace-icon fa fa-angle-double-right"></i>
									<?php echo ($row1['sexe']); ?> <?php echo ($row1['ddn']); ?>

							</h4>
                            <br>

				<div class="row clearfix">
					<div class="col-lg-12 col-md-12 col-sm-12 mb-30">
						<div class="pd-20 card-box">
							<div class="tab">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active text-blue" data-toggle="tab" href="#consul" role="tab" aria-selected="true">Consultations</a>
									</li>
									<li class="nav-item">
										<a class="nav-link text-blue" data-toggle="tab" href="#ordo" role="tab" aria-selected="false">Ordannances</a>
									</li>
									<li class="nav-item">
										<a class="nav-link text-blue" data-toggle="tab" href="#certif" role="tab" aria-selected="false">Certificat</a>
									</li>
                                    <li class="nav-item">
										<a class="nav-link text-blue" data-toggle="tab" href="#image" role="tab" aria-selected="false">Imageries</a>
									</li>
                                    <li class="nav-item">
										<a class="nav-link text-blue" data-toggle="tab" href="#pay" role="tab" aria-selected="false">Paiement</a>
									</li>
								</ul>
								<div class="tab-content">
                                    <!-------------Consultation begin-------------------->
									<div class="tab-pane fade show active" id="consul" role="tabpanel">
										<div class="pd-20">
										
                                        <div class="btn-list pb-3">
								<a href="consul.php?code=<?php echo ($row1['pat_id']); ?>"  class="btn btn-success"><i class="icon-copy fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Nouveau</a>
								
							</div>
                            <h6 style="    text-decoration: underline;text-color:blue" class="text-secondary mb-3">Historique de consultation</h6>

                            <table class="data-table table  hover nowrap" id="example">
							<thead>
								<tr>
                                                          <th>Type</th>
                                                    <th scope="col">Acte</th>
                                                    <th scope="col">Motif</th>
                                                    <th scope="col">Tarif</th>  
                                                                                                     
                                                    <th>Action</th>
								</tr>
							</thead>
							<tbody>
                            <?php  while ($row9 = mysqli_fetch_assoc($rs9))  {  ?>
                                <tr>
                                                <td>	<?php echo ($row9['type']); ?></td>
                                                    <td><?php echo ($row9['acte']); ?></td>
                                                    <td><?php echo ($row9['motif']); ?></td>
                                                    <td><?php echo ($row9['tarif_con']); ?></td>

                                                    <td > 
                                                    <!-- <a href="#"data-toggle="modal" data-target="#myModal3" > <i class="fa fa-eye"></i></a>&nbsp;&nbsp; -->
                                                    <a href="tcpdf/note.php?code=<?php echo ($row9['id_cons']); ?>&code=<?php echo ($row1['pat_id'])?>"><i class="fa fa-print"></i></a>
                                                </td>
                                
                                                </tr>
								<?php } ?>
							</tbody>
						</table>
                        <?php
	include ("modals.php")
	?>


										</div>
									</div>
                                                                        <!-------------Consultation end-------------------->
                                    <!-------------Ordonndance begin-------------------->

                                    <?php 


$req = "select * from categorie_med ";
$rs = mysqli_query($conn,$req) or die(mysqli_error());
$option = NULL;

while($row = mysqli_fetch_assoc($rs))
    {
        
      $option .= '<option value = "'.$row['id_cat'].'"> '.$row['nom_cat'].' </option>';
    }





    $req7 = "SELECT * from ordonnance where pat_id=$code";
    $rs7 = mysqli_query($conn,$req7) or die(mysqli_error());



    
  


      
    // $req17 = "SELECT * from medicament where id_cat=".$_POST['cat_id'];
    // $rs17 = mysqli_query($conn,$req17) or die(mysqli_error());
	// $row17=mysqli_fetch_array($rs17);


?>

                                    
									<div class="tab-pane fade" id="ordo" role="tabpanel">
									<div class="pd-20">
										
                                        <div class="btn-list pb-3">
								<button type="button" class="btn btn-success"data-toggle="modal" data-target="#Long" ><i class="icon-copy fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Nouveau</button>
								
							</div>
                            <h6 style="    text-decoration: underline;text-color:blue" class="text-secondary mb-3">Les ordonnances</h6>

                            <table class="data-table table  hover nowrap" id="example">
							<thead>
								<tr>
                            	<thead>
								<tr>
                        
                                                    <th>    Ordonnace</th>
                                                    <th>Date</th>    
                                                    <th>Action</th>
								</tr>
							</thead>
								</tr>
							</thead>

                            <tbody>
                            <?php  while ($row7 = mysqli_fetch_assoc($rs7))  {  ?>
                                                <tr>
                                                <td><a href="" data-toggle="modal" data-target="#myModal5" style="font-size:15px;color:black; background-color:#e0e0e0"><?php echo 'ORD'.date('ym', strtotime($row7["date_odr"])).'-'.sprintf('%04d', $row7['Id_ord']);  ?></a></td>
                                                    <td><?php echo ($row7['date_odr']); ?></td>
                                                     <td><a href="tcpdf/ordonnance.php?code=<?php echo ($row7['Id_ord']); ?>&code=<?php echo ($row1['pat_id'])?>"><i class="fa fa-print"></i></a>
                                                    </td>
                                                </tr>
                                            <?php }  ?>
							</tbody>
                            <!-- Modal -->
  <div class="modal fade" id="myModal5">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="" method="post">
                                 
                                            <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Medicament</label>
                                <input class="form-control" type="text" name="de" id="example-text-input" readonly value ="Doliprane">
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Periode</label>
                                <input class="form-control" type="text" name="de" id="example-text-input" value="7j" readonly>
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Jour</label>
                                <input class="form-control" type="text" name="de" id="example-text-input" value="3 fois" readonly>
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">prise</label>
                                <input class="form-control" type="text" name="de" id="example-text-input" value="1cc" readonly>
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Quand</label>
                                <input class="form-control" type="text" name="de" id="example-text-input" value="Avant" readonly>
                        </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                 
                    <!-- basic modal end -->

						</table>


                        <script type="text/javascript">
  function Fetchmed(id){
    $('#med').html('');
    $.ajax({
      type:'post',
	  url: 'ajaxdata.php',
      data : { cat_id : id},
      success : function(data){
         $('#med').html(data);
      }

    })
  }

  

  
</script>

  <!-- Modal -->
  <div class="modal fade" id="Long">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="" method="post">
                                            
															<label>Choisir une Categorie :</label>

															<br />
															<select name="cat" id="cat" class="form-control" onchange="Fetchmed(this.value)" > 
        <option value = "<?php while($row = mysqli_fetch_assoc($rs))
    {
        
      $option .= '<option value = "'.$row['id_cat'].'">'.$row['nom_cat'].'</option>'; }  ?>"><?php echo $option; ?></option>
    </select>
														

              
           
                                            <label for="">Medicament</label>
                                            <select name="med" id="med" class="form-control"   required>
            <option>Select Medicament</option>
          </select>
<label for="">Periode</label>
<select name="per"  class="form-control"> 
<option value=""></option>
<option value="7j">7j</option>
<option value="5j">5j</option>
<option value="3j">3j</option>
<option value="Autre">Autre</option>
     </select>
     <label for="">Nombre par jour</label><select name="nob"  class="form-control"> 
<option value=""></option>
<option value="1 fois">1 fois</option>
<option value="2 fois">2 fois</option>
<option value="3 fois">3 fois</option>
<option value="Autre">Autre</option>
     </select>
     <label for="">Prise</label><select name="pri"  class="form-control"> 
<option value=""></option>
<option value="1cc">1cc</option>
<option value="1cp">1cp</option>
<option value="1gel">1gel</option>
<option value="1cas">1cas</option>
<option value="1s">1s</option>
<option value="Autre">Autre</option>
     </select>
     <label for="">Quand</label><select name="qua"  class="form-control"> 
<option value=""></option>
<option value="Avant">Avant</option>
<option value="Pendant">Pendant</option>
<option value="Aprés">Aprés</option>
     </select>
     <label for="">Remarque</label><input type="text" name="rema"  class="form-control "/>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-primary" name="ord" value="Ajouter">
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                 
                    <!-- basic modal end -->



 












										</div>
									</div>


                                  <!-------------Ordonndance end-------------------->
                                    <!-------------Certificat begin-------------------->

									<div class="tab-pane fade" id="certif" role="tabpanel">
									<div class="pd-20">
										
                                        <div class="btn-list pb-3">
								<button type="button" class="btn btn-success"data-toggle="modal" data-target="#myModal8"><i class="icon-copy fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Nouveau</button>
								
							</div>
  
                            <h6 style="    text-decoration: underline;text-color:blue" class="text-secondary mb-3">Les certificats</h6>

                            <table class="data-table table  hover nowrap" id="example">
							<thead>
								<tr>
                                <th scope="col">Certificat N°</th>
                                                <th scope="col">Date</th>
                                                <th>Action</th>
								</tr>
							</thead>
                            <tbody>
                                        <?php  while ($et = mysqli_fetch_assoc($rs5))  {  ?>
                                            <tr>
                                            <td> <?php echo 'CERT'.date('ym', strtotime($et["de"])).'-'.sprintf('%04d', $et['id_certif']);  ?></td>
                                                <td> <?php echo ($et['de']); ?> <?php echo ($et['a']); ?></td>
                                                <td>   &nbsp;&nbsp;
                                                <a href="tcpdf/rapport.php?code=<?php echo ($et['id_certif']); ?>&code=<?php echo ($row1['pat_id'])?>" > <i class="fa fa-print"></i></a>     </td>
                                             
                                               
                                         
                                            </tr>
                                            <?php } ?>
                                        </tbody>
						</table>
   <!-- Certificat basic modal start -->


                       
                       <!-- Modal -->
                       <div class="modal fade" id="myModal8" data-backdrop="static">
                           <div class="modal-dialog">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                   </div>
                                   <div class="modal-body">
                                   <form action="" method="post">
                                   <input class="form-control" type="hidden" name="id" id="example-text-input" value="<?php echo $code; ?>">
                        
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">De:</label>
                                <input class="form-control" type="date" name="de" id="example-text-input">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">à:</label>
                                <input class="form-control" type="date" name="a" id="example-text-input">
                        </div>
                        
                        
                                   </div>
                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       <input type="submit" class="btn btn-primary" name="ajou" value="ajouter">
                                       <button type="button" class="btn btn-warning" >Imprimer</button>
                                   </div>
                                  </form>
                               </div>
                           </div>
                       </div>
                 

           <!--  CERTIFICAT basic modal end -->


										</div>
									</div>
                                                                        <!-------------Certificat END-------------------->
                                    <!-------------IMAGERIE begin-------------------->

                                    <div class="tab-pane fade" id="image" role="tabpanel">
										<div class="pd-20">
                                        <?php



if(isset($_POST["submit"]))
{
    $var1 = rand(1111,9999);  // generate random number in $var1 variable
    $var2 = rand(1111,9999);  // generate random number in $var2 variable
	
    $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
    $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

    $fnm = $_FILES["image"]["name"];    // get the image name in $fnm variable
    $dst = "all_images/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
    $dst_db = "all_images/".$var3.$fnm; // storing image path into the database with 32 characters hex number and file namespace

    $code = $_POST['id'];


    move_uploaded_file($_FILES["image"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name
	
    $check = mysqli_query($conn,"insert into images(name,image,pat_id) values('$_POST[name]','$dst_db','$code')");  // executing insert query
		
    if($check)
    {
    	echo '<script type="text/javascript"> alert("Données insérées avec succès ! "); </script>';  // alert message
    }
    else
    {
    	echo '<script type="text/javascript"> alert("Erreur lors du téléchargement des données !"); </script>';  // when error occur
    }
}
?>
                                         <!-- Custom file input start -->
                            <div class="col-12">
                                <div class="card mt-5">
                                    <div class="card-body">
                                        <h4 class="header-title pb-3">Attacher les fichiers</h4>
                                        <form method="post" enctype="multipart/form-data">
  <table>
    <tr>
          <input type="hidden" name="id" value="<?php echo $code ?>">

     <input type="text" name="name" placeholder="Nom"  class="form-control mb-3" Required>
    </tr>
    <tr>
    <div class="custom-file">
    <input type="file" name="image" class="custom-file-input" id="inputGroupFile02" Required>                                                 
       <label class="custom-file-label" for="inputGroupFile02">Choisir le fichier</label>
                                                </div>
  
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="submit" value=" Télécharger " class="input-group-text mt-3"></td>			
    </tr>
  </table>
</form>
                                    </div>

                                    <table class="table text-center">
                                    <thead class="text-uppercase bg-light">
  <tr>

    <td>Nom</td>
    <td>Images</td>
  </tr>
  </thead>
<?php

$records = mysqli_query($conn,"SELECT * FROM images WHERE pat_id=$code"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>

    <td><?php echo $data['name']; ?></td>
    <td><img src="<?php echo $data['image']; ?>" width="100" height="100"></td>
  </tr>	
<?php
}
?>

</table>
                                </div>
                            </div>
                            <!-- Custom file input end -->										</div>
									</div>
                                                                        <!-------------IMAGERIE END-------------------->
                                    <!-------------PAYMENT begin-------------------->

                                    <?php

                                    ?>
                                    <div class="tab-pane fade" id="pay" role="tabpanel">
                                    <div class="pd-20">
										
                                        <div class="btn-list pb-3">
								<a  class="btn btn-success"><i class="icon-copy fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Nouveau</a>
								
							</div>
                            <h6 style="    text-decoration: underline;text-color:blue" class="text-secondary mb-3">Historique des paiement</h6>

                            <table class="data-table table  hover nowrap" id="example">
							<thead>
								<tr>
                                                          <th>Date</th>
                                                    <th scope="col">Acte</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col">Avance </th>  
                                                    <th scope="col">Rest </th>                 
                                                    <th>Action</th>
								</tr>
							</thead>
							<tbody>
                            <!-- <-?php  while ($row9 = mysqli_fetch_assoc($rs9))  {  ?>
                                <tr>
                                                <td>	<-?php echo ($row9['type']); ?></td>
                                                    <td><-?php echo ($row9['acte']); ?></td>
                                                    <td><-?php echo ($row9['motif']); ?></td>
                                                    <td><-?php echo ($row9['tarif_con']); ?></td>

                                                    <td > <a href="#"data-toggle="modal" data-target="" > <i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                                  
                                                </td>
                                
                                                </tr>
								<-?php } ?> -->
							</tbody>
						</table>
 
                                  <!-- Modifier la consultation modal -->
                                  <div class="col-md-4 col-sm-12 mb-30">
                            
                            
                            <div class="modal fade bs-example-modal-lg" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                    
                                        <div class="row">
                                        <div class="col">
                                                <div class="form-group">

                                <input class="form-control" type="hidden" name="pat" id="example-text-input" value="<?php echo ($row1['pat_id']); ?>" >
                        </div>
    
                        <div class="form-group">
                            <label for="example-date-input" class="col-form-label">Date :</label>
                            <input class="form-control" type="date" name="date" id="example-date-input" value="<?php echo $datenow; ?>" readonly>
                        </div>
    
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Dent :</label>
                                <input class="form-control" type="text" name="motif" id="example-text-input" value="<?php echo ($row19['dent']); ?>" >
                        </div>
                        <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Surface :</label>
                        <input class="form-control" type="text" name="motif" id="example-text-input" value="<?php echo ($row19['surface']); ?>" >
             
                        </div>
                        <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Acte :</label>
                        <input class="form-control" type="text" name="motif" id="example-text-input" value="<?php echo ($row19['acte']); ?>" >
             
                        </div>
                      
                        <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Acte :</label>

                        <input class="form-control" type="text" name="motif" id="example-text-input" value="<?php echo ($row19['acte']); ?>" >
                        </div>
                                                </div>
    
                                        
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                        <input type="submit" class="btn btn-primary" name="ajouter" value="Ajouter">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        <!-- Modifier la consultation  modal end -->


										</div>
									</div>
                                                                        <!-------------PAYMENT END-------------------->

								</div>
							</div>
						</div>
					</div>
				
			
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>




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









                 