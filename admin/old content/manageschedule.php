<?php
  session_start();

  if(!isset($_SESSION['admin'])){
    header('location:login.php');
  }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Kaivalyadham Vidya Niketan - Manage Data Sheet Scheduled Tests</title>
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
            <div class="container-fluid actualcontent">
              <!-- Page Heading -->
              <div class="row mt-3">
                 <div class="col-xl-10 col-md-8 mb-4 mx-auto">
                   <p class="colortheme" style="letter-spacing: 3px;">MANAGE SCHEDULED TESTS DATASHEET - TERM 1</p>
                 </div>
                 <div class="col-xl-2 col-md-2 mb-4 ">
                    <a href="#" class="btn btn-theme-outline" data-toggle="modal" data-target="#add_term1">+ Add Exam</a>
                 </div>
               </div>
               <?php 
                  if(isset($_GET['q'])){
                    $value = $_GET['q'];

                    if($value == 1){
                      ?>
                         <div class="alert alert-success" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Examination added successfully!
                        </div>
                      <?php
                    }
                    if($value == 'updated'){
                      ?>
                         <div class="alert alert-success" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Examination updated successfully!
                        </div>
                      <?php
                    }
                    if($value == 'deleted'){
                      ?>
                         <div class="alert alert-success" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Examination deleted successfully!
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
                                      <th>Date</th>
                                      <th>Classes 3 to 5</th>
                                      <th>Classes 6 to 10</th>
                                      <th>Update</th>
                                      <th>Delete</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $query = "SELECT * FROM `schedule_test_term1`";
                                      $res = mysqli_query($con,$query);
                                      while ($row = mysqli_fetch_array($res)) {
                                    ?>
                                    <tr>
                                      <td><?php echo $row['id'];?></td>
                                      <td><?php echo $row['date']; ?></td>
                                      <td><?php 
                                           $sub_id = $row['sub1'];
                                           if($sub_id == '---'){
                                               echo $row['sub1'];
                                           }
                                           else{
                                           $sub1 = "SELECT * FROM `subject` WHERE `id` = '$sub_id'";
                                           $res_sub1 = mysqli_query($con, $sub1);
                                           $row_sub1 = mysqli_fetch_array($res_sub1);
                                           echo $row_sub1['name'];
                                           }
                                      ?></td>
                                      <td><?php
                                            $sub_id2 = $row['sub2'];
                                            if($sub_id2 == '---')
                                            {
                                                echo $row['sub2'];
                                            
                                            }else{
                                                $sub2 = "SELECT * FROM `subject` WHERE `id` = '$sub_id2'";
                                                $res_sub2 = mysqli_query($con, $sub2);
                                                $row_sub2 = mysqli_fetch_array($res_sub2);
                                                echo $row_sub2['name'];
                                            }
                                      ?></td>
                                      <td><button class="btn btn-theme" name="update" id="update" data-toggle="modal" data-target="#update_term1" onclick="sendUpdate(<?php echo $row['id']; ?>)">Update</button></td>
                                      <td><a class="btn btn-danger" href="delete.php?q=<?php echo $row['id'];?>&table_name=term1" >Delete</a></td>
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
            <div class="container-fluid mb-5">
              <!-- Page Heading -->
              <div class="row mt-3">
                 <div class="col-xl-10 col-md-8 mb-4 mx-auto">
                   <p class="colortheme" style="letter-spacing: 3px;">MANAGE SCHEDULED TESTS DATASHEET - TERM 2</p>
                 </div>
                 <div class="col-xl-2 col-md-2 mb-4 ">
                    <a href="#" class="btn btn-theme-outline" data-toggle="modal" data-target="#add_term2">+ Add Exam</a>
                 </div>
               </div>
              <!-- Single Item -->
                    <div class="row mt-3">
                       <div class="col-xl-12 col-md-10 mb-4 mx-auto">
                          <div class="card shadow mb-4">
                            <div class="card-body">
                              <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Date</th>
                                      <th>Classes 3 to 5</th>
                                      <th>Classes 6 to 10</th>
                                      <th>Update</th>
                                      <th>Delete</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $query = "SELECT * FROM `schedule_test_term2`";
                                      $res = mysqli_query($con,$query);
                                      while ($row = mysqli_fetch_array($res)) {
                                    ?>
                                    <tr>
                                      <td><?php echo $row['id'];?></td>
                                      <td><?php echo $row['date']; ?></td>
                                      <td><?php 
                                            $sub_id = $row['sub1'];
                                            if($sub_id == '---'){
                                                echo $row['sub1'];
                                            }
                                            else{
                                            $sub1 = "SELECT * FROM `subject` WHERE `id` = '$sub_id'";
                                            $res_sub1 = mysqli_query($con, $sub1);
                                            $row_sub1 = mysqli_fetch_array($res_sub1);
                                            echo $row_sub1['name'];
                                            }
                                      ?></td>
                                      <td><?php
                                            $sub_id2 = $row['sub2'];
                                            if($sub_id2 == '---')
                                            {
                                                echo $row['sub2'];
                                            
                                            }else{
                                                $sub2 = "SELECT * FROM `subject` WHERE `id` = '$sub_id2'";
                                                $res_sub2 = mysqli_query($con, $sub2);
                                                $row_sub2 = mysqli_fetch_array($res_sub2);
                                                echo $row_sub2['name'];
                                            }
                                      ?></td>
                                      <td><button class="btn btn-theme" name="update" id="update" data-toggle="modal" data-target="#update_term2" onclick="sendUpdate2(<?php echo $row['id']; ?>)">Update</button></td>
                                      <td><a class="btn btn-danger" href="delete.php?q=<?php echo $row['id'];?>&table_name=term2" >Delete</a></td>
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
  <div class="modal fade" id="add_term1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Add New Exam (All fields mandatory)</h6>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="back.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-row">
             <div class="col-lg-12">
             <label for="name">Date</label>
             <input type="date" name="date" class="form-control">
             </div>
             <div class="col-lg-12 mt-3">
             <label for="name">Subject for classes 3 - 5</label>
             <select name="sub1" class="form-control" required>
                <option value="---">Choose Any</option>
                <?php
                    $subject = "SELECT * FROM `subject`";
                    $res_subject = mysqli_query($con, $subject);
                    while($row_sub1 = mysqli_fetch_array($res_subject)){
                ?>
                <option value="<?php echo $row_sub1['id']?>"><?php echo $row_sub1['name'];?></option>
                <?php
                    }
                ?>
                <option value="---">None</option>
             </select>
             </div>
             <div class="col-lg-12 mt-3">
             <label for="name">Subject for classes 6 - 10</label>
             <select name="sub2" class="form-control" required>
                <option value="---">Choose Any</option>
                <?php
                    $subject1 = "SELECT * FROM `subject`";
                    $res_subject1 = mysqli_query($con, $subject1);
                    while($row_sub2 = mysqli_fetch_array($res_subject1)){
                ?>
                <option value="<?php echo $row_sub2['id']?>"><?php echo $row_sub2['name'];?></option>
                <?php
                    }
                ?>
                <option value="---">None</option>
             </select>
             </div>
            </div>  
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-theme" name="add_term1">+ Add Exam</button>
        </div>
         </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="add_term2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Add New Exam (All fields mandatory)</h6>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="back.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-row">
             <div class="col-lg-12">
             <label for="name">Date</label>
             <input type="date" name="date2" class="form-control">
             </div>
             <div class="col-lg-12 mt-3">
             <label for="name">Subject for classes 3 - 5</label>
             <select name="sub12" class="form-control" required>
                <option value="---">Choose Any</option>
                <?php
                    $subject = "SELECT * FROM `subject`";
                    $res_subject = mysqli_query($con, $subject);
                    while($row_sub1 = mysqli_fetch_array($res_subject)){
                ?>
                <option value="<?php echo $row_sub1['id']?>"><?php echo $row_sub1['name'];?></option>
                <?php
                    }
                ?>
                <option value="---">None</option>
             </select>
             </div>
             <div class="col-lg-12 mt-3">
             <label for="name">Subject for classes 6 - 10</label>
             <select name="sub22" class="form-control" required>
                <option value="---">Choose Any</option>
                <?php
                    $subject1 = "SELECT * FROM `subject`";
                    $res_subject1 = mysqli_query($con, $subject1);
                    while($row_sub2 = mysqli_fetch_array($res_subject1)){
                ?>
                <option value="<?php echo $row_sub2['id']?>"><?php echo $row_sub2['name'];?></option>
                <?php
                    }
                ?>
                <option value="---">None</option>
             </select>
             </div>
            </div>  
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-theme" name="add_term2">+ Add Exam</button>
        </div>
         </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="update_term1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Update Exam</h6>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="back.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-row">
            <div class="col-lg-12">
             <label for="name">Date</label>
             <input type="date" name="date" id="date" class="form-control">
             <input type="hidden" name="record_id" id="record_id">
             </div>
             <div class="col-lg-12 mt-3">
             <label for="name">Subject for classes 3 - 5</label>
             <select name="sub1" class="form-control" id="sub1" required>
                <?php
                    $subject = "SELECT * FROM `subject`";
                    $res_subject = mysqli_query($con, $subject);
                    while($row_sub1 = mysqli_fetch_array($res_subject)){
                ?>
                <option value="<?php echo $row_sub1['id']?>"><?php echo $row_sub1['name'];?></option>
                <?php
                    }
                ?>
                <option value="---">None</option>
             </select>
             </div>
             <div class="col-lg-12 mt-3">
             <label for="name">Subject for classes 6 - 10</label>
             <select name="sub2" class="form-control" id="sub2" required>
                <?php
                    $subject1 = "SELECT * FROM `subject`";
                    $res_subject1 = mysqli_query($con, $subject1);
                    while($row_sub2 = mysqli_fetch_array($res_subject1)){
                ?>
                <option value="<?php echo $row_sub2['id']?>"><?php echo $row_sub2['name'];?></option>
                <?php
                    }
                ?>
                <option value="---">None</option>
             </select>
             </div>

            </div>  
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-theme" name="update_term1">+ Update Exam</button>
        </div>
         </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="update_term2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Update Exam</h6>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="back.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-row">
            <div class="col-lg-12">
             <label for="name">Date</label>
             <input type="date" name="date2" id="date2" class="form-control">
             <input type="hidden" name="record_id2" id="record_id2">
             </div>
             <div class="col-lg-12 mt-3">
             <label for="name">Subject for classes 3 - 5</label>
             <select name="sub12" class="form-control" id="sub12" required>
                <?php
                    $subject = "SELECT * FROM `subject`";
                    $res_subject = mysqli_query($con, $subject);
                    while($row_sub1 = mysqli_fetch_array($res_subject)){
                ?>
                <option value="<?php echo $row_sub1['id']?>"><?php echo $row_sub1['name'];?></option>
                <?php
                    }
                ?>
                <option value="---">None</option>
             </select>
             </div>
             <div class="col-lg-12 mt-3">
             <label for="name">Subject for classes 6 - 10</label>
             <select name="sub22" class="form-control" id="sub22" required>
                <?php
                    $subject1 = "SELECT * FROM `subject`";
                    $res_subject1 = mysqli_query($con, $subject1);
                    while($row_sub2 = mysqli_fetch_array($res_subject1)){
                ?>
                <option value="<?php echo $row_sub2['id']?>"><?php echo $row_sub2['name'];?></option>
                <?php
                    }
                ?>
                <option value="---">None</option>
             </select>
             </div>

            </div>  
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-theme" name="update_term2">+ Update Exam</button>
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
        data: {id: id, update: "term1"}, 
        success: function(result){
          var data = JSON.parse(result)
          $("#date").val(data['date'])
          $("#sub1").val(data['sub1'])
          $("#sub2").val(data['sub2'])   
          $("#record_id").val(data['id'])
        }
      });
    }
    function sendUpdate2(id){
      $.ajax({
        url: "back.php",
        method: "POST",
        data: {id: id, update: "term2"}, 
        success: function(result){
          var data = JSON.parse(result)
          $("#date2").val(data['date'])
          $("#sub12").val(data['sub1'])
          $("#sub22").val(data['sub2'])   
          $("#record_id2").val(data['id'])
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
