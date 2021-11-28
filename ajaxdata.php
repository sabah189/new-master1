<?php 
include_once 'conn.php';









if (isset($_POST['cat_id'])) {
	$query = "SELECT * FROM medicament where id_cat=".$_POST['cat_id'];
	$result = mysqli_query($conn,$query) ;
	if ($result->num_rows > 0 ) {
			echo '<option value="">selectionner medicament</option>';
		 while ($row = $result->fetch_assoc()) {
			 echo '<option value='.$row['id_med'].'>'.$row['nom_med'].'</option>';
		 }
	}else{

		echo '<option>medicament non trouvé!</option>';
	}

}


?>