<?php

	if(isset($_POST['login'])){
	    include 'config.php';
		$email = $_POST['email'];
		$password = $_POST['password'];

		$login = "SELECT * FROM `admin` WHERE `email` = '$email'";
		$stmt=$conn->prepare($login);
  $stmt->execute([$email,$password]);
  $row = $stmt->fetch();
		
		if($row){
			
			if($password == $row['password']){
				// $admin_name = $row['name'];
				session_start();
				$_SESSION['admin'] = $email;
				header('location:manage_slider.php');
			}
			else{
				header('location:login.php?q=1');
			}
		}else{
			header('location:login.php?q=2');
		}
		// header('location:manage_slider.php');

		mysqli_close($con);
	}
	/*
	*
	* OPERATIONS FOR SLIDER.
	*
	*/
	//Add Guest 
	if(isset($_POST['add_slider'])){
		include 'config.php';
		$title = $_POST['title'];
		$image = $_FILES["image"]["name"];
		$title2 = $_POST['description'];
		
		//UPLOAD IMAGE
		$target_dir = "../img/slider/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["image"]["tmp_name"]);
		    if($check !== false) {
		       // echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        //echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    //echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		// if ($_FILES["image"]["size"] > 500000) {
		//     echo "Sorry, your file is too large.";
		//     $uploadOk = 0;
		// }
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}

		$query = "INSERT INTO `slider`(  `title`,`description`, `image`) VALUES ('$title','$title2','$image')";
		 $stmt=$conn->prepare($query);
				 $res=$stmt->execute();
		if($res){
			header('location:manage_slider.php?q=1');
		}else{
			header('location:manage_slider.php?q=2');
		}
	}


	//UPDATE
	if($_POST['update'] == 'update_slider') {
				include 'config.php';

				if(isset($_POST['id']))
				{
					$id = $_POST['id'];
					$query = "SELECT * FROM `slider` WHERE `slider_id` = $id";
					 $stmt=$conn->prepare($query);
			         $stmt->execute();
			         $row=$stmt->fetch();
	                 $conn=null;
					
					echo json_encode($row);
				}
				
		}

	// UPDATE SLIDER code...
		if(isset($_POST['update_slidername'])){
			include 'config.php';
		$title = $_POST['title'];
		$slider_id = $_POST['id'];
		$description=$_POST['description'];
		$image= $_FILES["image"]["name"];
		
		if ($image == "") {
			 $query = "UPDATE `slider` SET `title`='$title',`description`='$description' WHERE `slider_id` ='$slider_id'";
	
				 $stmt=$conn->prepare($query);
				 $res=$stmt->execute();

				if($res){
					header('location:manage_slider.php?q=update');
						}
				else{
					header('location:manage_slider.php?q=3');
				}
		}else{
			$target_dir = "../img/slider/";
			$target_file = $target_dir . basename($_FILES["image"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["image"]["tmp_name"]);
			    if($check !== false) {
			       // echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        //echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    //echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			// if ($_FILES["image"]["size"] > 500000) {
			//     echo "Sorry, your file is too large.";
			//     $uploadOk = 0;
			// }
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}

			$query = "UPDATE `slider` SET `title`='$title',`description`='$description',`image`='$image' WHERE `slider_id` ='$slider_id'";
	
				 $stmt=$conn->prepare($query);
				 $res=$stmt->execute();

				if($res){
					header('location:manage_slider.php?q=update');
						}
				else{
					header('location:manage_slider.php?q=3');
				}
		}
		
	}

//Code for adding prices

	if(isset($_POST['add_offer'])){
		include 'config.php';
		$name = $_POST['name'];
		$room_rate = $_POST['room_rate'];
		$description= $_POST['description'];
		$weekend_rate= $_POST['weekend_rate'];

		$query = "INSERT INTO `room_type`(  `name`,`description`, `room_rate`,`weekend_rate`) VALUES ('$name', '$description','$room_rate','$weekend_rate')";
		// $res = mysqli_query($con, $query);
		 $stmt=$conn->prepare($query);
				 $res=$stmt->execute();
		if($res){
			header('location:manage_prices.php?q=1');
		}else{
			header('location:manage_prices.php?q=2');
		}
}
if(isset($_POST['update'])){
		if ($_POST['update'] == 'update_offer') {
				include 'config.php';
// echo $_POST['id'];
				if(isset($_POST['id']))
				{
					$id = $_POST['id'];
					$query = "SELECT * FROM `room_type` WHERE `id` = $id";
					$stmt=$conn->prepare($query);
			         $stmt->execute();
			         $row=$stmt->fetch();
	                 $conn=null;
					
					echo json_encode($row);
				}
				
		}
	}

	if(isset($_POST['update_offername'])){
			include 'config.php';
		
		$name = $_POST['name'];
		$description=$_POST['description'];
		$offer_id = $_POST['id'];
		$room_rate =$_POST['room_rate'];
		$weekend_rate =$_POST['weekend_rate'];
		
		$query1 = "UPDATE `room_type` SET `name` = '$name',`description` = '$description',`room_rate` = '$room_rate', `weekend_rate` = '$weekend_rate' WHERE `id` = '$offer_id'";
	
				 $stmt=$conn->prepare($query1);
				 $res=$stmt->execute();
				if($res){
					// echo "myid".$offer_id;
					header('location:manage_prices.php?q=update');
						}
				else{
					header('location:manage_prices.php?q=3');
				}
		
		}
?>