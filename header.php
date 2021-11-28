 
	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
		
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				
			</div>
		
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="vendors/images/avatar3.png" alt="">
						</span>
						<span class="user-name">Bienvenue</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
				
						<a class="dropdown-item" href="logout.php"><i class="dw dw-logout"></i> Déconnexion</a>
					</div>
				</div>
			</div>
	
		</div>
	</div> 




	
	<!-- <div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
		
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				
			</div>
		
			<div class="user-info-dropdown">

			< ?php
                                        $query2 = "SELECT * FROM user where user_id>1 ORDER by user_name ASC "; 
                                        $result2 = mysqli_query($conn, $query2);  
                                        if(mysqli_num_rows($result2) > 0)  
                                        {  
                                             while($row = mysqli_fetch_array($result2))  
                                             { 
                                              $iduserthis = $row['user_id'];
                                              ?>
				<div class="dropdown">


					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
						< ?php 
if ($row['sexe'] == 'Homme'){
?>
<img  class="editable img-responsive" src="vendors/images/avatar3.png" />
< ?php
}else{
?>
<img  class="editable img-responsive" src="vendors/images/logo2.png" />
< ?php
}
?>
						</span>
						< ?php
                          }
                        }
                        ?>
						<span class="user-name">Bienvenue</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
					<a class="dropdown-item" href="user.php"><i class="dw dw-user"></i> Utilisateur</a>
						<a class="dropdown-item" href="logout.php"><i class="dw dw-logout"></i> Déconnexion</a>
					</div>
				</div>
			</div>
	
		</div>
	</div> -->