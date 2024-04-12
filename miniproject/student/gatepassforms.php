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
            <h3 class="i-name">Gate Pass Request Form</h3>
                <hr>
                <form action="insert.php" name="gprform" method="POST">
                    <div class="form-1">
                        <input type="radio" class="r1" name="ra" value="Home"class="form-control">Home</input>
                        <input type="radio" class="r1" name="ra" value="Outing"class="form-control">Outing</input><br>
                            <label>Name</label><br>
                            <input type="text" name="name"  class="box1" value="<?php echo $row['Name'] ?>" required><br>
    
                            <label>Room No</label><br>
                            <input type="number" name="rono" class="box1"  required><br>
    
                            <label>Register No</label><br>
                            <input type="text" name="reno"  class="box1" value="<?php echo $row['RegisterNo'] ?>" required><br>
    
                            <label>Phone Number</label><br>
                            <input type="tel" name="phoneno"  class="box1" value="<?php echo $row['MobileNumber'] ?>" required><br>
                            <label>Year</label><br>
                            <select  name="year" class="box1" required>
                                <option >--SELECT--</option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                             </select><br>   
                            <label>Department</label> <br>
                            <select name="department" class="box1" required>
                                <option >--SELECT--</option>
                                <option value="CSE">CSE</option>
                                <option value="ECE">ECE</option>
                                <option value="EEE">EEE</option>
                                <option value="MECH">MECH</option>
                                <option value="CIVIL">CIVIL</option>
                            </select><br>

                            <label>Parent's Phone Number / Email</label><br>
                            <input type="tel" name="parent"  class="box1" value="<?php echo $row['ParentEmail'] ?>" required><br>

                            <label>Place to visit</label><br>
                            <input type="text"  name="place"  class="box1"  required><br>

                            <label>Purpose</label><br>
                            <textarea  name="purpose"  class="box1"  required></textarea><br>
    
                            <label>Out Time</label><br>
                            <input type="datetime-local" name="outtime"  class="box1" required><br>
    
                            <label>In Time(Expected)</label><br>
                            <input type="datetime-local" name="intimeexp"  class="box1" required><br> <br>
                            <input type="submit" class="box1" value="SUBMIT"><br>  
                    </form>
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