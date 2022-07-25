<?php
  	session_start();
  	if(isset($_SESSION['mst_user'])){
    	header('location: material-dashboard-master/pages/dashboard.php');
  	}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    LMS Sign-in
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <!-- <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.2" rel="stylesheet" /> -->

  <link id="pagestyle" href="material-dashboard-master/assets/css/material-dashboard.css" rel="stylesheet" />


</head>

<body class="bg-gray-200">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">

        <!-- Navbar -->
        <div class="collapse navbar-collapse" id="navigation">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                href="../pages/dashboard.php">
                <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-2" href="../pages/profile.php">
                <i class="fa fa-user opacity-6 text-dark me-1"></i>
                Profile
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-2" href="sign-up.php">
                <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                Sign Up
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-2" href="index.php">
                <i class="fas fa-key opacity-6 text-dark me-1"></i>
                Sign In
              </a>
            </li>
          </ul>
         
        </div>
      </div>
      </nav>
      <!-- End Navbar -->
    </div>
  </div>
  </div>
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100"
      style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Library Management System</h4>
                  <div class="row mt-3">
                    <div class="col-2 text-center ms-auto">
                  
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">

                <form action="loginConnection.php" class="text-start" method="post">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <input type="text" class="form-control" id="txtEmail_Phone" name="txtEmail_Phone"
                      placeholder="Email or Phone No" required="required">
                  </div>


                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label"></label>
                    <input type="password" class="form-control" id="Password" name="Password" placeholder="Password"
                      required="required">
                  </div>
                  <div>

                
                  <?php
                    include "dbs/dbs_connectivity.php";
                    // $result='';

                    if (isset($_POST['but_submit'])) {
                      

                     $email_Id_Phone_no = mysqli_real_escape_string($con, $_POST['txtEmail_Phone']);
                     $password = mysqli_real_escape_string($con, $_POST['Password']);

                     if ($email_Id_Phone_no != "" && $password != "") {

                       $sql_query = "select count(*) as mst_user_id from mst_user where email_id='" . $email_Id_Phone_no . "' and password='" . $password . "'";
                        $result = mysqli_query($con, $sql_query);
                        $row = mysqli_fetch_array($result);

                        $count = $row['mst_user_id'];

                              if ($count > 0) {
                             $result = "Login Successful";
                               header("Location: material-dashboard-master/pages/dashboard.php");

                               // header("Location: material-dashboard-master/pages/dashboard.php"); 
                                  exit;

                                     }
                                      else {


                                  $result = "Incorrect password";
                         
                             


                                   }

                                  }
    
                                   }

                            echo isset($result)  ;


                                  ?>

                  </div>
                  <div class="text-center">

                    <input type="submit" value="Sign-in" name="but_submit" id="but_submit"
                      class="btn bg-gradient-primary w-100 my-4 mb-2"  />



                  </div>
                  <p class="mt-4 text-sm text-center">
                    Don't have an account?
                    <a href="sign-up.php" class="text-primary text-gradient font-weight-bold">Sign up</a>
                  </p>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>

      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
              <div class="copyright text-center text-sm text-white text-lg-start">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart" aria-hidden="true"></i> by
                <a href="https://www.linkedin.com/in/shanjeevi-ck/" class="font-weight-bold text-white"
                  target="_blank">Shanjeevi CK of </a>
                Rnd Softech and please visit my website.
              </div>
            </div>

          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.2"></script>
</body>

</html>