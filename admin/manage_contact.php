<?php
  session_start();

  if(!isset($_SESSION['admin'])){
    header('location:login.php');
  }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Lonavla Weekend- Dashboard</title>
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
        <?php include 'config.php'?>
<div class="container-fluid actualcontent mb-5">
  <?php 
                  if(isset($_GET['q'])){
                    $value = $_GET['q'];

                    if($value == 1){
                      ?>
                         <div class="alert alert-success" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Slider added successfully!
                        </div>
                      <?php
                    }
                    if($value == 'updated'){
                      ?>
                         <div class="alert alert-success" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           updated successfully!
                        </div>
                      <?php
                    }
                    if($value == 'deleted'){
                      ?>
                         <div class="alert alert-success" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           deleted successfully!
                        </div>
                      <?php
                    }
                    if($value == 2 || ($value == 'notupdated') || ($value=='notdeleted')){
                      ?>
                         <div class="alert alert-danger" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Error!
                        </div>
                      <?php
                    }
                  }
                ?>
  <!-- Page Heading -->
  <!-- <div class="row mt-3">
     <div class="col-xl-10 col-md-10 mb-2 mx-auto">
       <p class="colortheme">Fill Following Form</p>
     </div>
   </div> -->
  <!-- Single Item -->
        <div class="row mt-2">
<?php     
                             $query = "SELECT * FROM `manage_contacts` ORDER BY `mark_as_read` ASC";
                             include 'config.php';
                            $stmt=$conn->prepare($query);
                             $stmt->execute();
                             $res=$stmt->fetchAll();
                             // $mark_as_read = $_POST['mark_as_read'];
                             $conn=null;
                             $id=0;
                             
                              foreach($res as $row){
                                if($row['mark_as_read'] == 0){
                        ?>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div> -->
                      <div class="text-xs font-weight-bold text-primary  mb-1" align="justify">
                         <a title="Mark As Read" href="active.php?q=<?php echo $row['id'];?>&table_name=manage_contacts&status=active" ><i class="fas fa-book-reader" style="color:blue" ></i>
                         <a href="delete.php?q=<?php echo $row['id'];?>&table_name=manage_contacts"><i class="fa fa-trash-o" style="color:red" title="delete"></i></a>
                         <br>
                        <!-- <?php echo $row['id'];?> -->
                         Name: <?php echo $row['name'];?><br>
                          E-Mail: <?php echo $row['email'];?><br>
                          Phone No.: <?php echo $row['phone']; ?><br>
                          Subject: <?php echo $row['subject'];?><br>
                          Message: <?php echo $row['message'];?><br>
                          From Date: <?php echo $row['from_date'];?><br>
                          To Date: <?php echo $row['to_date'];?><br>
                          No. of Guest: <?php echo $row['guest_num'];?><br>
                          Room Type: <?php echo $row['room_type'];?><br>
                         
                      </div>
                      
                    </div>
                    <div class="col-auto">
                      <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->

                    </div>
                  </div>
                </div>
              </div>
            </div>
<?php }
else{ ?>
  <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow  h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div> -->
                      <div class="text-xs font-weight-bold text-primary  mb-1" align="justify">
                         <i class="fas fa-book-reader" style="color:#000;"></i>
                         <a href="delete.php?q=<?php echo $row['id'];?>&table_name=manage_contacts"><i class="fa fa-trash-o" style="color:red" ></i></a>
                         <br>
                        <!-- <?php echo $row['id'];?> -->
                         Name: <?php echo $row['name'];?><br>
                          E-Mail: <?php echo $row['email'];?><br>
                          Phone No.: <?php echo $row['phone']; ?><br>
                          Subject: <?php echo $row['subject'];?><br>
                          Message: <?php echo $row['message'];?><br>
                          From Date: <?php echo $row['from_date'];?><br>
                          To Date: <?php echo $row['to_date'];?><br>
                          No. of Guest: <?php echo $row['guest_num'];?><br>
                          Room Type: <?php echo $row['room_type'];?><br>
                         
                      </div>
                      
                    </div>
                    <div class="col-auto">
                      <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->

                    </div>
                  </div>
                </div>
              </div>
            </div>
<?php }
} ?>
            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
 -->
            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Pending Requests Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          </div>

  <!-- Single Item -->
</div>
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
  <!-- sweet alert script -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    //swal("hello world");
  </script>

</body>

</html>
