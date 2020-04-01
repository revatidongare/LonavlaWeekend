<?php

	if(isset($_POST['login'])){
	    $con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$email = $_POST['email'];
		$password = $_POST['password'];

		$login = "SELECT * FROM `admin` WHERE `username` = '$email'";
		$res_login = mysqli_query($con,$login);
		$count = mysqli_num_rows($res_login);

		if($count > 0){
			$row = mysqli_fetch_array($res_login);
			if($password == $row['password']){
				$admin_name = $row['name'];
				session_start();
				$_SESSION['admin'] = $admin_name;
				header('location:managesubject.php');
			}
			else{
				header('location:login.php?q=1');
			}
		}else{
			header('location:login.php?q=2');
		}
		header('location:managesubject.php');

		mysqli_close($con);
	}
	/*
	*
	* OPERATIONS FOR SLIDER.
	*
	*/
	//Add Guest 
	if(isset($_POST['add_slider']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$title = $_POST['title'];
		$image = $_FILES["image"]["name"];
		$title2 = $_POST['title2'];
		
		//UPLOAD IMAGE
		$target_dir = "docs/slider/";
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

		$query = "INSERT INTO `slider`(  `title`,`title2`, `image`) VALUES ('$title','$title2','$image')";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:manageslider.php?q=1');
		}else{
			header('location:manageslider.php?q=2');
		}
	}
	//UPDATE
	if(isset($_POST['update'])){
		if($_POST['update'] == 'slider'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `slider` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
	if(isset($_POST['update_slider'])){
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$title = $_POST['title'];
		$title2 = $_POST['title2'];
		$image = $_FILES["image"]["name"];
		$id = $_POST['record_id'];
		//UPLOAD IMAGE
		if($image == ""){
			$query = "UPDATE `slider` SET `title`='$title',`title2`='$title2' WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:manageslider.php?q=updated');
			}else{
				header('location:manageslider.php?q=notupdated');
			}
		}
		else{
			$target_dir = "docs/slider/";
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

			$query = "UPDATE `slider` SET `title`='$title',`title2`='$title2',`image`='$image' WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:manageslider.php?q=updated');
			}else{
				header('location:manageslider.php?q=notupdated');
			}
		}
		
	}
	/*
	*
	* OPERATIONS FOR NEWS.
	*
	*/
	//Add Guest
	if(isset($_POST['add_news']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$title = $_POST['title'];
		$description = $_POST['description'];
		$image = $_FILES["image"]["name"];
		$date = $_POST['date'];
		//UPLOAD IMAGE
		$target_dir = "docs/news/";
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

		$query = "INSERT INTO `news`( `title`, `description`, `image`, `date`) VALUES ('$title','$description','$image','$date')";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:managenews.php?q=1');
		}else{
			header('location:managenews.php?q=2');
		}
	}
	//UPDATE
	if(isset($_POST['update'])){
		if($_POST['update'] == 'news'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `news` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
	if(isset($_POST['update_news'])){
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$title = $_POST['title'];
		$description = $_POST['description'];
		$image = $_FILES["image"]["name"];
		$date = $_POST['date'];
		$id = $_POST['record_id'];
		//UPLOAD IMAGE
		if($image == ""){
			$query = "UPDATE `news` SET `title`='$title',`description`='$description',`date`='$date' WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:managenews.php?q=updated');
			}else{
				header('location:managenews.php?q=notupdated');
			}
		}
		else{
			$target_dir = "docs/news/";
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

			$query = "UPDATE `news` SET `title`='$title',`description`='$description',`image` = '$image',`date`='$date' WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:managenews.php?q=updated');
			}else{
				header('location:managenews.php?q=notupdated');
			}
		}
		
	}
	/*
	*
	* OPERATIONS FOR EVENTS.
	*
	*/
	//Add Guest
	if(isset($_POST['add_event']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$title = $_POST['title'];
		$description = $_POST['description'];
		$image = $_FILES["image"]["name"];
		$date = $_POST['date'];
		//UPLOAD IMAGE
		$target_dir = "docs/events/";
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

		$query = "INSERT INTO `events`( `title`, `description`, `image`, `date`) VALUES ('$title','$description','$image','$date')";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:manageevents.php?q=1');
		}else{
			header('location:manageevents.php?q=2');
		}
	}
	//UPDATE
	if(isset($_POST['update'])){
		if($_POST['update'] == 'events'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `events` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
	if(isset($_POST['update_event'])){
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$title = $_POST['title'];
		$description = $_POST['description'];
		$image = $_FILES["image"]["name"];
		$date = $_POST['date'];
		$id = $_POST['record_id'];
		//UPLOAD IMAGE
		if($image == ""){
			$query = "UPDATE `events` SET `title`='$title',`description`='$description',`date`='$date' WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:manageevents.php?q=updated');
			}else{
				header('location:manageevents.php?q=notupdated');
			}
		}
		else{
			$target_dir = "docs/events/";
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

			$query = "UPDATE `events` SET `title`='$title',`description`='$description',`image` = '$image',`date`='$date' WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:manageevents.php?q=updated');
			}else{
				header('location:manageevents.php?q=notupdated');
			}
		}
		
	}
	/*
	*
	* OPERATIONS FOR ANNOUNCEMENTS.
	*
	*/
	//Add Guest
	if(isset($_POST['add_announcements']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$title = $_POST['title'];
		$description = $_POST['description'];
		$image = $_FILES["image"]["name"];
		$date = $_POST['date'];
		//UPLOAD IMAGE
		$target_dir = "docs/announcements/";
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

		$query = "INSERT INTO `announcements`( `title`, `description`, `image`, `date`) VALUES ('$title','$description','$image','$date')";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:manageannouncements.php?q=1');
		}else{
			header('location:manageannouncements.php?q=2');
		}
	}
	//UPDATE
	if(isset($_POST['update'])){
		if($_POST['update'] == 'announcements'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `announcements` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
	if(isset($_POST['update_announcements'])){
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$title = $_POST['title'];
		$description = $_POST['description'];
		$image = $_FILES["image"]["name"];
		$date = $_POST['date'];
		$id = $_POST['record_id'];
		//UPLOAD IMAGE
		if($image == ""){
			$query = "UPDATE `announcements` SET `title`='$title',`description`='$description',`date`='$date' WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:manageannouncements.php?q=updated');
			}else{
				header('location:manageannouncements.php?q=notupdated');
			}
		}
		else{
			$target_dir = "docs/announcements/";
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

			$query = "UPDATE `announcements` SET `title`='$title',`description`='$description',`image` = '$image',`date`='$date' WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:manageannouncements.php?q=updated');
			}else{
				header('location:manageannouncements.php?q=notupdated');
			}
		}
		
	}
	/*
	*
	* OPERATIONS FOR PHOTO CATEGORIES.
	*
	*/
	//Add Guest
	if(isset($_POST['add_category']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$name = $_POST['name'];
		$image = $_FILES["image"]["name"];
		
			//UPLOAD IMAGE
			$target_dir = "docs/category/";
			$target_file = $target_dir . basename($_FILES["image"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["image"]["tmp_name"]);
				if($check != false) {
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
	
		
			
		$query = "INSERT INTO `photo_categories`( `name`,`image`) VALUES ('$name','$image')";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:managephotocategories.php?q=1');
		}else{
			header('location:managephotocategories.php?q=2');
		}
	}
	
		if(isset($_POST['add_eventcategory']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$name = $_POST['name'];
		$image = $_FILES["image"]["name"];
		
			//UPLOAD IMAGE
			$target_dir = "docs/event_gallery/category/";
			$target_file = $target_dir . basename($_FILES["image"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["image"]["tmp_name"]);
				if($check != false) {
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
	
		
			
		$query = "INSERT INTO `event_categories`( `name`,`image`) VALUES ('$name','$image')";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:manageeventcategories.php?q=1');
		}else{
			header('location:manageeventcategories.php?q=2');
		}
	}
	
	//UPDATE
	if(isset($_POST['update'])){
		if($_POST['update'] == 'photo_category'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `photo_categories` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
		if(isset($_POST['update'])){
		if($_POST['update'] == 'event_category'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `event_categories` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
	if(isset($_POST['update_eventcategory'])){
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$name = $_POST['name'];
		$id = $_POST['record_id'];
		$image = $_FILES["image"]["name"];

		if($image == ""){
			$query = "UPDATE `event_categories` SET `name`='$name' WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:manageeventcategories.php?q=updated');
			}else{
				header('location:manageeventcategories.php?q=notupdated');
			}
		}
		else{
			//UPLOAD IMAGE
		$target_dir = "docs/event_gallery/category/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["image"]["tmp_name"]);
		    if($check != false) {
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

		
		$query = "UPDATE `event_categories` SET `name`='$name',`image` = '$image' WHERE `id` = '$id'";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:manageeventcategories.php?q=updated');
		}else{
			header('location:manageeventcategories.php?q=notupdated');
		}
		}
	}
	/*
	*
	* OPERATIONS FOR VIDEO CATEGORIES.
	*
	*/
	//Add Guest
	if(isset($_POST['add_video_category']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$name = $_POST['name'];
		$image = $_FILES["image"]["name"];
		
			//UPLOAD IMAGE
			$target_dir = "docs/category/";
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
	
		
		$query = "INSERT INTO `video_categories`( `name`,`image`) VALUES ('$name','$image')";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:managevideocategories.php?q=1');
		}else{
			header('location:managevideocategories.php?q=2');
		}
	}
	//UPDATE
	if(isset($_POST['update'])){
		if($_POST['update'] == 'video_category'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `video_categories` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
	if(isset($_POST['update_videocategory'])){
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$name = $_POST['name'];
		$id = $_POST['record_id'];
		$image = $_FILES["image"]["name"];

		if($image == ""){
			$query = "UPDATE `video_categories` SET `name`='$name' WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:managevideocategories.php?q=updated');
			}else{
				header('location:managevideocategories.php?q=notupdated');
			}
		}
		else{
			//UPLOAD IMAGE
			$target_dir = "docs/category/";
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
	
		
		
		$query = "UPDATE `video_categories` SET `name`='$name',`image` = '$image' WHERE `id` = '$id'";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:managevideocategories.php?q=updated');
		}else{
			header('location:managevideocategories.php?q=notupdated');
		}
		}		
	}
	/*
	*
	* OPERATIONS FOR VIDEO GALLERY.
	*
	*/
	//Add Guest
	if(isset($_POST['add_video']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$category = $_POST['category'];
		$title = $_POST['title'];
		$date = $_POST['date'];
		$url = $_POST['url'];

		$query = "INSERT INTO `video_gallery`(`category_id`, `title`, `date`, `url`) VALUES ('$category','$title','$date','$url')";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:managevideogallery.php?q=1');
		}else{
			header('location:managevideogallery.php?q=2');
		}
	}
	//UPDATE
	if(isset($_POST['update'])){
		if($_POST['update'] == 'video_gallery'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `video_gallery` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
	if(isset($_POST['update_videogallery'])){
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$category = $_POST['category'];
		$title = $_POST['title'];
		$date = $_POST['date'];
		$url = $_POST['url'];
		$id = $_POST['record_id'];
		
		$query = "UPDATE `video_gallery` SET `category_id`='$category',`title`='$title',`date`='$date',`url`='$url' WHERE `id` = '$id'";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:managevideogallery.php?q=updated');
		}else{
			header('location:managevideogallery.php?q=notupdated');
		}
	}
	/*
	*
	* OPERATIONS FOR PHOTO GALLERY.
	*
	*/
	//Add Guest
	if(isset($_POST['add_photo']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$category = $_POST['category'];
		$title = $_POST['title'];
		$date = $_POST['date'];
		$image = $_FILES["image"]["name"];
		//UPLOAD IMAGE
		$target_dir = "docs/gallery/";
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


		$query = "INSERT INTO `photo_gallery`(`category_id`, `title`, `date`, `image`) VALUES ('$category','$title','$date','$image')";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:managephotogallery.php?q=1');
		}else{
			header('location:managephotogallery.php?q=2');
		}
	}
		if(isset($_POST['add_eventphoto']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$category = $_POST['category'];
		$title = $_POST['title'];
		$date = $_POST['date'];
		$image = $_FILES["image"]["name"];
		//UPLOAD IMAGE
		$target_dir = "docs/event_gallery/gallery/";
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


		$query = "INSERT INTO `event_gallery`(`category_id`, `title`, `date`, `image`) VALUES ('$category','$title','$date','$image')";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:manageeventgallery.php?q=1');
		}else{
			header('location:manageeventgallery.php?q=2');
		}
	}
	//UPDATE
	if(isset($_POST['update'])){
		if($_POST['update'] == 'photo_gallery'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `photo_gallery` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
		if(isset($_POST['update'])){
		if($_POST['update'] == 'event_gallery'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `event_gallery` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
	if(isset($_POST['update_photogallery']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$title = $_POST['title'];
		$category = $_POST['category'];
		$image = $_FILES["image"]["name"];
		$date = $_POST['date'];
		$id = $_POST['record_id'];
		//UPLOAD IMAGE
		if($image == ""){
			$query = "UPDATE `photo_gallery` SET `category_id`='$category',`title`='$title',`date`='$date' WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:managephotogallery.php?q=updated');
			}else{
				header('location:managephotogallery.php?q=notupdated');
			}
		}
		else{
			$target_dir = "docs/gallery/";
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

			$query = "UPDATE `photo_gallery` SET `category_id`='$category',`title`='$title',`date`='$date',`image`='$image' WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:managephotogallery.php?q=updated');
			}else{
				header('location:managephotogallery.php?q=notupdated');
			}
		}
		
	}
	
	if(isset($_POST['update_eventgallery']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$title = $_POST['title'];
		$category = $_POST['category'];
		$image = $_FILES["image"]["name"];
		$date = $_POST['date'];
		$id = $_POST['record_id'];
		//UPLOAD IMAGE
		if($image == ""){
			$query = "UPDATE `event_gallery` SET `category_id`='$category',`title`='$title',`date`='$date' WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:manageeventgallery.php?q=updated');
			}else{
				header('location:manageeventgallery.php?q=notupdated');
			}
		}
		else{
			$target_dir = "docs/event_gallery/gallery/";
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

			$query = "UPDATE `event_gallery` SET `category_id`='$category',`title`='$title',`date`='$date',`image`='$image' WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:manageeventgallery.php?q=updated');
			}else{
				header('location:manageeventgallery.php?q=notupdated');
			}
		}
		
	}
	
	/*
	*
	* OPERATIONS FOR GAMES & SPORTS ACTIVITY.
	*
	*/
	//Add Guest
	if(isset($_POST['add_sports_activity']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$month = $_POST['month'];
		$activity = $_POST['activity'];
		$date = $_POST['date'];

		$query = "INSERT INTO `sports_activity`( `month`, `activity`, `date`) VALUES ('$month','$activity','$date')";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:gammessports_nursery.php?q=1');
		}else{
			header('location:gammessports_nursery.php?q=2');
		}
	}
	//UPDATE
	if(isset($_POST['update'])){
		if($_POST['update'] == 'sports_activity'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `sports_activity` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
	if(isset($_POST['update_sport_activity'])){
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$month = $_POST['month'];
		$activity = $_POST['activity'];
		$date = $_POST['date'];
		$id = $_POST['record_id'];
		
		$query = "UPDATE `sports_activity` SET `month`= '$month',`activity`= '$activity',`date`= '$date' WHERE `id` = '$id'";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:gammessports_nursery.php?q=updated');
		}else{
			header('location:gammessports_nursery.php?q=notupdated');
		}
	}
	/*
	*
	* OPERATIONS FOR GAMES & SPORTS ACTIVITY JRKG.
	*
	*/
	//Add Guest
	if(isset($_POST['add_sports_activity_jrkg']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$month = $_POST['month'];
		$activity = $_POST['activity'];
		$date = $_POST['date'];

		$query = "INSERT INTO `sports_activity_jrkg`( `month`, `activity`, `date`) VALUES ('$month','$activity','$date')";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:gammessports_jrkg.php?q=1');
		}else{
			header('location:gammessports_jrkg.php?q=2');
		}
	}
	//UPDATE
	if(isset($_POST['update'])){
		if($_POST['update'] == 'sports_activity_jrkg'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `sports_activity_jrkg` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
	if(isset($_POST['update_sport_activity_jrkg'])){
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$month = $_POST['month'];
		$activity = $_POST['activity'];
		$date = $_POST['date'];
		$id = $_POST['record_id'];
		
		$query = "UPDATE `sports_activity_jrkg` SET `month`= '$month',`activity`= '$activity',`date`= '$date' WHERE `id` = '$id'";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:gammessports_jrkg.php?q=updated');
		}else{
			header('location:gammessports_jrkg.php?q=notupdated');
		}
	}
	/*
	*
	* OPERATIONS FOR GAMES & SPORTS ACTIVITY SRKG.
	*
	*/
	//Add Guest
	if(isset($_POST['add_sports_activity_srkg']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$month = $_POST['month'];
		$activity = $_POST['activity'];
		$date = $_POST['date'];

		$query = "INSERT INTO `sports_activity_srkg`( `month`, `activity`, `date`) VALUES ('$month','$activity','$date')";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:gammessports_srkg.php?q=1');
		}else{
			header('location:gammessports_srkg.php?q=2');
		}
	}
	//UPDATE
	if(isset($_POST['update'])){
		if($_POST['update'] == 'sports_activity_srkg'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `sports_activity_srkg` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
	if(isset($_POST['update_sport_activity_srkg'])){
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$month = $_POST['month'];
		$activity = $_POST['activity'];
		$date = $_POST['date'];
		$id = $_POST['record_id'];
		
		$query = "UPDATE `sports_activity_srkg` SET `month`= '$month',`activity`= '$activity',`date`= '$date' WHERE `id` = '$id'";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:gammessports_srkg.php?q=updated');
		}else{
			header('location:gammessports_srkg.php?q=notupdated');
		}
	}
	/*
	*
	* OPERATIONS FOR GAMES & SPORTS ACTIVITY SRKG.
	*
	*/
	//Add Guest
	if(isset($_POST['add_sports_activity_sr']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$month = $_POST['month'];
		$activity = $_POST['activity'];
		$date = $_POST['date'];

		$query = "INSERT INTO `sports_activity_sr`( `month`, `activity`, `date`) VALUES ('$month','$activity','$date')";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:gammessports.php?q=1');
		}else{
			header('location:gammessports.php?q=2');
		}
	}
	//UPDATE
	if(isset($_POST['update'])){
		if($_POST['update'] == 'sports_activity_sr'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `sports_activity_sr` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
	if(isset($_POST['update_sport_activity_sr'])){
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$month = $_POST['month'];
		$activity = $_POST['activity'];
		$date = $_POST['date'];
		$id = $_POST['record_id'];
		
		$query = "UPDATE `sports_activity_sr` SET `month`= '$month',`activity`= '$activity',`date`= '$date' WHERE `id` = '$id'";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:gammessports.php?q=updated');
		}else{
			header('location:gammessports.php?q=notupdated');
		}
	}
	/*
	*
	* OPERATIONS FOR PRE-PRIMARY CO_SCHOLASTIC ACTIVITY.
	*
	*/
	//Add Guest
	if(isset($_POST['add_preprimary_coscholastic']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$month = $_POST['month'];
		$day = $_POST['day'];
		$activity = $_POST['activity'];
		$date = $_POST['date'];

		$query = "INSERT INTO `pre_primary_coscholastic`( `month`, `date`,`day`, `activity`) VALUES ('$month','$date','$day','$activity')";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:managepreprimarycoscholastic.php?q=1');
		}else{
			header('location:managepreprimarycoscholastic.php?q=2');
		}
	}
	//UPDATE
	if(isset($_POST['update'])){
		if($_POST['update'] == 'pre_primary_coscholastic'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `pre_primary_coscholastic` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
	if(isset($_POST['update_preprimary_coscholastic'])){
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$month = $_POST['month'];
		$activity = $_POST['activity'];
		$date = $_POST['date'];
		$day = $_POST['day'];
		$id = $_POST['record_id'];
		
		$query = "UPDATE `pre_primary_coscholastic` SET `month`= '$month',`date`= '$date',`day`='$day',`activity`= '$activity' WHERE `id` = '$id'";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:managepreprimarycoscholastic.php?q=updated');
		}else{
			header('location:managepreprimarycoscholastic.php?q=notupdated');
		}
	}
	/*
	*
	* OPERATIONS FOR PRIMARY CO_SCHOLASTIC ACTIVITY.
	*
	*/
	//Add Guest
	if(isset($_POST['add_primary_coscholastic']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$month = $_POST['month'];
		$day = $_POST['day'];
		$subjun = $_POST['subjun'];
		$jun = $_POST['jun'];
		$date = $_POST['date'];
		$number = $_POST['number'];

		$query = "INSERT INTO `primary_coscholastic`( `month`, `day`,`date`, `subjun`,`jun`,`number`) VALUES ('$month','$day','$date','$subjun','$jun','$number')";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:manageprimarycoscholastic.php?q=1');
		}else{
			header('location:manageprimarycoscholastic.php?q=2');
		}
	}
	//UPDATE
	if(isset($_POST['update'])){
		if($_POST['update'] == 'primary_coscholastic'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `primary_coscholastic` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
	if(isset($_POST['update_primary_coscholastic'])){
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$month = $_POST['month'];
		$day = $_POST['day'];
		$subjun = $_POST['subjun'];
		$jun = $_POST['jun'];
		$date = $_POST['date'];
		$number = $_POST['number'];

		$id = $_POST['record_id'];
		
		$query = "UPDATE `primary_coscholastic` SET `month`= '$month',`day`= '$day',`date`='$date',`subjun`= '$subjun',`jun`='$jun',`number` = '$number' WHERE `id` = '$id'";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:manageprimarycoscholastic.php?q=updated');
		}else{
			header('location:manageprimarycoscholastic.php?q=notupdated');
		}
	}
	/*
	*
	* OPERATIONS FOR SECONDARY CO_SCHOLASTIC ACTIVITY.
	*
	*/
	//Add Guest
	if(isset($_POST['add_secondary_coscholastic']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$month = $_POST['month'];
		$day = $_POST['day'];
		$subjun = $_POST['subjun'];
		$jun = $_POST['jun'];
		$date = $_POST['date'];
		$number = $_POST['number'];

		$query = "INSERT INTO `secondary_coscholastic`( `month`, `day`,`date`, `subjun`,`jun`,`number`) VALUES ('$month','$day','$date','$subjun','$jun','$number')";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:managesecondarycoscholastic.php?q=1');
		}else{
			header('location:managesecondarycoscholastic.php?q=2');
		}
	}
	//UPDATE
	if(isset($_POST['update'])){
		if($_POST['update'] == 'secondary_coscholastic'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `secondary_coscholastic` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
	if(isset($_POST['update_secondary_coscholastic'])){
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$month = $_POST['month'];
		$day = $_POST['day'];
		$subjun = $_POST['subjun'];
		$jun = $_POST['jun'];
		$date = $_POST['date'];
		$number = $_POST['number'];

		$id = $_POST['record_id'];
		
		$query = "UPDATE `secondary_coscholastic` SET `month`= '$month',`day`= '$day',`date`='$date',`subjun`= '$subjun',`jun`='$jun',`number` = '$number' WHERE `id` = '$id'";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:managesecondarycoscholastic.php?q=updated');
		}else{
			header('location:managesecondarycoscholastic.php?q=notupdated');
		}
	}
	/*
	*
	* OPERATIONS FOR ASSESSMENT TESTS.
	*
	*/
	//Add Guest
	if(isset($_POST['add_assessment']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$examination = $_POST['examination'];
		$fromdate = $_POST['fromdate'];
		$todate = $_POST['todate'];
		$opendate = $_POST['opendate'];

		$query = "INSERT INTO `assessment_test`( `examination`, `fromdate`,`todate`, `open`) VALUES ('$examination','$fromdate','$todate','$opendate')";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:manageassessment.php?q=1');
		}else{
			header('location:manageassessment.php?q=2');
		}
	}
	//UPDATE
	if(isset($_POST['update'])){
		if($_POST['update'] == 'assessment_tests'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `assessment_test` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
	if(isset($_POST['update_assessment'])){
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$examination = $_POST['examination'];
		$fromdate = $_POST['fromdate'];
		$todate = $_POST['todate'];
		$opendate = $_POST['opendate'];
		$id = $_POST['record_id'];
		
		$query = "UPDATE `assessment_test` SET `examination`= '$examination',`fromdate`= '$fromdate',`todate`='$todate',`open`= '$opendate' WHERE `id` = '$id'";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:manageassessment.php?q=updated');
		}else{
			header('location:manageassessment.php?q=notupdated');
		}
	}
	/*
	*
	* OPERATIONS FOR PREBOARD TESTS.
	*
	*/
	//Add Guest
	if(isset($_POST['add_preboard']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$examination = $_POST['examination'];
		$fromdate = $_POST['fromdate'];
		$todate = $_POST['todate'];
		$opendate = $_POST['opendate'];

		$query = "INSERT INTO `preboard`( `examination`, `fromdate`,`todate`, `open`) VALUES ('$examination','$fromdate','$todate','$opendate')";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:managepreboard.php?q=1');
		}else{
			header('location:managepreboard.php?q=2');
		}
	}
	//UPDATE
	if(isset($_POST['update'])){
		if($_POST['update'] == 'preboard'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `preboard` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
	if(isset($_POST['update_preboard'])){
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$examination = $_POST['examination'];
		$fromdate = $_POST['fromdate'];
		$todate = $_POST['todate'];
		$opendate = $_POST['opendate'];
		$id = $_POST['record_id'];
		
		$query = "UPDATE `preboard` SET `examination`= '$examination',`fromdate`= '$fromdate',`todate`='$todate',`open`= '$opendate' WHERE `id` = '$id'";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:managepreboard.php?q=updated');
		}else{
			header('location:managepreboard.php?q=notupdated');
		}
	}
	/*
	*
	* OPERATIONS FOR SUBJECT.
	*
	*/
	//Add Guest
	if(isset($_POST['add_subject']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$name = $_POST['name'];
		$query = "INSERT INTO `subject`( `name`) VALUES ('$name')";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:managesubject.php?q=1');
		}else{
			header('location:managesubjet.php?q=2');
		}
	}
	//UPDATE
	if(isset($_POST['update'])){
		if($_POST['update'] == 'subject'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `subject` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
	if(isset($_POST['update_subject'])){
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$name = $_POST['name'];
		$id = $_POST['record_id'];
		
		$query = "UPDATE `subject` SET `name`= '$name' WHERE `id` = '$id'";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:managesubject.php?q=updated');
		}else{
			header('location:managesubject.php?q=notupdated');
		}
	}
	/*
	*
	* OPERATIONS FOR SCHEDULE TEST TERM 1.
	*
	*/
	//Add Guest
	if(isset($_POST['add_term1']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$date = $_POST['date'];
		$sub1 = $_POST['sub1'];
		$sub2 = $_POST['sub2'];
		
		$query = "INSERT INTO `schedule_test_term1`( `date`, `sub1`,`sub2`) VALUES ('$date','$sub1','$sub2')";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:manageschedule.php?q=1');
		}else{
			header('location:manageschedule.php?q=2');
		}
	}
	//UPDATE
	if(isset($_POST['update'])){
		if($_POST['update'] == 'term1'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `schedule_test_term1` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
	if(isset($_POST['update_term1'])){
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$date = $_POST['date'];
		$sub1 = $_POST['sub1'];
		$sub2 = $_POST['sub2'];

		$id = $_POST['record_id'];
		
		$query = "UPDATE `schedule_test_term1` SET `date`= '$date',`sub1`= '$sub1',`sub2`='$sub2' WHERE `id` = '$id'";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:manageschedule.php?q=updated');
		}else{
			header('location:manageschedule.php?q=notupdated');
		}
	}
	/*
	*
	* OPERATIONS FOR SCHEDULE TEST TERM 2.
	*
	*/
	//Add Guest
	if(isset($_POST['add_term2']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$date = $_POST['date2'];
		$sub1 = $_POST['sub12'];
		$sub2 = $_POST['sub22'];
		
		$query = "INSERT INTO `schedule_test_term2`( `date`, `sub1`,`sub2`) VALUES ('$date','$sub1','$sub2')";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:manageschedule.php?q=1');
		}else{
			header('location:manageschedule.php?q=2');
		}
	}
	//UPDATE
	if(isset($_POST['update'])){
		if($_POST['update'] == 'term2'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `schedule_test_term2` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
	if(isset($_POST['update_term2'])){
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$date = $_POST['date2'];
		$sub1 = $_POST['sub12'];
		$sub2 = $_POST['sub22'];

		$id = $_POST['record_id2'];
		
		$query = "UPDATE `schedule_test_term2` SET `date`= '$date',`sub1`= '$sub1',`sub2`='$sub2' WHERE `id` = '$id'";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:manageschedule.php?q=updated');
		}else{
			header('location:manageschedule.php?q=notupdated');
		}
	}
	/*
	*
	* OPERATIONS FOR SPLIT UP SYLLABUS.
	*
	*/
	// Subject Count
	if(isset($_POST['update'])){
		if($_POST['update'] == 'subject_count'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `subject_count` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
	
	if(isset($_POST['subject_count'])){
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
        $first = $_POST['first'];
        $second = $_POST['second'];
        $third = $_POST['third'];
        $fourth = $_POST['fourth'];
        $fifth = $_POST['fifth'];
        $sixth = $_POST['sixth'];
        $seventh = $_POST['seventh'];
        $eighth = $_POST['eighth'];
        $ninth = $_POST['ninth'];
        $tenth = $_POST['tenth'];
        $id = "1";
        
        $query = "UPDATE `subject_count` SET `first`='$first',`second`='$second',`third`='$third',`fourth`='$fourth',`fifth`='$fifth',`sixth`='$sixth',`seventh`='$seventh',`eighth`='$eighth',`ninth`='$ninth',`tenth`='$tenth' WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:managesyllabus.php?q=updated');
			}else{
				header('location:managesyllabus.php?q=notupdated');
			}
	}
	
	
	//Add Guest
	if(isset($_POST['add_syllabus']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$standard = $_POST['standard'];
		$subject = $_POST['subject'];
		$image = $_FILES["image"]["name"];
		//UPLOAD IMAGE
		$target_dir = "docs/syllabus/";
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
		// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		// && $imageFileType != "gif" ) {
		//     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		//     $uploadOk = 0;
		// }
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


		$query = "INSERT INTO `splitup_syllabus`(`standard`, `subject`, `image`) VALUES ('$standard','$subject','$image')";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:managesyllabus.php?q=1');
		}else{
			header('location:managesyllabus.php?q=2');
		}
	}
	//UPDATE
	if(isset($_POST['update'])){
		if($_POST['update'] == 'syllabus'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `splitup_syllabus` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
	if(isset($_POST['update_syllabus'])){
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$standard = $_POST['standard'];
		$subject = $_POST['subject'];
		$image = $_FILES["image"]["name"];
		$id = $_POST['record_id'];
		//UPLOAD IMAGE
		if($image == ""){
			$query = "UPDATE `splitup_syllabus` SET `standard`='$standard',`subject`='$subject' WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:managesyllabus.php?q=updated');
			}else{
				header('location:managesyllabus.php?q=notupdated');
			}
		}
		else{
			$target_dir = "docs/syllabus/";
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
			// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			// && $imageFileType != "gif" ) {
			//     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			//     $uploadOk = 0;
			// }
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

			$query = "UPDATE `splitup_syllabus` SET `standard`='$standard',`subject`='$subject',`image`='$image' WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:managesyllabus.php?q=updated');
			}else{
				header('location:managesyllabus.php?q=notupdated');
			}
		}
		
	}
	/*
	*
	* OPERATIONS FOR FEES STRUCTURE.
	*
	*/
	//Add Guest
	if(isset($_POST['add_fees']))
	{
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$title = $_POST['title'];
		$nur = $_POST['nur'];
		$jrkg = $_POST['jrkg'];
		$srkg = $_POST['srkg'];
		$first = $_POST['first'];
		$second = $_POST['second'];
		$third = $_POST['third'];
		$fourth = $_POST['fourth'];
		$fifth = $_POST['fifth'];
		$sixth = $_POST['sixth'];
		$seventh = $_POST['seventh'];
		$eighth = $_POST['eighth'];
		$ninth = $_POST['ninth'];
		$tenth = $_POST['tenth'];
		
		$query = "INSERT INTO `fees_structure`(`nur`, `jkg`, `skg`, `first`, `second`, `third`, `fourth`, `fifth`, `sixth`, `seventh`, `eighth`, `ninth`, `tenth`, `title`) VALUES ('$nur','$jrkg','$srkg','$first','$second','$thrid','$fourth','$fifth','$sixth','$seventh','$eighth','$ninth','$tenth','$title')";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:managefees.php?q=1');
		}else{
			header('location:managefees.php?q=2');
		}
	}
	//UPDATE
	if(isset($_POST['update'])){
		if($_POST['update'] == 'fees'){
			$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
			if(isset($_POST["id"]))
			{
				$id = $_POST['id'];
				$query = "SELECT * FROM `fees_structure` WHERE `id` = '$id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				
				echo json_encode($row);
			}
			
		}
	}
	if(isset($_POST['update_fees'])){
		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		$title = $_POST['title'];
		$nur = $_POST['nur'];
		$jrkg = $_POST['jrkg'];
		$srkg = $_POST['srkg'];
		$first = $_POST['first'];
		$second = $_POST['second'];
		$third = $_POST['third'];
		$fourth = $_POST['fourth'];
		$fifth = $_POST['fifth'];
		$sixth = $_POST['sixth'];
		$seventh = $_POST['seventh'];
		$eighth = $_POST['eighth'];
		$ninth = $_POST['ninth'];
		$tenth = $_POST['tenth'];

		$id = $_POST['record_id'];
		
		$query = "UPDATE `fees_structure` SET `nur`='$nur',`jkg`='$jrkg',`skg`='$srkg',`first`='$first',`second`='$second',`third`='$third',`fourth`='$fourth',`fifth`='$fifth',`sixth`='$sixth',`seventh`='$seventh',`eighth`='$eighth',`ninth`='$ninth',`tenth`='$tenth',`title`='$title' WHERE `id` = '$id'";
		$res = mysqli_query($con, $query);
		if($res){
			header('location:managefees.php?q=updated');
		}else{
			header('location:managefees.php?q=notupdated');
		}
	}
?>