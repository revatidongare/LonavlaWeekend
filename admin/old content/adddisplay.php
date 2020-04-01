<?php
  session_start();

  if(!isset($_SESSION['admin'])){
    header('location:login.php');
  }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>vAdmin - Dashboard</title>
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
                   <p class="colortheme" style="letter-spacing: 3px;">YOUR HEADLINE</p>
                 </div>
                 <div class="col-xl-2 col-md-2 mb-4 ">
                    <a href="#" class="btn btn-theme-outline" data-toggle="modal" data-target="#add_branch">+ Add Button</a>
                 </div>
               </div>
               <div class="row mt-3">
                 
               </div>
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
                                      <th>Pan</th>
                                      <th>Invoice No</th>
                                      <th>Details</th>
                                      <th>Update</th>
                                      <th>Delete</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $query = "SELECT * FROM `user` WHERE `historyflag` = 0";
                                      $res = mysqli_query($con,$query);
                                      while ($row = mysqli_fetch_array($res)) {
                                    ?>
                                    <tr>
                                      <td><?php echo $row['id'];?></td>
                                      <td><?php echo $row['name']; ?></td>
                                      <td><?php echo $row['pan']; ?></td>
                                      <td><?php echo $row['invoiceno']; ?></td>
                                      <td><a class="btn btn-success" href="addbill.php?q=<?php echo $row['id'];?>">Details</a></td>
                                      <td><button class="btn btn-theme" name="update" id="update" data-toggle="modal" data-target="#update_branch" onclick="sendUpdate(<?php echo $row['id']; ?>)">Update</button></td>
                                      <td><a class="btn btn-danger" href="delete.php?q=<?php echo $row['id'];?>&delete=user" >Delete</a></td>
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
  <div class="modal fade" id="add_branch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Add New Guest</h6>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="back.php" method="post">
        <div class="modal-body">
            <p class="colortheme text-center">Personal Details</p>
            <div class="form-row">
             <div class="col-lg-12">
             <label for="name">Guest Name</label>
             <input type="text" name="name" class="form-control" placeholder="Enter guest name.."  required>
             </div>
            </div>
            <div class="form-row mt-2">
             <div class="col-lg-12">
             <label for="name">PAN Number</label>
             <input type="text" name="pan" class="form-control" placeholder="Enter PAN number.."  required>
             </div>
            </div>
            <div class="form-row mt-2">
                <div class="col-lg-6">
                <label for="invoiceno">Invoice Number</label>
                <input type="text" name="invoiceno" class="form-control" placeholder="Enter invoice number.." required>
                </div>
                <div class="col-lg-6">
                <label for="invoicedate">Invoice Date</label>
                <input type="date" name="invoicedate" class="form-control" required>
                </div>  
            </div>
            <div class="form-row mt-2">
                <div class="col-lg-6">
                <label for="invoiceno">Arrival Date</label>
                <input type="date" name="adate" class="form-control" placeholder="Enter arrival date" required>
                </div>
                <div class="col-lg-6">
                <label for="invoicedate">Departure Date</label>
                <input type="date" name="ddate" class="form-control" placeholder="Enter departure date" required>
                </div>  
            </div>
            <div class="form-row mt-2">
                <div class="col-lg-6">
                <label for="nationality">Nationality</label>
                <input type="text" name="nationality" class="form-control" placeholder="Enter nationality" required>
                </div>
                <div class="col-lg-6">
                <label for="roomnights">Room Nights</label>
                <input type="number" name="roomnights" class="form-control" placeholder="Enter no of nights" required>
                </div>  
            </div>
            <div class="form-row mt-2">
                <div class="col-lg-6">
                <label for="invoiceno">Room Type</label>
                <input type="text" name="roomtype" class="form-control" placeholder="Enter room type.." required>
                </div>
                <div class="col-lg-6">
                <label for="invoicedate">Plan</label>
                <input type="text" name="plan" class="form-control" placeholder="Enter plan.." required>
                </div>  
            </div>
            <div class="form-row mt-2">
                <div class="col-lg-6">
                <label for="invoiceno">Check In</label>
                <input type="time" name="checkin" class="form-control" required>
                </div>
                <div class="col-lg-6">
                <label for="invoicedate">Check Out</label>
                <input type="time" name="checkout" class="form-control" required>
                </div>  
            </div>
            <p class="colortheme text-center mt-4">Bank Details</p>
            <div class="form-row mt-2">
                <div class="col-lg-6">
                <label for="invoiceno">Bank Name</label>
                <input type="text" name="bankname" class="form-control" placeholder="Enter bank name" required>
                </div>
                <div class="col-lg-6">
                <label for="invoicedate">Bank Account Number</label>
                <input type="text" name="bankacno" class="form-control" placeholder="Enter bank account no.." required>
                </div>  
            </div>
            <div class="form-row mt-2">
             <div class="col-lg-12">
             <label for="name">Bank IFSC</label>
             <input type="text" name="bankifsc" class="form-control" placeholder="Enter IFSC code.."  required>
             </div>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-theme" name="add_guest">+ Add Guest</button>
        </div>
         </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="update_branch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Update Guest</h6>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="back.php" method="post">
        <div class="modal-body">
            <p class="colortheme text-center">Personal Details</p>
            <div class="form-row">
             <div class="col-lg-12">
             <label for="name">Guest Name</label>
             <input type="text" name="name" id="name" class="form-control" placeholder="Enter guest name.."  required>
             </div>
            </div>
            <div class="form-row mt-2">
             <div class="col-lg-12">
             <label for="name">PAN Number</label>
             <input type="text" name="pan" id="pan" class="form-control" placeholder="Enter PAN number.."  required>
             </div>
            </div>
            <div class="form-row mt-2">
                <div class="col-lg-6">
                <label for="invoiceno">Invoice Number</label>
                <input type="text" name="invoiceno" id="invoiceno" class="form-control" placeholder="Enter invoice number.." required>
                </div>
                <div class="col-lg-6">
                <label for="invoicedate">Invoice Date</label>
                <input type="date" name="invoicedate" id="invoicedate" class="form-control" required>
                </div>  
            </div>
            <div class="form-row mt-2">
                <div class="col-lg-6">
                <label for="invoiceno">Arrival Date</label>
                <input type="date" name="adate" id="adate" class="form-control" placeholder="Enter arrival date" required>
                </div>
                <div class="col-lg-6">
                <label for="invoicedate">Departure Date</label>
                <input type="date" name="ddate" id="ddate" class="form-control" placeholder="Enter departure date" required>
                </div>  
            </div>
            <div class="form-row mt-2">
                <div class="col-lg-6">
                <label for="nationality">Nationality</label>
                <input type="text" name="nationality" id="nationality" class="form-control" placeholder="Enter nationality" required>
                </div>
                <div class="col-lg-6">
                <label for="roomnights">Room Nights</label>
                <input type="number" name="roomnights" id="roomnights" class="form-control" placeholder="Enter no of nights" required>
                </div>  
            </div>
            <div class="form-row mt-2">
                <div class="col-lg-6">
                <label for="invoiceno">Room Type</label>
                <input type="text" name="roomtype" id="roomtype" class="form-control" placeholder="Enter room type.." required>
                </div>
                <div class="col-lg-6">
                <label for="invoicedate">Plan</label>
                <input type="text" name="plan" id="plan" class="form-control" placeholder="Enter plan.." required>
                </div>  
            </div>
            <div class="form-row mt-2">
                <div class="col-lg-6">
                <label for="invoiceno">Check In</label>
                <input type="time" name="checkin" id="checkin" class="form-control" required>
                </div>
                <div class="col-lg-6">
                <label for="invoicedate">Check Out</label>
                <input type="time" name="checkout" id="checkout" class="form-control" required>
                </div>  
            </div>
            <p class="colortheme text-center mt-4">Bank Details</p>
            <div class="form-row mt-2">
                <div class="col-lg-6">
                <label for="invoiceno">Bank Name</label>
                <input type="text" name="bankname" id="bankname" class="form-control" placeholder="Enter bank name" required>
                </div>
                <div class="col-lg-6">
                <label for="invoicedate">Bank Account Number</label>
                <input type="text" name="bankacno" id="bankacno" class="form-control" placeholder="Enter bank account no.." required>
                </div>  
            </div>
            <div class="form-row mt-2">
             <div class="col-lg-12">
             <label for="name">Bank IFSC</label>
             <input type="text" name="bankifsc" id="bankifsc" class="form-control" placeholder="Enter IFSC code.."  required>
             <input type="hidden" name="userid" id="userid">
             </div>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-theme" name="update_guest">+ Update Guest</button>
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
        data: {id: id, update: "guest"}, 
        success: function(result){
          var data = JSON.parse(result)
          $("#name").val(data['name'])
          $("#pan").val(data['pan'])
          $("#invoiceno").val(data['invoiceno'])
          $("#invoicedate").val(data['invoicedate'])
          $("#adate").val(data['adate'])
          $("#ddate").val(data['ddate'])
          $("#nationality").val(data['nationality'])
          $("#roomnights").val(data['roomnights'])
          $("#roomtype").val(data['roomtype'])
          $("#plan").val(data['plan'])
          $("#checkin").val(data['checkin'])
          $("#checkout").val(data['checkout'])
          $("#bankname").val(data['bankname'])
          $("#bankacno").val(data['bankacno'])
          $("#bankifsc").val(data['bankifsc'])
          //$("#plan").val(data['plan'])
          $("#userid").val(data['id'])
        }
      });
    }
  </script>

</body>

</html>
