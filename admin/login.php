<!DOCTYPE html>
<html lang="en">

<head>

  
  <title>vAdmin - Login</title>

  <?php include 'includes/head.php';?>

</head>

<body>

  <div class="row justify-content-center topiconbar">
      <h3 class="colorblack"><span class="colortheme">Admin - </span>Lonavla Weekend</h3>
    </div>
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-6 col-xl-6 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5 logincard">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
                  </div>
                 <form  class="" method="POST" action="back.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email and password with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
 
  <button type="submit" name="login" class="btn btn-primary">Submit</button>
</form>
                  

                </div>
                <a href="../index.php"><button type="submit" name="login" class="btn btn-primary">Back To Website</button></a><br><br><br>
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
                          <p class="warningtext"><i class="far fa-times-circle"></i> Unregistered User!</p>
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
                <div class="card o-hidden border-0 shadow-lg my-5 logincard warningyellow">
                <div class="card-body p-0">
                  <!-- Nested Row within Card Body -->
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="warning">
                        <div class="text-left">
                          <p class="warningtext"><i class="far fa-times-circle"></i> Please Enter correct password!</p>
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
