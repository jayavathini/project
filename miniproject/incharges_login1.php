<?php
    include('connect.php');
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GPMS - Gate Pass Management System</title>
    <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/stylebtn.css">
    <link rel="stylesheet" href="css/styleform.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/card.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="images/favicon.png" />
  </head>
  <body style="text-align:center;">
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row"  style="width:100%;margin:4.5% 3% 4.5% 11%;">
            <div class="col-md-4 grid-margin stretch-card" style="margin:5%;">
              <div class="card" >
                <div class="card-body">
                  <label style="font-size: 22px;color:rgb(27, 143, 27);font-family:ariel;">HOSTEL INCHARGES</label>
                  <hr>
                  <label id="warden1" style="color:red;" > </label>
                  <form class="pt-3"  method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-lg" name="uname" id="exampleInputEmail1" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-lg" name="pword" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="mt-3">
                      <input type="submit" name="warden"style="background-color: #28b928;border-color:#28b928;" id="warden"class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN IN"/>
                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">
                      <div class="form-check">
                        
                      </div>
                      <a href="#" class="auth-link text-black">Forgot password?</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card" style="margin:5%;">
            <div class="card" >
                <div class="form">
                <div class="card-body">
                  <label style="font-size: 22px;color:rgb(27, 143, 27);font-family:ariel;">FACULTY INCHARGES</label>
                  <hr>
                  <label id="faculty1"  style="color:red;"></label><br>
                  <form class="pt-3"  method="POST" name="gprform">
                      <div class="form-group">
                      <input type="text" class="form-control form-control-lg" name="uname" id="exampleInputEmail1" placeholder="Username">
                    </div>
                    <div class="form-group">  
                      <input type="password" class="form-control form-control-lg" name="pword" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="mt-3">
                      <input type="submit" name="faculty" style="background-color: #28b928;border-color:#28b928;" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN IN" />
                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        
                        </div>
                         <a href="#" class="auth-link text-black">Forgot password?</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
         </div>
      </div>
    </div>
    <?php
    if(isset($_POST['warden'])){
      $username=$_POST['uname'];
      $password=$_POST['pword'];
      $query="SELECT * FROM hostelinchargelogin WHERE username='$username' AND password='$password'";
      $result=mysqli_query($con,$query);
      $count=mysqli_num_rows($result);
      if($count>0)
      {
        session_start();
        $SESSION['username']=$username;
       echo "<script>document.location='hostelincharge/dashboard.php';</script>";
        
      }
      else
      {
        echo"<script>document.getElementById('warden1').innerHTML='Invalid Login'</script>";
      }
    }
     
      
    if(isset($_POST['faculty'])){
      $username=$_POST['uname'];
      $password=$_POST['pword'];
      $query1="SELECT * FROM facultyinchargelogin WHERE username='$username' AND password='$password'";
      $result1=mysqli_query($con,$query1);
     $count1=mysqli_num_rows($result1);
     
     if($count1>0)
      {
        session_start();
        $SESSION['username']=$username;
       echo "<script>document.location='faculty/incharges_dashboard.php';</script>";
        
      }
      else
      {
       echo '<script>document.getElementById("faculty1").innerHTML="Invalid login"</script>';
      }
    }
 
  
?>
  </body>
</html>