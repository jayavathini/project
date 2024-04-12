<?php
    session_start();
    include('../connect.php');
    if(!isset($_SESSION['Email'])){
        header("loction:index.php");
    }
    $email=$_SESSION['Email'];
    $sql=mysqli_query($con,"SELECT * FROM student WHERE Email='$email'");
    $row=mysqli_fetch_assoc($sql);
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
            p{
                font-size:25px;
                text-align:center;
            }
            .i-name{
                padding-top:10px;
            }
            #menu .pages li:nth-child(3){
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
            <h3 class="i-name">Form Status</h3>
            <hr>
            <div class="form-1">
                <form  name="gprform" method="POST" align="center">
    
                            <label>Gate Pass Number</label><br>
                            <input type="text" name="gatno" id="gno" class="box1" style="margin-bottom:0;" required><br> <br>
                            <label id="error" style="color:red;"></label>
                            <input type="submit" name="f" style="margin:2% 40% 2% 35%;padding:1.72%;"><br> 
                            <p name="empty" id="status" style="margin:2% 35% 5% 35%;padding:2% 5px;color:white;"></p>
                </form>
                
            </div>    
            </div>
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
            
            $a=$_POST['gatno'];
            $val=mysqli_query($con,"select * from fstatus where GatePassNo='$a'");
            $count=mysqli_num_rows($val);
            if($count>0){
                while($row=mysqli_fetch_assoc($val)){
                        echo '<script>document.getElementById("status").style.background="blue"</script>';
                        echo '<script>document.getElementById("status").innerHTML="'.$row['Status'].'"</script>';
                }
            }  
            else{
                
                echo '<script>document.getElementById("error").innerHTML="Ivalid gate pass number"</script>';
            }                        
            
        }
    ?>
    </body>
</html>