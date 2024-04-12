<html>
    <head>
        <title>incharges dashboard</title>
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
        <link href="../style1.css" rel="stylesheet">
        <link href="../student/gatepassform.css" rel="stylesheet">
        <style>
            #btnq{
                background:#aea0a0;
                border:none;
            }
            #btnq:hover{
                background:#af3030;
            }
            #menu .pages li:nth-child(4){
                 border-left:2px solid white;
            }
            #menu .pages li:nth-child(1){
                 border:none;
            }
        </style>
        <?php 
  session_start();
  include('../connect.php');
  ?>
    </head>
<body>
    <section id="menu">
        <div class="head">
            <img src="../images/favicon.png">
            <h1>GPMS</h1>
        </div>
        
        <div class="pages">
            <li><i class='bx bxs-dashboard'></i><a href="dashboard.php">Dashboard</a></li>
            <li><i class='bx bx-git-pull-request'></i><a href="requests.php">Requests</a></li>
            <li><i class='bx bxs-face'></i><a href="studendetails.php">Add Student</a></li>
            <li><i class='bx bxs-face'></i><a href="studentlist.php">Student Details</a></li>
            <li><i class='bx bxs-pie-chart'></i><a href="report.php">Reports</a></li>
            <li><i class='bx bx-brightness'></i><a href="../student/logout.php">Log Out</a></li>
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
       
        <?php
        $id=$_POST['gno'];
$view=mysqli_query($con,"select * from student where RegisterNo='$id'");
$row=mysqli_fetch_array($view);
$id1=$row['RegisterNo'];?>
        <div class="form">
        <h3 class="i-name">
            Update Student Details
        </h3>
        <hr>
        <form  action="update.php" method="POST">
            <div class="form-1">
            <label>Student Name</label><br>
				<input type="text"  class="box1"  name="stuname" value="<?php echo $row['Name'];?>"  required/>
               
				<label>Register Number</label><br>
				<input type="text"  class="box1" name="Regno" value="<?php echo $row['RegisterNo'];?>" required/>
				<label>Year</label><br>
                <select  name="year"  class="box1">
                    <option>--SELECT--</option>
                    <option value="I">I</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                    <option value="IV">IV</option>
                 </select>
                 <label>Department</label><br>
                <select name="department"  class="box1">
                    <option>--SELECT--</option>
                    <option value="CSE">CSE</option>
                    <option value="ECE">ECE</option>
                    <option value="EEE">EEE</option>
                    <option value="MECH">MECH</option>
                    <option value="CIVIL">CIVIL</option>
                </select>
				<label>Student's Mobile Number</label><br>
				<input type="text"  class="box1"name="mobileno" value="<?php echo $row['MobileNumber'];?>" required/>
                <label>Parent Name</label><br>
                <input type="text" class="box1" name="parentname" value="<?php echo $row['ParentName'];?>" required/>
                <label>Parent Email</label><br>
                 <input type="text" class="box1" name="parentemail" value="<?php echo $row['ParentEmail'];?>" required/>
                 <label>Parent's  Mobile Number</label><br>
				<input type="text" class="box1" name="pmobileno" value="<?php echo $row['ParentMobile'];?>" required/>
				<label>E-mail</label><br>
				<input type="text"  class="box1"name="email" value="<?php echo $row['Email'];?>" required/>
                <label>Password</label><br>
				<input type="password" class="box1" name="pass" value="<?php echo $row['Password'];?>" required/>
                <label>Confirm Password</label><br>
				<input type="password"  class="box1"name="conpass" value="<?php echo $row['ConfirmPassword'];?>" required/>
                <label>D.O.B</label><br>
				<input type="datetime-local" class="box1" name="dob" value="<?php echo $row['DOB'];?>" required/>
                <label>Date of joining</label><br>
                <input type="datetime-local"  class="box1"name="Joiningdate" value="<?php echo $row['DOJ'];?>" required/>
                <label>Temporary Address</label><br>
                <input type="text"  name="address1" class="box1" value="<?php echo $row['TemporaryAddress'];?>" required/>
				<label>Permenent Address</label><br>
                <input type="text"  name="address2" class="box1" value="<?php echo $row['PermentAddress'];?>" required/><br>
                 <input type="text" name="rno1" class="box1" value="<?php echo $id1 ?>" hidden/>
                  <input type="submit" value="Edit" class="box1"name="submit"/></form>
                  <form action="studentupdate.php" method="post">
                  <input type="text" name="rno" class="box1" value="<?php echo $row['RegisterNo']?>" hidden/>
                     <input type="submit" value="Cancel" class="box1"id="btnq"  name="submit"/>
                  </form>
                </div>
	        </form>
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