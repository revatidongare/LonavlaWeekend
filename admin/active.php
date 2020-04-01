<?php 
	
	include 'config.php';
		$id = $_GET['q'];
		$table_name = $_GET['table_name'];
		$status = $_GET['status'];

		if($table_name == 'manage_contacts'){

			if($status == 'active'){
				echo $id;
				$query = "UPDATE `manage_contacts` SET `mark_as_read` = 1 WHERE `id` = '$id'";
			 	$stmt=$conn->prepare($query);
				 $res=$stmt->execute();
				if($res){
					header('location:manage_contact.php?q=statuschanged');
				}
				else{
					header('location:manage_contact.php?q=statusnotchanged');
				} 
			}
			
		}
					


 ?>