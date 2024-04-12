<html>
    <head>
        <title>GPMS - Gate Pass Management System</title>
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
        <link href="../style1.css" rel="stylesheet">
        <link href="../student/gatepassform.css" rel="stylesheet">
        <style>
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
            <li><i class='bx bx-git-pull-request'></i><a href="requests.php">Requests</a></li>
            <li><i class='bx bxs-face'></i><a href="studendetails.php">Add student</a></li>
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
        <div class="form">
        <h3 class="i-name">Add Student</h3>
            <hr>
	    <form  action="studentdetail.php" method="POST">
            <div class="form-1">
				<label>Student Name</label><br>
				<input type="text" id="box" name="stuname" class="box1"  required/><br>
               
				<label>Register Number</label><br>
				<input type="text" class="box1" name="Regno"  required/><br>
				<label>Year</label><br>
                <select  name="year" class="box1">
                    <option value="I">I</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                    <option value="IV">IV</option>
                 </select><br>
				<label>Department</label><br>
                <select name="department" class="box1">
                    <option value="CSE">CSE</option>
                    <option value="ECE">ECE</option>
                    <option value="EEE">EEE</option>
                    <option value="MECH">MECH</option>
                    <option value="CIVIL">CIVIL</option>
                </select><br>
				<label>Student's Mobile Number</label><br>
				<input type="text" class="box1" name="mobileno" required/><br>
                <label>Parent Name</label><br>
                <input type="text" class="box1" name="parentname" required/><br>
               <label>Parent Email</label><br>
                 <input type="text" class="box1" name="parentemail" required/><br>
				<label>Parent's  Mobile Number</label><br>
				<input type="text" class="box1" name="pmobileno" required/><br>
				<label>E-mail</label><br>
				<input type="text" class="box1" name="email" required/><br>
                <label>Password</label><br>
				<input type="password" class="box1" name="pass" required/><br>
                <label>Confirm Password</label><br>
				<input type="password" class="box1" name="conpass" required/><br>
                <label>D.O.B</label><br>
				<input type="date" class="box1" name="dob" required/><br>
                <label>Date of joining</label><br>
                <input type="date" class="box1" name="Joiningdate" required/><br>
          		<label>Temporary Address</label><br>
                <input type="text" class="box1" name="address1" required/><br>
				<label>Permenent Address</label><br>
                <input type="text" class="box1" name="address2" required/><br>
                 
                  <input type="submit" class="box1" value="SUBMIT"/>
                </div>
	        </form>
        </div>
    </section>
    <script>
        $('#menu-btn').click(function(){
            $('#menu').toggleClass("active");
        })
    </script>
</body>
</html>