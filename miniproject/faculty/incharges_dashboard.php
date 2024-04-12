<html>
    <head>
        <title>GPMS - Gate Pass Management System</title>
        <link rel="shortcut icon" href="images/favicon.png" />
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
        <link href="../style1.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/favicon.png" />
        <?php
           include('../connect.php');
           $sql=mysqli_query($con,"SELECT * FROM student");
        ?>
    </head>
    <body>
        <section id="menu">
            <div class="head">
                <img src="../images/favicon.png">
                <h1>GPMS</h1>
            </div>
            
            <div class="pages">
                <li><i class='bx bxs-dashboard'></i><a href="incharges_dashboard.php">Dashboard</a></li>
                <li><i class='bx bx-git-pull-request'></i><a href="requests.php">Requests</a></li>
                <li><i class='bx bxs-face'></i><a href="studentlist.php">Student Details</a></li>
                <li><i class='bx bxs-pie-chart'></i><a href="hostelincharge/report.php">Reports</a></li>
                <li><i class='bx bx-brightness'></i><a href="student/logout.php">Log Out</a></li>
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
                Dashboard
            </h3>
            <div class="values">
                <div class="val-box">
                    <i class='bx bx-git-pull-request'></i>
                    <div>
                        <h3><a href="requests.php">Gatepass Requests</a></h3>
                    </div>
                </div>
                <div class="val-box">
                    <i class='bx bxs-face'></i></i>
                    <div>
                        <h3><a href="../studentlists.php">View Student Details</a></h3>
                    </div>
                </div>
                <div class="val-box">
                    <i class='bx bx-brightness'></i>
                    <div>
                        <h4><a href="../hostelincharge/report.php">Reports</a></h4>
                    </div>
                </div>
                <div class="val-box">
                    <i class='bx bxs-group'></i>
                    <div>
                        <h3><a href="../student/logout.php">Log Out</a></h3>
                    </div>
                </div>
            </div>
            <div class="board">
                 <table width="100%">
                     <thead>
                         <tr>
                             <td>Name</td>
                             <td>Year</td>
                             <td>Department</td>
                             <td>Academic Year</td>
                             <td>Status</td>
                             <td></td>
                         </tr>
                     </thead>
                     <?php
                     while($row=mysqli_fetch_assoc($sql)){
                         if($row['status']!='Hostel'){
                     ?>
                      <tbody>
                         <tr>
                             <td class="students">
                                 <img src="../images/profile.jpg" alt="">
                                 <div class="student-de">
                                     <h5><?php echo $row['Name']?></h5>
                                     <p><?php echo $row['Email']?></p>
                                 </div>
                             </td>
                             <td class="student-des">
                                 <h5><?php echo $row['Year']?></h5>
                             </td>
                             <td class="student-des">
                                 <h5><?php echo $row['Department']?></h5>
                             </td>
                             <td class="academic"><?php echo $row['MobileNumber']?></td>
                             <td class="hostel"><p><?php echo $row['status']?></p></td>
                             <form action="studentupdate.php" method="post">
                              <input type="text" name="rno" value="<?php echo $row['RegisterNo']?>" hidden/>
                             <td class="edit"><input type="submit" value="View" style="background-color:rgb(40,70,230);padding:5px 10px;color:white;border:none;cursor:pointer;border-radius:5px;"/></td>
                           </form>
                         </tr>             
                      </tbody>
                      <?php } } ?>
                 </table>
              </div>
        </section>
        <script>
            $('#menu-btn').click(function(){
                $('#menu').toggleClass("active");
            })
        </script>
    </body>
</html>