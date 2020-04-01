<?php
  session_start();

  if(!isset($_SESSION['admin'])){
    header('location:login.php');
  }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Kaivalyadham Vidya Niketan - Manage Fees Structure</title>
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
                   <p class="colortheme" style="letter-spacing: 3px;">MANAGE FEES STRUCTURE</p>
                 </div>
                 <div class="col-xl-2 col-md-2 mb-4 ">
                    <a href="#" class="btn btn-theme-outline" data-toggle="modal" data-target="#add_fees">+ Add Fees</a>
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
                                      <th>Title</th>
                                      <th>Nur</th>
                                      <th>Jr. kg</th>
                                      <th>Sr. Kg</th>
                                      <th>1st</th>
                                      <th>2nd</th>
                                      <th>3rd</th>
                                      <th>4th</th>
                                      <th>5th</th>
                                      <th>6th</th>
                                      <th>7th</th>
                                      <th>8th</th>
                                      <th>9th</th>
                                      <th>10th</th>
                                      <th>Update</th>
                                      <th>Delete</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $query = "SELECT * FROM `fees_structure`";
                                      $res = mysqli_query($con,$query);
                                      while ($row = mysqli_fetch_array($res)) {
                                    ?>
                                    <tr>
                                      <td><?php echo $row['title'];?></td>
                                      <td><?php echo $row['nur'];?></td>
                                      <td><?php echo $row['jkg'];?></td>
                                      <td><?php echo $row['skg'];?></td>
                                      <td><?php echo $row['first'];?></td>
                                      <td><?php echo $row['second'];?></td>
                                      <td><?php echo $row['third'];?></td>
                                      <td><?php echo $row['fourth'];?></td>
                                      <td><?php echo $row['fifth'];?></td>
                                      <td><?php echo $row['sixth'];?></td>
                                      <td><?php echo $row['seventh'];?></td>
                                      <td><?php echo $row['eighth'];?></td>
                                      <td><?php echo $row['ninth'];?></td>
                                      <td><?php echo $row['tenth'];?></td>
                                      <td><button class="btn btn-theme" name="update" id="update" data-toggle="modal" data-target="#update_fees" onclick="sendUpdate(<?php echo $row['id']; ?>)">Update</button></td>
                                      <td><a class="btn btn-danger" href="delete.php?q=<?php echo $row['id'];?>&table_name=fees_structure" >Delete</a></td>
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
  <div class="modal fade" id="add_fees" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <label for="standard">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Enter title.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for Nursurey</label>
                <input type="number" class="form-control" name="nur" placeholder="Enter fees.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for Jr.Kg</label>
                <input type="number" class="form-control" name="jrkg" placeholder="Enter fees.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for Sr.Kg</label>
                <input type="number" class="form-control" name="srkg" placeholder="Enter fees.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for 1st</label>
                <input type="number" class="form-control" name="first" placeholder="Enter fees.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for 2nd</label>
                <input type="number" class="form-control" name="second" placeholder="Enter fees.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for 3rd</label>
                <input type="number" class="form-control" name="third" placeholder="Enter fees.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for 4th</label>
                <input type="number" class="form-control" name="fourth" placeholder="Enter fees.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for 5th</label>
                <input type="number" class="form-control" name="fifth" placeholder="Enter fees.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for 6th</label>
                <input type="number" class="form-control" name="sixth" placeholder="Enter fees.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for 7th</label>
                <input type="number" class="form-control" name="seventh" placeholder="Enter fees.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for 8th</label>
                <input type="number" class="form-control" name="eighth" placeholder="Enter fees.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for 9th</label>
                <input type="number" class="form-control" name="ninth" placeholder="Enter fees.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for 10th</label>
                <input type="number" class="form-control" name="tenth" placeholder="Enter fees.." required>
            </div>
            </div>  
            </div>  
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-theme" name="add_fees">+ Add Fees</button>
        </div>
         </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="update_fees" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <label for="standard">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Enter title.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for Nursurey</label>
                <input type="number" class="form-control" name="nur" id="nur" placeholder="Enter fees.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for Jr.Kg</label>
                <input type="number" class="form-control" name="jrkg" id="jrkg" placeholder="Enter fees.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for Sr.Kg</label>
                <input type="number" class="form-control" name="srkg" id="srkg" placeholder="Enter fees.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for 1st</label>
                <input type="number" class="form-control" name="first" id="first" placeholder="Enter fees.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for 2nd</label>
                <input type="number" class="form-control" name="second" id="second" placeholder="Enter fees.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for 3rd</label>
                <input type="number" class="form-control" name="third" id="third" placeholder="Enter fees.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for 4th</label>
                <input type="number" class="form-control" name="fourth" id="fourth" placeholder="Enter fees.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for 5th</label>
                <input type="number" class="form-control" name="fifth" id="fifth" placeholder="Enter fees.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for 6th</label>
                <input type="number" class="form-control" name="sixth" id="sixth" placeholder="Enter fees.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for 7th</label>
                <input type="number" class="form-control" name="seventh" id="seventh" placeholder="Enter fees.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for 8th</label>
                <input type="number" class="form-control" name="eighth" id="eighth" placeholder="Enter fees.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for 9th</label>
                <input type="number" class="form-control" name="ninth" id="ninth" placeholder="Enter fees.." required>
            </div>
            <div class="col-lg-6">
                <label for="standard">Fees for 10th</label>
                <input type="number" class="form-control" name="tenth" id="tenth" placeholder="Enter fees.." required>
                <input type="hidden" name="record_id" id="record_id">
            </div>
            </div> 
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-theme" name="update_fees">+ Update Fees</button>
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
        data: {id: id, update: "fees"}, 
        success: function(result){
          var data = JSON.parse(result)
          $("#title").val(data['title'])
          $("#nur").val(data['nur'])
          $("#jrkg").val(data['jkg'])
          $("#srkg").val(data['skg'])
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
