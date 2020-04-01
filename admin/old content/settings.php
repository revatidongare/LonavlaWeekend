<?php
  include 'config.php';
  session_start();

  if(!isset($_SESSION['user_email'])){
    header('location:login.php');
  }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

  
  <title>vEngineering - Login</title>

  <?php include 'includes/head.php';?>

</head>

<body>

  <div class="row justify-content-center topiconbar">
      <h3 class="colorblack"><span class="colortheme">V</span>Engineering</h3>
    </div>
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-6 col-xl-6 col-md-9">
        <?php
          $email = $_SESSION['user_email'];
          $login = "SELECT * FROM `registered_users` WHERE `email` = '$email'";
          $res_login = mysqli_query($con,$login);
          $row_login = mysqli_fetch_array($res_login);

          $branch = $row_login['branch'];

          $user_year = $row_login['year'];

        ?>

        <div class="card o-hidden border-0 my-5 logincard">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Update Details</h1>
                  </div>
                  <form class="user" action="back.php" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="fname" aria-describedby="emailHelp" value="<?php echo $row_login['fname'];?>" required="required">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="lname" value="<?php echo $row_login['lname'];?>" required="required">
                    </div>
                    <div class="form-group">
                      <select name="branch" class="form-control form-control-user" required="required">
                        <?php
                            $branch = "SELECT * FROM `branch_master` WHERE `id` = '$branch'";
                            $res_branch = mysqli_query($con,$branch);
                            $row = mysqli_fetch_array($res_branch);
                        ?>
                        <option value="<?php echo $row['id'];?>" selected><?php echo $row['branch'];?></option>
                        <?php
                          
                            $branch = "SELECT * FROM `branch_master` WHERE 1";
                            $res_branch = mysqli_query($con,$branch);
                            while ($row = mysqli_fetch_array($res_branch)) {
                            ?>
                            <option value="<?php echo $row['id'];?>"><?php echo $row['branch'];?></option>
                            <?php
                            }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <select name="year" class="form-control form-control-user" required="required">
                        <?php

                          $year_2 = "SELECT * FROM `year_master` WHERE `id` = '$user_year'";
                          $res_year = mysqli_query($con,$year_2);
                          $row_year = mysqli_fetch_array($res_year);

                        ?>
                        <option value="<?php echo $row_year['id'];?>" selected><?php echo $row_year['year'];?></option>
                        <?php

                            $branch = "SELECT * FROM `year_master` WHERE 1";
                            $res_branch = mysqli_query($con,$branch);
                            while ($row = mysqli_fetch_array($res_branch)) {
                            ?>
                            <option value="<?php echo $row['id'];?>"><?php echo $row['year'];?></option>
                            <?php
                            }
                            mysqli_close($con);
                        ?>
                      </select>
                    </div>
                    <input type="hidden" name="email" value="<?php echo $email;?>">
                    <!-- <a href="#" type="submit" class="btn btn-primary btn-themecolor btn-user btn-block">
                      Login
                    </a> -->
                   <button type="submit" name="update_details" class="btn btn-primary btn-themecolor btn-user btn-block">
                     Save Details
                   </button>
                  </form>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
          if(isset($_GET['q'])){
            if($_GET['q'] == 2){
              ?>
              <div class="card o-hidden border-0 shadow-lg my-5 logincard warningback">
                <div class="card-body p-0">
                  <!-- Nested Row within Card Body -->
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="warning">
                        <div class="text-left">
                          <p class="warningtext"><i class="far fa-times-circle"></i> Error in updating details!</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            }
            if($_GET['q'] == 1){
              ?>
                <div class="card o-hidden border-0 shadow-lg my-5 logincard warninggreen">
                <div class="card-body p-0">
                  <!-- Nested Row within Card Body -->
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="warning">
                        <div class="text-left">
                          <p class="warningtext"><i class="fas fa-check-circle"></i> Changes saved successfully!</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            }
          }
        ?>
        
      </div>
    </div>

    <div class="row justify-content-center">

      <div class="col-lg-6 col-xl-6 col-md-9">
      
        <div class="card o-hidden border-0 my-2 logincard">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Change Password</h1>
                  </div>
                  <form class="user" action="back.php" method="post">
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="opass" aria-describedby="emailHelp" placeholder="Enter Old Password.." required="required">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="npass" placeholder="New Password.." required="required">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="cpass" placeholder="Confirm Password" required="required">
                    </div>
                    <input type="hidden" name="email" value="<?php echo $email;?>">
                    <!-- <a href="#" type="submit" class="btn btn-primary btn-themecolor btn-user btn-block">
                      Login
                    </a> -->
                   <button type="submit" name="change_pass" class="btn btn-primary btn-themecolor btn-user btn-block">
                     Change Password
                   </button>
                  </form>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
          if(isset($_GET['q'])){
            if($_GET['q'] == 4){
              ?>
              <div class="card o-hidden border-0 shadow-lg my-5 logincard warningback">
                <div class="card-body p-0">
                  <!-- Nested Row within Card Body -->
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="warning">
                        <div class="text-left">
                          <p class="warningtext"><i class="far fa-times-circle"></i> Error in updating details!</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            }
            if($_GET['q'] == 5){
              ?>
              <div class="card o-hidden border-0 shadow-lg my-5 logincard warningback">
                <div class="card-body p-0">
                  <!-- Nested Row within Card Body -->
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="warning">
                        <div class="text-left">
                          <p class="warningtext"><i class="far fa-times-circle"></i> Please confirm your password!</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            }
            if($_GET['q'] == 6){
              ?>
              <div class="card o-hidden border-0 shadow-lg my-5 logincard warningback">
                <div class="card-body p-0">
                  <!-- Nested Row within Card Body -->
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="warning">
                        <div class="text-left">
                          <p class="warningtext"><i class="far fa-times-circle"></i> Enter correct old password!</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            }
            if($_GET['q'] == 3){
              ?>
                <div class="card o-hidden border-0 shadow-lg my-5 logincard warninggreen">
                <div class="card-body p-0">
                  <!-- Nested Row within Card Body -->
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="warning">
                        <div class="text-left">
                          <p class="warningtext"><i class="fas fa-check-circle"></i> Password changed successfully!</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            }
          }
        ?>
        
      </div>
    </div>

  </div>

  <?php include 'includes/script.php';?>

</body>

</html>
