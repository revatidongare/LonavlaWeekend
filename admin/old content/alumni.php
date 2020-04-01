<?php
  session_start();

  if(!isset($_SESSION['admin'])){
    header('location:login.php');
  }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Kaivalyadham Vidya Niketan - Alumni Details</title>
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
              <!-- Page Heading -->
              <div class="row mt-3">
                 <div class="col-xl-10 col-md-8 mb-4 mx-auto">
                   <p class="colortheme" style="letter-spacing: 3px;">Alumni Details</p>
                 </div>
                 
               </div>
               <?php 
                  if(isset($_GET['q'])){
                    $value = $_GET['q'];

                    if($value == 1){
                      ?>
                         <div class="alert alert-success" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Subject added successfully!
                        </div>
                      <?php
                    }
                    if($value == 'updated'){
                      ?>
                         <div class="alert alert-success" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Subject updated successfully!
                        </div>
                      <?php
                    }
                    if($value == 'deleted'){
                      ?>
                         <div class="alert alert-success" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           Deleted successfully!
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
              <!-- Single Item -->
                    <div class="row mt-3">
                       <div class="col-xl-12 col-md-10 mb-4 mx-auto">
                          <div class="card shadow mb-4">
                            <div class="card-body">
                              <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Name</th>
                                      <th>Phone</th>
                                      <th>Email</th>
                                      <th>Passing Year</th>
                                      <th>Passing Class</th>
                                      <th>Qualification</th>
                                      <th>Work Place</th>
                                      <th>About Me</th>
                                      <th>Delete</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $query = "SELECT * FROM `alumni`";
                                      $res = mysqli_query($con,$query);
                                      while ($row = mysqli_fetch_array($res)) {
                                    ?>
                                    <tr>
                                      <td><?php echo $row['id'];?></td>
                                      <td><?php echo $row['name']; ?></td>
                                      <td><?php echo $row['phone']; ?></td>
                                      <td><?php echo $row['email']; ?></td>
                                      <td><?php echo $row['passingyear']; ?></td>
                                      <td><?php echo $row['passingclass']; ?></td>
                                      <td><?php echo $row['qualification']; ?></td>
                                      <td><?php echo $row['workplace']; ?></td>
                                      <td><?php echo $row['aboutme']; ?></td>
                                      
                                      <td><a class="btn btn-danger" href="delete.php?q=<?php echo $row['id'];?>&table_name=alumni" >Delete</a></td>
                                    </tr>
                                  <?php } ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                      </div>
                       </div>
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


  <?php include 'includes/script.php';?>
  <script>
    function sendUpdate(id){
      $.ajax({
        url: "back.php",
        method: "POST",
        data: {id: id, update: "subject"}, 
        success: function(result){
          var data = JSON.parse(result)
          $("#name").val(data['name']) 
          $("#record_id").val(data['id'])
        }
      });
    }
  </script>
  <script type="text/javascript">
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
  </script>

</body>

</html>
