<?php
  session_start();

  if(!isset($_SESSION['user_email'])){
    header('location:login.php');
  }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>vEngineering - Dashboard</title>
  <?php include 'includes/head.php';?>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'includes/sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content" class="maincontent">

        <!-- Topbar -->
        <?php include 'includes/navbar.php';?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <?php include 'section/chaptersection.php';?>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include 'includes/footer.php';?>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include 'includes/logoutmodal.php';?>

  <?php include 'includes/script.php';?>

</body>

</html>
