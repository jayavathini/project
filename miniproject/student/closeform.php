<?php
    session_start();
    include('../connect.php');
    if(!isset($_SESSION['Email'])){
        header("loction:index.php");
    }
    $email=$_SESSION['Email'];
    $sql=mysqli_query($con,"SELECT * FROM student WHERE Email='$email'");
    $row=mysqli_fetch_array($sql);
?>
<html>
    <head>
        <title>GPMS - Gate Pass Management System</title>
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
        <link href="../style1.css" rel="stylesheet">
        <link href="gatepassform.css" rel="stylesheet">
        <style>
            a{
                font-size:15px;
                padding:5px;
                
            }

            input[type=submit]{
                cursor: pointer;
                margin:0% 40%;
                padding:5% 10%;
                
            }
            .form-1{
                padding-bottom:50px;
            }
            #menu .pages li:nth-child(2){
                 border-left:2px solid white;
            }
            #menu .pages li:nth-child(1){
                 border:none;
            }
        </style>

    </head>
    <body>
        <section id="menu">
            <div class="head">
                <img src="../images/favicon.png">
                <h1>GPMS</h1>
            </div>
            <div class="pages">
                <li><i class='bx bxs-dashboard'></i><a href="dashboard.php">Dashboard</a></li>
                <?php 
                if($row['status']=='Hostel'){
                    echo "<li><i class='bx bx-git-pull-request'></i><a href='gatepassforms.php'>Gate pass form</a></li>";
                }
                else{
                    echo "<li><i class='bx bx-git-pull-request'></i><a href='closeform.php'>Gate pass form</a></li>";
                   
                }?>
                                <li><i class='bx bxs-face'></i><a href='formstatus1.php'>Form Status</a></li>
                <li><i class='bx bxs-pie-chart'></i><a href='profile.php'>Profile Details</a></li>
                <li><i class='bx bx-brightness'></i><a href='logout.php'>Log Out</a></li>
            </div>
           
        </section>
        <section id="interface">
            <div class="navigation">
                <div class="n1">
                    <div>
                        <i id="menu-btn" class='bx bx-menu'></i>
                    </div>
                    <div class="search">
                        <i class='bx bx-search-alt-2'></i>
                        <input type="text" placeholder="search">
                    </div>
                </div>
                <div class="profile">
                    <i class='bx bx-bell'></i>
                    <img src="../images/profile.jpg">
                </div>
            </div>
            
            <div class="form">
            <h3 class="i-name">
                Close Gate Pass Form
            </h3>
            <hr>
            <div class="form-1">
                <form  name="gprform" method="POST">
                <h4>Please, close your current gate pass before requesting new gate pass....</h4><br>
                <label id="error" style="color:red;"></label><br><br>
                    <label>Gate Pass Number</label><br>
                     <input type="text" name="gao" class="box1" style="margin-bottom:0;"required>
                     <a href="formstatus1.php"style="margin-top:0;" >See Status</a><br><br>
                     <label>InTime(Actual)</label><br>
                     <input type="datetime-local" name="gatno"  class="box1" required><br> <br>
                     <input type="submit"  name="f" value="SUBMIT"><br> 
                 </form>
            </div> 
            </div>   
        </section>
        <script>
            $('#menu-btn').click(function(){
                $('#menu').toggleClass("active");
            })
        </script>
    <?php
    
        if(isset($_POST['f'])){ 
                                                                                      
            $intime=$_POST['gatno'];
            $gateno=$_POST['gao'];           
            $val=mysqli_query($con,"SELECT * FROM `fstatus` WHERE GatePassNo='$gateno'");
            $count=mysqli_num_rows($val);
            if($count>0){
                $sql1=mysqli_query($con,"UPDATE student SET status='Hostel' WHERE Email='$email'");
                $val=mysqli_query($con,"DELETE FROM `fstatus` WHERE GatePassNo='$gateno'");
                $sql2=mysqli_query($con,"UPDATE closeform SET IntimeActual='$intime' WHERE GatepassNo='$gateno'"); 
                echo '<script>document.location="gatepassforms.php"</script>';
            }  
            else{
               echo '<script>document.getElementById("error").innerHTML="Ivalid gate pass number"</script>';
            }                        
            
        }
    ?>
    </body>
</html>