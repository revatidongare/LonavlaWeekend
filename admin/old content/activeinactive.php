<?php 
	
	include 'config.php';
		$id = $_GET['q'];
		$table_name = $_GET['table_name'];
		$status = $_GET['status'];

		if($table_name == 'photo_categories'){
			if($status == 'active'){
				$query = "UPDATE `photo_categories` SET `flag`= 0 WHERE `id` = '$id'";
				$res = mysqli_query($con, $query);
				if($res){
					header('location:managephotocategories.php?q=statuschanged');
				}
				else{
					header('location:managephotocategories.php?q=statusnotchanged');
				} 
			}
			if($status == 'inactive'){
				$query = "UPDATE `photo_categories` SET `flag`= 1 WHERE `id` = '$id'";
				$res = mysqli_query($con, $query);
				if($res){
					header('location:managephotocategories.php?q=statuschanged');
				}
				else{
					header('location:managephotocategories.php?q=statusnotchanged');
				}
			}
		}
		if($table_name == 'event_categories'){
			if($status == 'active'){
				$query = "UPDATE `event_categories` SET `flag`= 0 WHERE `id` = '$id'";
				$res = mysqli_query($con, $query);
				if($res){
					header('location:manageeventcategories.php?q=statuschanged');
				}
				else{
					header('location:manageeventcategories.php?q=statusnotchanged');
				} 
			}
			if($status == 'inactive'){
				$query = "UPDATE `event_categories` SET `flag`= 1 WHERE `id` = '$id'";
				$res = mysqli_query($con, $query);
				if($res){
					header('location:manageeventcategories.php?q=statuschanged');
				}
				else{
					header('location:manageeventcategories.php?q=statusnotchanged');
				}
			}
		}
		if($table_name == 'video_categories'){
			if($status == 'active'){
				$query = "UPDATE `video_categories` SET `flag`= 0 WHERE `id` = '$id'";
				$res = mysqli_query($con, $query);
				if($res){
					header('location:managevideocategories.php?q=statuschanged');
				}
				else{
					header('location:managevideocategories.php?q=statusnotchanged');
				}
			}
			if($status == 'inactive'){
				$query = "UPDATE `video_categories` SET `flag`= 1 WHERE `id` = '$id'";
				$res = mysqli_query($con, $query);
				if($res){
					header('location:managevideocategories.php?q=statuschanged');
				}
				else{
					header('location:managevideocategories.php?q=statusnotchanged');
				}
			}
		}
	
 ?>