<?php
  session_start();

  if(!isset($_SESSION['admin'])){
    header('location:../index.php');
  }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title> Admin - Manage price</title>
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
        <div class="container-fluid actualcontent mb-5">
          <!-- Page Heading -->
          <div class="row mt-3">
            <div class="col-xl-8 col-md-8 mb-4 mx-auto">
              <p class="colortheme" style="letter-spacing: 3px;">MANAGE PRICES</p>
              <!-- <p  style="letter-spacing: 3px; color:red;"><b>*** AT A TIME ONLY ONE OFFER SHOULD BE ACTIVE. ***</b></p> -->
             
           </div>
              <div class="col-xl-2 col-md-2 mb-4 ">
                <a href="#" class="btn btn-theme-outline" data-toggle="modal" data-target="#add_offer">+ Add Prices</a>
              </div>
          </div>
          <!--Alert Script-->
          <?php 
                  if(isset($_GET['q'])){
                    $value = $_GET['q'];

                    if($value == 1){
                      ?>
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Category added successfully!
          </div>
          <?php
                    }
                     if($value == 6){
                      ?>
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           offer added successfully!
          </div>
          <?php
                    }
                    if($value == 'update'){
                      ?>
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             Updated successfully!
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
          <div class="row mt-3">
            <div class="col-xl-12 col-md-10 mb-4 mx-auto">
              <div class="card shadow mb-4">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th class="font-weight-bolder">ID</th>
                          <th class="font-weight-bolder">Name</th>
                          <th class="font-weight-bolder">Description</th>
                          <th class="font-weight-bolder">Room Rate</th>
                          <th class="font-weight-bolder">Weekend Rate</th>
                          <th class="font-weight-bolder text-center">Update</th>
                          <th class="font-weight-bolder text-center">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php     
                             $query = "SELECT * FROM `room_type`";
                             include 'config.php';
                             $stmt=$conn->prepare($query);
                             $stmt->execute();
                             $res=$stmt->fetchAll();
                             $conn=null;
                             $id=0;
                              foreach($res as $row){
                           ?>

                        <tr>
                          <td><?php echo $row['id'];?></td>
                          <td><?php echo $row['name'];?></td>
                          <td><?php echo $row['description'];?></td>
                          <td><?php echo $row['room_rate']; ?></td>
                          <td><?php echo $row['weekend_rate'];?></td>
                         
                          <td class="text-center"><button class="btn btn-theme" name="update" id="update" data-toggle="modal" data-target="#update_offer" onclick="sendUpdate(<?php echo $row['id']; ?>)">Update</button></td>
                          
                          <td class="text-center"><a class="btn btn-danger" href="delete.php?q=<?php echo $row['id'];?>&table_name=room_type">Delete</a></td>
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

  <!-- Add offer modal-->

   <div class="modal fade" id="add_offer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document" style="max-width: 1000px; margin:10px auto;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><b>Add Room Rate</b></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="back.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="row" style="text-align: left;line-height:3rem;">
              <div class="col-6">
                 <b><label for="name">Room type</label></b>
                <input type="text" name="name"  class="form-control" placeholder="Enter Room Type">  
              </div>
              <div class="col-6">
               <b> <label for="name">Description</label></b>
                <input type="text" name="description"  class="form-control" placeholder="Enter Description">
              </div>
              
              <div class="col-6">
               <b> <label for="name">Room Rate</label></b>
                <input type="text" name="room_rate"  class="form-control" placeholder="Enter room_rate">
              </div>
              
             <div class="col-6">
                <b><label for="name">Weekend Rate</label></b>
                 <input type="text" name="weekend_rate"  class="form-control" placeholder="Enter weekend_rate">
            </div>
            
            </div>                       
        </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-theme" name="add_offer">+ Add Prices</button>
          </div>
           </form>
        </div>
      </div>
    </div>

<!-- UPDATE offer modal-->
    <div class="modal fade" id="update_offer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document" style="max-width: 1000px; margin:10px auto;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><b>UPDATE </b></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
        
          <form action="back.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="row" style="text-align: left;line-height:3rem;">
              <div class="col-6">

                 <b><label for="name">Room type</label></b>
                <input type="text" name="name" id="upname" class="form-control" placeholder="Enter Room Type">  
              </div>
              <div class="col-6">
               <b> <label for="name">Description</label></b>
                <input type="text" name="description" id="descriptionup" class="form-control" placeholder="Enter Description">
              </div>
              
              <div class="col-6">
               <b> <label for="name">Room Rate</label></b>
                <input type="text" name="room_rate" id="roomrateup" class="form-control" placeholder="Enter room_rate">
              </div>
              
             <div class="col-6">
                <b><label for="name">Weekend Rate</label></b>
                 <input type="text" name="weekend_rate" id="weekendrateup" class="form-control" placeholder="Enter weekend_rate">
                <input type="hidden" name="id" id="idup">
            </div>
             
            </div>                       
        </div>
         <!-- <?php 
          // echo $id;
          // echo $weekend_rate;
          // echo $room_rate;
          ?>  -->
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-theme" name="update_offername">Update</button>
          </div>
           </form>
        </div>
      </div>
    </div>

 
  <?php include 'includes/script.php';?>
  
    <script>
    function sendUpdate(id) {
      $.ajax({
        url: "back.php",
        method: "POST",
        data: { id:id, update: "update_offer" },
        success: function(result) {
          var data = JSON.parse(result)
          $("#upname").val(data['name'])
          $("#descriptionup").val(data['description'])
           $("#roomrateup").val(data['room_rate'])
          $("#weekendrateup").val(data['weekend_rate'])
          $("#idup").val(data['id']);
          
        }
      });
    }

  </script>

  <script type="text/javascript">
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 4000);

  </script>

</body>

</html>
