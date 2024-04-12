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
        <link href="../style1.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/favicon.png" />
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
                Dashboard
            </h3>
            <div class="values">
                
                <div class="val-box">
                    <i class='bx bx-git-pull-request'></i>
                    <div>
                        <h3><a href="gatepassforms.php">Gate Pass Form</a></h3>
                    </div>
                </div>
                <div class="val-box">
                    <i class='bx bxs-face'></i></i>
                    <div>
                        <h3><a href="formstatus1.php">Form Status</a></h3>
                    </div>
                </div>
                <div class="val-box">
                    <i class='bx bx-brightness'></i>
                    <div>
                        <h3><a href="profile.php">View Profile Details</a></h3>
                    </div>
                </div>
                <div class="val-box">
                    <i class='bx bxs-group'></i>
                    <div>
                        <h3><a href="logout.php">Log Out</a></h3>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>