
<?php 

		include 'config.php';
		
		$id = $_GET['q'];
		$table_name = $_GET['table_name'];

		if($table_name == 'room_type'){
			$query = "DELETE FROM `room_type` WHERE `id` = '$id'";
			$stmt=$conn->prepare($query);
                             $stmt->execute();
                             $res=$stmt->fetchAll();
			if($res){
				header('location:manage_prices.php?q=deleted');
			}
			else{
				header('location:manage_prices.php?q=notdeleted');
			}
		}
		
		if($table_name == 'slider'){
			$query = "DELETE FROM `slider` WHERE `id` = '$id'";
			$stmt=$conn->prepare($query);
            $stmt->execute();
            $res=$stmt->fetchAll();
			if($res){
				header('location:manage_slider.php?q=deleted');
			}
			else{
				header('location:manage_slider.php?q=notdeleted');
			}
		}

		if($table_name == 'manage_contacts'){
			$query = "DELETE FROM `manage_contacts` WHERE `id` = '$id'";
			$stmt=$conn->prepare($query);
            $stmt->execute();
            $res=$stmt->fetchAll();
			if($res){
				header('location:manage_contact.php?q=notdeleted');
			}
			else{
				header('location:manage_contact.php?q=deleted');
			}
		}
		
		// mysql_close($con);
 ?>