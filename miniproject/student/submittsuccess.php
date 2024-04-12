<?php
    session_start();
    include('../connect.php');
    if(!isset($_SESSION['Email'])){
        header("loction:index.php");
    }
    $email=$_SESSION['Email'];
    $sql=mysqli_query($con,"SELECT * FROM student WHERE Email='$email'");
    $row=mysqli_fetch_array($sql);
    $id=$row['RegisterNo'];
    $sql1=mysqli_query($con,"SELECT * FROM request WHERE RegisterNo='$id'");
    $row1=mysqli_fetch_array($sql1);
?>
<html>
    <head>
        <title>GPMS - Gate Pass Management System</title>
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
        <link href="../style1.css" rel="stylesheet">
        <link href="../form.css" rel="stylesheet">
        <link href="gatepassform.css" rel="stylesheet">
        <style>
            h1{
                margin:20px;
                padding: 50px 50px 20px 50px;
                color:green;
            }
            h3{
                margin:5px 5px 5px 20px;
                padding: 5px 5px 20px 50px;
                color:#2299aa;
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
                    echo "<li><i class='bx bx-git-pull-request'></i><a href='gatepassform.html'>Gate pass form</a></li>";
                }
                else{
                    echo "<li><i class='bx bx-git-pull-request'></i><a href='../closeform.php'>Gate pass form</a></li>";
                }?>
                <li><i class='bx bxs-face'></i><a href="formstatus1.php">Form Status</a></li>
                <li><i class='bx bxs-pie-chart'></i><a href="profile.php">Profile Details</a></li>
                <li><i class='bx bx-brightness'></i><a href="setting.php">Settings</a></li>
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
            <h3 class="i-name">
                Gate Pass Request Form
            </h3>
            <div class="form">
                <h1>Request Submitted Successfully</h1>
                <h3>Gate Pass Number:<?php  echo $row1['GatepassNo'];?></h3><br>
            </div>
                </div>
            </div>
        </section>
        <script>
            $('#menu-btn').click(function(){
                $('#menu').toggleClass("active");
            })
        </script>

    </body>
</html>