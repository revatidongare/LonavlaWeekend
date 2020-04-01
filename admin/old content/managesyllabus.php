<?php
  session_start();

  if(!isset($_SESSION['admin'])){
    header('location:login.php');
  }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Kaivalyadham Vidya Niketan - Manage Splitup Syllabus</title>
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
                 <div class="col-xl-8 col-md-8 mb-4 mx-auto">
                   <p class="colortheme" style="letter-spacing: 3px;">MANAGE SPLIT UP SYLLABUS</p>
                 </div>
                 <div class="col-xl-2 col-md-2 mb-4 ">
                    <a href="#" class="btn btn-theme-outline" data-toggle="modal" data-target="#subject_count">+ Subject Count</a>
                 </div>
                 <div class="col-xl-2 col-md-2 mb-4 ">
                    <a href="#" class="btn btn-theme-outline" data-toggle="modal" data-target="#add_syllabus">+ Add Syllabus</a>
                 </div>
               </div>
               <?php 
                  if(isset($_GET['q'])){
                    $value = $_GET['q'];

                    if($value == 1){
                      ?>
                         <div class="alert alert-success" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Syllabus added successfully!
                        </div>
                      <?php
                    }
                    if($value == 'updated'){
                      ?>
                         <div class="alert alert-success" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Syllabus updated successfully!
                        </div>
                      <?php
                    }
                    if($value == 'deleted'){
                      ?>
                         <div class="alert alert-success" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Syllabus deleted successfully!
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
                                      <!--<th>ID</th>-->
                                      <th>Standard</th>
                                      <th>Subject</th>
                                      <th>Document</th>
                                      <th>Update</th>
                                      <th>Delete</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $query = "SELECT * FROM `splitup_syllabus`";
                                      $res = mysqli_query($con,$query);
                                      while ($row = mysqli_fetch_array($res)) {
                                    ?>
                                    <tr>
                                      <!--<td><?php echo $row['id'];?></td>-->
                                      <td>
                                        <?php echo $row['standard'];?>
                                      </td>
                                      <td>
                                      <?php 
                                        $c_id = $row['subject'];
                                        $category = "SELECT * FROM `subject` WHERE `id` = '$c_id'";
                                        $res_category = mysqli_query($con,$category);
                                        $row_category = mysqli_fetch_array($res_category);
                                        echo $row_category['name'];
                                      ?>
                                      </td>
                                     <td>
                                     <a href="docs/syllabus/<?php echo $row['image'];?>" target="_blank">View</a>
                                     </td>
                                      <td><button class="btn btn-theme" name="update" id="update" data-toggle="modal" data-target="#update_syllabus" onclick="sendUpdate(<?php echo $row['id']; ?>)">Update</button></td>
                                      <td><a class="btn btn-danger" href="delete.php?q=<?php echo $row['id'];?>&table_name=splitup_syllabus" >Delete</a></td>
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

<!-- subject count -->
  <div class="modal fade" id="subject_count" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="font-weight:bolder;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Specify no. of Subjects according to Class</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="back.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-row">
            <div class="col-lg-12">
                <label for="standard">Standard</label>
            </div>
            <div class="col-lg-12 ">
                <div class="form-row border m-1 p-1 ">
                    <label class="col-lg-4" for="first"> FIRST [ 1 ] </label>
                    <input class="col-lg-8" type="number" class="form-control" name="first" id="first" placeholder="Subject Count" required>
                </div>
                <div class="form-row border m-1 p-1 ">
                    <label class="col-lg-4" for="second"> SECOND [ 2 ] </label>
                    <input class="col-lg-8" type="number" class="form-control" name="second" id="second" placeholder="Subject Count" required>
                </div>
                <div class="form-row border m-1 p-1 ">
                    <label class="col-lg-4" for="third"> THIRD [ 3 ] </label>
                    <input class="col-lg-8" type="number" class="form-control" name="third" id="third" placeholder="Subject Count" required>
                </div>
                <div class="form-row border m-1 p-1 ">
                    <label class="col-lg-4" for="fourth"> FOURTH [ 4 ] </label>
                    <input class="col-lg-8" type="number" class="form-control" name="fourth" id="fourth" placeholder="Subject Count" required>
                </div>
                <div class="form-row border m-1 p-1 ">
                    <label class="col-lg-4" for="fifth"> FIFTH [ 5 ] </label>
                    <input class="col-lg-8" type="number" class="form-control" name="fifth" id="fifth" placeholder="Subject Count" required>
                </div>
                <div class="form-row border m-1 p-1 ">
                    <label class="col-lg-4" for="sixth"> SIXTH [ 6 ] </label>
                    <input class="col-lg-8" type="number" class="form-control" name="sixth" id="sixth" placeholder="Subject Count" required>
                </div>
                <div class="form-row border m-1 p-1 ">
                    <label class="col-lg-4" for="seventh"> SEVENTH [ 7 ] </label>
                    <input class="col-lg-8" type="number" class="form-control" name="seventh" id="seventh" placeholder="Subject Count" required>
                </div>
                <div class="form-row border m-1 p-1 ">
                    <label class="col-lg-4" for="eighth"> EIGHTH [ 8 ] </label>
                    <input class="col-lg-8" type="number" class="form-control" name="eighth" id="eighth" placeholder="Subject Count" required>
                </div>
                <div class="form-row border m-1 p-1 ">
                    <label class="col-lg-4" for="ninth"> NINTH [ 9 ] </label>
                    <input class="col-lg-8" type="number" class="form-control" name="ninth" id="ninth" placeholder="Subject Count" required>
                </div>
                <div class="form-row border m-1 p-1 ">
                    <label class="col-lg-4" for="tenth"> TENTH [ 10 ] </label>
                    <input class="col-lg-8" type="number" class="form-control" name="tenth" id="tenth" placeholder="Subject Count" required>
                </div>
            </div>
                <div class="mt-3 col-lg-12">
                    <label for="name">HINT :</label>
                    <label for="name">Total No of Subjects <b>1 to 5 = "8" , 6 to 8 = "9" , 9 and 10 = "7"</b></label>

                </div>
            </div>  
        </div>  
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-theme" name="subject_count">+ Subject Count</button>
        </div>
         </form>
      </div>
    </div>
  </div>
  
<!-- modal end-->

  <!-- Logout Modal-->
  <div class="modal fade" id="add_syllabus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Add New Photo (All fields mandatory)</h6>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="back.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-row">
            <div class="col-lg-12">
                <label for="standard">Standard</label>
                <input type="text" class="form-control" name="standard" placeholder="Enter standard.." required>
            </div>
               <div class="col-lg-12">
             <label for="name">Subject</label>
             <select name="subject" class="form-control" required>
               <option value="" selected>Choose any..</option>
               <?php 
                  $photo_select = "SELECT * FROM `subject`";
                  $result = mysqli_query($con,$photo_select);
                  while ($row_select = mysqli_fetch_array($result)) {
                    ?>
                    <option value="<?php echo $row_select['id']; ?>"><?php echo $row_select['name'];?></option>
                    <?php
                  }
               ?>
             </select>
             </div>
             <div class="col-lg-12 mt-3">
             <label for="name">Upload Document</label>
             <input type="file" name="image" class="form-control" required>
             </div>
            </div>  
            </div>  
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-theme" name="add_syllabus">+ Add Syllabus</button>
        </div>
         </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="update_syllabus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Update Photo</h6>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="back.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-row">
            <div class="col-lg-12">
                <label for="standard">Standard</label>
                <input type="text" class="form-control" name="standard" id="standard" placeholder="Enter standard.." required>
            </div>
               <div class="col-lg-12">
             <label for="name">Subject</label>
             <select name="subject" id="subject" class="form-control" required>
               <?php 
                  $photo_select = "SELECT * FROM `subject`";
                  $result = mysqli_query($con,$photo_select);
                  while ($row_select = mysqli_fetch_array($result)) {
                    ?>
                    <option value="<?php echo $row_select['id']; ?>"><?php echo $row_select['name'];?></option>
                    <?php
                  }
               ?>
             </select>
             </div>
             <div class="col-lg-12 mt-3">
             <label for="name">Upload Document</label>
             <input type="file" name="image" class="form-control">
             <input type="hidden" name="record_id" id="record_id">
             </div>
            </div> 
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-theme" name="update_syllabus">+ Update Photo</button>
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
        data: {id: id, update: "syllabus"}, 
        success: function(result){
          var data = JSON.parse(result)
          $("#standard").val(data['standard'])
          $("#subject").val(data['subject'])
          $("#record_id").val(data['id'])
        }
      });
    }
    $('#subject_count').on('shown.bs.modal', function sendSubjectUpdate(id){
        $.ajax({
        url: "back.php",
        method: "POST",
        data: {id: "1", update: "subject_count"}, 
        success: function(result){
          var data = JSON.parse(result)
          $("#first").val(data['first'])
          $("#second").val(data['second'])
          $("#third").val(data['third'])
          $("#fourth").val(data['fourth'])
          $("#fifth").val(data['fifth'])
          $("#sixth").val(data['sixth'])
          $("#seventh").val(data['seventh'])
          $("#eighth").val(data['eighth'])
          $("#ninth").val(data['ninth'])
          $("#tenth").val(data['tenth'])
          
        }
      });
    })
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
