<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GPMS - Gate Pass Management System</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/stylebtn.css">
    <link rel="stylesheet" href="../css/styleform.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/card.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="images/favicon.png" />
  </head>
  <body style="text-align:center;">
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="col-md-4 grid-margin stretch-card" style="margin:0 33%;">
              <div class="card">
                <div class="card-body">
                  <label style="font-size: 22px;color:rgb(27, 143, 27);font-family:ariel;">STUDENT LOGIN</label>
                  <hr>
                  <label id="student"  style="color:red;"></label><br>
                  <form class="pt-3"  method="post">
                  
                    <div class="form-group" >
                      <input type="text" class="form-control form-control-lg" name="uname" id="exampleInputEmail1" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-lg" name="pword" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="mt-3">
                      <input type="submit" name="student" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" style="background-color: #28b928;border-color:#28b928;"value="SIGN IN" />
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
    <?php
include('../connect.php');
if(isset($_POST['student'])){
  $username=$_POST['uname'];
  $password=$_POST['pword'];
  $query2="SELECT * FROM studentlogin WHERE username='$username' AND password='$password'";
  $sql=mysqli_query($con,"SELECT * FROM student WHERE Password='$password'");
  $row=mysqli_fetch_array($sql);
  $result2=mysqli_query($con,$query2);
 $count2=mysqli_num_rows($result2);
 if($count2>0)
  {
     session_start();
     $_SESSION['Email']=$username;
     echo "<script>document.location='dashboard.php';</script>";
  }
  else
  {
   echo '<script>document.getElementById("student").innerHTML="Invalid login"</script>';
  }
   
}
 
?>
  </body>
</html>