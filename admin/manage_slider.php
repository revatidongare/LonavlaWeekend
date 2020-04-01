<?php
  session_start();

  if(!isset($_SESSION['admin'])){
    header('location:login.php');
  }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin - Manage Slider</title>
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
                   <p class="colortheme" style="letter-spacing: 3px;">MANAGE SLIDER</p>

                   <!-- <div class="col-lg-6 col-md-4"><b>Guidelines To Update Slider:</b><br>
                   1) Click on <b>Update </b> button<br>
2) Fill all the fields and select the file<br>**FILE SHOULD NOT BE in MB <br>
3) BEFORE ADDING IMAGE Please Do Following Process:<br>
    * Open Google.co.in -> Search https://tinypng.com/ <br>
    * Click on Drop image ( Upto 20 image )<br>
    * Click On download <br>
    Then Upload the image <br>
4) Then click on Update to upload the content.</div>
 -->
                 </div>
                 <div class="col-xl-2 col-md-2 mb-4 ">
                    <a href="#" class="btn btn-theme-outline" data-toggle="modal" data-target="#add_slider">+ Add Slider</a>
                 </div>
               </div>
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
                          Slider updated successfully!
                        </div>
                      <?php
                    }
                    if($value == 'deleted'){
                      ?>
                         <div class="alert alert-success" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Slider deleted successfully!
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
                                      <th>Title</th>
                                      <th>Description</th>
                                      <th>Image</th>
                                      <th>Update</th>
                                      <!-- <th>Active/Inactive</th> -->
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $query = "SELECT * FROM `slider` WHERE 1";
                                      $stmt=$conn->prepare($query);
                             $stmt->execute();
                             $res=$stmt->fetchAll();
                             $conn=null;
                             $id=0;
                              foreach($res as $row){
                                    ?>
                                    <tr>
                                      <td><?php echo $row['slider_id'];?></td>
                                      <td><?php echo $row['title']; ?></td>
                                      <td><?php echo $row['description']; ?></td>
                                      <td>
                                        <img src="../img/slider/<?php echo $row['image'];?>" alt="Image" width="100" height="100">
                                      </td>
                                      <td><button class="btn btn-theme" name="update" id="update" data-toggle="modal" data-target="#update_slider" onclick="sendUpdate(<?php echo $row['slider_id']; ?>)">Update</button></td>
                                     <!--<td class="text-center">
                            <?php  
                                  $flag = $row['flag'];
                                  if($flag == 1){
                                    ?>
                                        <a class="btn btn-success" href="active.php?q=<?php echo $row['slider_id'];?>&table_name=slider&status=active" >Active</a>
                                    <?php
                                  }else{
                                    ?>
                                        <a class="btn btn-warning" href="active.php?q=<?php echo $row['slider_id'];?>&table_name=slider&status=inactive" >Inactive</a>
                                    <?php
                                  }
                             ?>
                          </td>-->
                                      <!-- <td><a class="btn btn-danger" href="delete.php?q=<?php echo $row['slider_id'];?>&table_name=slider" >Delete</a></td> -->
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
  <div class="modal fade" id="add_slider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Add New Slider</h6>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="back.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-row">
             <div class="col-lg-12">
             <label for="name">Title</label>
             <input type="text" name="title" class="form-control" placeholder="Enter title"  required>
             </div>
            </div>
            <div class="form-row mt-2">
             <div class="col-lg-12">
             <label for="name">Description</label>
             <input type="text" name="description" class="form-control" placeholder="Enter description"  required>
             </div>
            </div>
            <div class="form-row mt-2">
             <div class="col-lg-12">
             <label for="name">Upload Image (1680px * 815px)</label>
             <input type="file" name="image" class="form-control" required>
             </div>
            </div>   
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-theme" name="add_slider">+ Add Slider</button>
        </div>
         </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="update_slider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Update Slider</h6>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="back.php" method="post"  enctype="multipart/form-data">
        <div class="modal-body">
            <p class="colortheme text-center">Manage Slider</p>
            <div class="form-row">
             <div class="col-lg-12">
             <label for="name">Title</label>
             <input type="text" name="title" id="titleup" class="form-control" placeholder="Enter title"  required>
             </div>
            </div>
            <div class="form-row mt-2">
             <div class="col-lg-12">
             <label for="name">Description</label>
             <input type="text" name="description" id="descriptionup" class="form-control" placeholder="Enter description"  required>
             </div>
            </div>
            <div class="form-row mt-2">
             <div class="col-lg-12">
             <label for="name">Upload Image (1680px * 815px)</label>
             <input type="file" name="image" id="imageup" class="form-control">
             <input type="hidden" name="id" id="idup">
             </div>
            </div> 
        </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-theme" name="update_slidername">Update Slider</button>
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
        data: {id: id, update: "update_slider"}, 
        success: function(result){
          var data = JSON.parse(result)
          $("#titleup").val(data['title'])
         $("#idup").val(data['slider_id'])
          $("#descriptionup").val(data['description'])
           $("#imageup").val(data['image']) ;
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
