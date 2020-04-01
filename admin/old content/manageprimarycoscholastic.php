<?php
  session_start();

  if(!isset($_SESSION['admin'])){
    header('location:login.php');
  }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Kaivalyadham Vidya Niketan - Manage Primary Section Co-Scholastic Activities</title>
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
                   <p class="colortheme" style="letter-spacing: 3px;">MANAGE ACTIVITIES</p>
                 </div>
                 <div class="col-xl-2 col-md-2 mb-4 ">
                    <a href="#" class="btn btn-theme-outline" data-toggle="modal" data-target="#add_primary_coscholastic">+ Add Activity</a>
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
                                      <th>Month</th>
                                      <th>Date</th>
                                      <th>Day</th>
                                      <th>Sub Junior Activity</th>
                                      <th>Junior Activity</th>
                                      <th>No. of particiapnts</th>
                                      <th>Update</th>
                                      <th>Delete</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $query = "SELECT * FROM `primary_coscholastic`";
                                      $res = mysqli_query($con,$query);
                                      while ($row = mysqli_fetch_array($res)) {
                                    ?>
                                    <tr>
                                      <td><?php echo $row['id'];?></td>
                                      <td><?php echo $row['month']; ?></td>
                                      <td><?php echo $row['date']; ?></td>
                                      <td><?php echo $row['day']; ?></td>
                                      <td><?php echo $row['subjun']; ?></td>
                                      <td><?php echo $row['jun']; ?></td>
                                      <td><?php echo $row['number']; ?></td>
                                      <td><button class="btn btn-theme" name="update" id="update" data-toggle="modal" data-target="#update_primary_coscholastic" onclick="sendUpdate(<?php echo $row['id']; ?>)">Update</button></td>
                                      <td><a class="btn btn-danger" href="delete.php?q=<?php echo $row['id'];?>&table_name=primary_coscholastic" >Delete</a></td>
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
  <div class="modal fade" id="add_primary_coscholastic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
             <label for="name">Activity Month</label>
             <input type="text" name="month" class="form-control" placeholder="Enter month.."  required>
             </div>

              <div class="col-lg-12 mt-3">
             <label for="name">Activity Day</label>
             <input type="text" name="day" class="form-control" placeholder="Enter activity day.."  required>
             </div>

             <div class="col-lg-12 mt-3">
             <label for="name">Subj Juniord Group Activity</label>
             <input type="text" name="subjun" class="form-control" placeholder="Enter activity name.."  required>
             </div>
             <div class="col-lg-12 mt-3">
             <label for="name">Juniord Group Activity</label>
             <input type="text" name="jun" class="form-control" placeholder="Enter activity name.."  required>
             </div>
             <div class="col-lg-12 mt-3">
             <label for="name">Activity Date</label>
             <input type="date" name="date" class="form-control" placeholder="Enter Category Name.."  required>
             </div>
             <div class="col-lg-12 mt-3">
             <label for="name">Number of Participants</label>
             <input type="text" name="number" class="form-control" placeholder="Enter Number of participants.."  required>
             </div>
            </div>  
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-theme" name="add_primary_coscholastic">+ Add Activity</button>
        </div>
         </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="update_primary_coscholastic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
             <label for="name">Activity Month</label>
             <input type="text" name="month" id="month" class="form-control"  required>
             </div>
              
             <div class="col-lg-12 mt-3">
             <label for="name">Activity Day</label>
             <input type="text" name="day" id="day" class="form-control" placeholder="Enter activity day.."  required>
             </div>

             <div class="col-lg-12 mt-3">
             <label for="name">Subj Juniord Group Activity</label>
             <input type="text" name="subjun" id="subjun" class="form-control" placeholder="Enter activity name.."  required>
             </div>
             <div class="col-lg-12 mt-3">
             <label for="name">Juniord Group Activity</label>
             <input type="text" name="jun" id="jun" class="form-control" placeholder="Enter activity name.."  required>
             </div>

             <div class="col-lg-12 mt-3">
             <label for="name">Activity Date</label>
             <input type="date" name="date" id="date" class="form-control" required>
             <input type="hidden" name="record_id" id="record_id">
             </div>

             <div class="col-lg-12 mt-3">
             <label for="name">Number of Participants</label>
             <input type="text" name="number" id="number" class="form-control" placeholder="Enter Number of participants.."  required>
             </div>

            </div>  
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-theme" name="update_primary_coscholastic">+ Update Activity</button>
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
        data: {id: id, update: "primary_coscholastic"}, 
        success: function(result){
          var data = JSON.parse(result)
          $("#month").val(data['month'])
          $("#subjun").val(data['subjun'])
          $("#jun").val(data['jun'])
          $("#number").val(data['number'])    
          $("#date").val(data['date'])
          $("#day").val(data['day'])
          
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
