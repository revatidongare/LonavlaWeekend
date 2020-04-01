<?php
  // session_start();

  // if(!isset($_SESSION['admin'])){
  //   header('location:login.php');
  // }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Kaivalyadham Vidya Niketan - Manage Games & Sports Activity</title>
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
                   <p class="colortheme" style="letter-spacing: 3px;">MANAGE GAMES & SPORTS ACTIVITY</p>
                 </div>
                 <div class="col-xl-2 col-md-2 mb-4 ">
                    <a href="#" class="btn btn-theme-outline" data-toggle="modal" data-target="#add_sports_activity">+ Add Activity</a>
                 </div>
               </div>
               <?php 
                  if(isset($_GET['q'])){
                    $value = $_GET['q'];

                    if($value == 1){
                      ?>
                         <div class="alert alert-success" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Activity added successfully!
                        </div>
                      <?php
                    }
                    if($value == 'updated'){
                      ?>
                         <div class="alert alert-success" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Activity updated successfully!
                        </div>
                      <?php
                    }
                    if($value == 'deleted'){
                      ?>
                         <div class="alert alert-success" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Activity deleted successfully!
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
                                      <th>Day</th>
                                      <th>Activity</th>
                                      <th>Date</th>
                                      <th>Update</th>
                                      <th>Delete</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $query = "SELECT * FROM `sports_activity`";
                                      $res = mysqli_query($con,$query);
                                      while ($row = mysqli_fetch_array($res)) {
                                    ?>
                                    <tr>
                                      <td><?php echo $row['id'];?></td>
                                      <td><?php echo $row['month']; ?></td>
                                      <td><?php echo $row['activity']; ?></td>
                                      <td><?php echo $row['date']; ?></td>
                                      <td><button class="btn btn-theme" name="update" id="update" data-toggle="modal" data-target="#update_sport_activity" onclick="sendUpdate(<?php echo $row['id']; ?>)">Update</button></td>
                                      <td><a class="btn btn-danger" href="delete.php?q=<?php echo $row['id'];?>&table_name=sports_activity" >Delete</a></td>
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
  <div class="modal fade" id="add_sports_activity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Add New Category (All fields mandatory)</h6>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="back.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-row">
             <div class="col-lg-12">
             <label for="name">Activity Day</label>
             <input type="text" name="month" class="form-control" placeholder="Enter day.."  required>
             </div>

             <div class="col-lg-12 mt-3">
             <label for="name">Activity Name</label>
             <input type="text" name="activity" class="form-control" placeholder="Enter activity name.."  required>
             </div>

             <div class="col-lg-12 mt-3">
             <label for="name">Activity Date</label>
             <input type="date" name="date" class="form-control" placeholder="Enter Category Name.."  required>
             </div>

            </div>  
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-theme" name="add_sports_activity">+ Add Activity</button>
        </div>
         </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="update_sport_activity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Update Activity</h6>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="back.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-row">
             <div class="col-lg-12">
             <label for="name">Activity Day</label>
             <input type="text" name="month" id="month" class="form-control"  required>
             </div>

             <div class="col-lg-12 mt-3">
             <label for="name">Activity Name</label>
             <input type="text" name="activity" id="activity" class="form-control" required>
             </div>

             <div class="col-lg-12 mt-3">
             <label for="name">Activity Date</label>
             <input type="date" name="date" id="date" class="form-control" required>
             <input type="hidden" name="record_id" id="record_id">
             </div>
            </div>  
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-theme" name="update_sport_activity">+ Update Activity</button>
        </div>
         </form>
      </div>
    </div>
  </div>

  <?php include 'includes/script.php';?>
  <script>
    function sendUpdate(id){
      $.ajax({
        url: "back.php",
        method: "POST",
        data: {id: id, update: "sports_activity"}, 
        success: function(result){
          var data = JSON.parse(result)
          $("#month").val(data['month'])
          $("#activity").val(data['activity'])
          $("#date").val(data['date'])
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
