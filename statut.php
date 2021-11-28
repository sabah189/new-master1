<?php

include('conn.php');


$id       =$_GET ['id_rdv'];
//$statut   =$_GET ['statut'];


$q="UPDATE rdv set statut =1 where id_rdv =$id";
mysqli_query($conn,$q);

header('location:home.php');



?>