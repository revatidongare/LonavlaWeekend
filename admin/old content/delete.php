
<?php 

		$con = mysqli_connect("localhost","kaivalya_admin_u","vinnovatetechnologies@vinnovate","kaivalya_admin");
		
		$id = $_GET['q'];
		$table_name = $_GET['table_name'];

		if($table_name == 'news'){
			$query = "DELETE FROM `news` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:managenews.php?q=deleted');
			}
			else{
				header('location:managenews.php?q=notdeleted');
			}
		}
		if($table_name == 'events'){
			$query = "DELETE FROM `events` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:manageevents.php?q=deleted');
			}
			else{
				header('location:manageevents.php?q=notdeleted');
			}
		}
		if($table_name == 'announcements'){
			$query = "DELETE FROM `announcements` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:manageannouncements.php?q=deleted');
			}
			else{
				header('location:manageannouncements.php?q=notdeleted');
			}
		}
		if($table_name == 'photo_categories'){
			$query = "DELETE FROM `photo_categories` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:managephotocategories.php?q=deleted');
			}
			else{
				header('location:managephotocategories.php?q=notdeleted');
			}
		}
		if($table_name == 'photo_gallery'){
			$query = "DELETE FROM `photo_gallery` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:managephotogallery.php?q=deleted');
			}
			else{
				header('location:managephotogallery.php?q=notdeleted');
			}
		}
		if($table_name == 'event_categories'){
			$query = "DELETE FROM `event_categories` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:manageeventcategories.php?q=deleted');
			}
			else{
				header('location:manageeventcategories.php?q=notdeleted');
			}
		}
		if($table_name == 'event_gallery'){
			$query = "DELETE FROM `event_gallery` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:manageeventgallery.php?q=deleted');
			}
			else{
				header('location:manageeventgallery.php?q=notdeleted');
			}
		}
		if($table_name == 'video_categories'){
			$query = "DELETE FROM `video_categories` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:managevideocategories.php?q=deleted');
			}
			else{
				header('location:managevideocategories.php?q=notdeleted');
			}
		}
		if($table_name == 'video_gallery'){
			$query = "DELETE FROM `video_gallery` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:managevideogallery.php?q=deleted');
			}
			else{
				header('location:managevideogallery.php?q=notdeleted');
			}
		}
		
		if($table_name == 'sports_activity'){
			$query = "DELETE FROM `sports_activity` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:gammessports_nursery.php?q=deleted');
			}
			else{
				header('location:gammessports_nursery.php?q=notdeleted');
			}
		}
		if($table_name == 'pre_primary_coscholastic'){
			$query = "DELETE FROM `pre_primary_coscholastic` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:managepreprimarycoscholastic.php?q=deleted');
			}
			else{
				header('location:managepreprimarycoscholastic.php?q=notdeleted');
			}
		}
		if($table_name == 'primary_coscholastic'){
			$query = "DELETE FROM `primary_coscholastic` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:manageprimarycoscholastic.php?q=deleted');
			}
			else{
				header('location:manageprimarycoscholastic.php?q=notdeleted');
			}
		}
		if($table_name == 'secondary_coscholastic'){
			$query = "DELETE FROM `secondary_coscholastic` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:managesecondarycoscholastic.php?q=deleted');
			}
			else{
				header('location:managesecondarycoscholastic.php?q=notdeleted');
			}
		}
		if($table_name == 'assessment_test'){
			$query = "DELETE FROM `assessment_test` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:manageassessment.php?q=deleted');
			}
			else{
				header('location:manageassessment.php?q=notdeleted');
			}
		}
		if($table_name == 'preboard'){
			$query = "DELETE FROM `preboard` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:managepreboard.php?q=deleted');
			}
			else{
				header('location:managepreboard.php?q=notdeleted');
			}
		}
		if($table_name == 'subject'){
			$query = "DELETE FROM `subject` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:managesubject.php?q=deleted');
			}
			else{
				header('location:managesubject.php?q=notdeleted');
			}
		}
		if($table_name == 'alumni'){
			$query = "DELETE FROM `alumni` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
			    header('location:alumni.php');
			}
			else{
				header('location:alumni.php?q=notdeleted');
			}
		}
		if($table_name == 'term1'){
			$query = "DELETE FROM `schedule_test_term1` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:manageschedule.php?q=deleted');
			}
			else{
				header('location:manageschedule.php?q=notdeleted');
			}
		}
		if($table_name == 'term2'){
			$query = "DELETE FROM `schedule_test_term2` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:manageschedule.php?q=deleted');
			}
			else{
				header('location:manageschedule.php?q=notdeleted');
			}
		}
		if($table_name == 'splitup_syllabus'){
			$query = "DELETE FROM `splitup_syllabus` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:managesyllabus.php?q=deleted');
			}
			else{
				header('location:managesyllabus.php?q=notdeleted');
			}
		}
		if($table_name == 'fees_structure'){
			$query = "DELETE FROM `fees_structure` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:managefees.php?q=deleted');
			}
			else{
				header('location:managefees.php?q=notdeleted');
			}
		}
		if($table_name == 'slider'){
			$query = "DELETE FROM `slider` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:manageslider.php?q=deleted');
			}
			else{
				header('location:manageslider.php?q=notdeleted');
			}
		}
		if($table_name == 'sports_activity_jrkg'){
			$query = "DELETE FROM `sports_activity_jrkg` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:gammessports_jrkg.php?q=deleted');
			}
			else{
				header('location:gammessports_jrkg.php?q=notdeleted');
			}
		}
		if($table_name == 'sports_activity_srkg'){
			$query = "DELETE FROM `sports_activity_jrkg` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:gammessports_jrkg.php?q=deleted');
			}
			else{
				header('location:gammessports_jrkg.php?q=notdeleted');
			}
		}
		if($table_name == 'sports_activity_sr'){
			$query = "DELETE FROM `sports_activity_sr` WHERE `id` = '$id'";
			$res = mysqli_query($con, $query);
			if($res){
				header('location:gammessports.php?q=deleted');
			}
			else{
				header('location:gammessports.php?q=notdeleted');
			}
		}
		mysql_close($con);
 ?>