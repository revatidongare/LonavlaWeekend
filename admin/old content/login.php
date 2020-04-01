<!DOCTYPE html>
<html lang="en">

<head>

  
  <title>vAdmin - Login</title>

  <?php include 'includes/head.php';?>

</head>

<body>

  <div class="row justify-content-center topiconbar">
      <h3 class="colorblack"><span class="colortheme">Admin - </span>Kaivalyadham Vidya Niketan</h3>
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
                  <form class="user" method="post" action="back.php">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                    </div>
                    <button href="index.html" type="submit" name="login" class="btn btn-primary btn-themecolor btn-user btn-block">
                      Login
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
