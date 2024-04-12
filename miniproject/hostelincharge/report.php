<html>
    <head>
        <title>GPMS - Gate Pass Management System</title>
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link href="../style1.css" rel="stylesheet">
        <style>
            .filter{
                display:flex;
                margin:20px 30px;
            }
            .filter .filter1{
                margin:0px 20px 0px 0px;
            }
            .filter .filter2{
                margin:0px 0px 0px 20px;
            }
            .filter select{
                padding:15px 30px;
                border:none;
                background:#fefefe;
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
                <li><i class='bx bxs-face'></i><a href="requests.php">Requests</a></li>
                <li><i class='bx bxs-face'></i><a href="studendetails.php">Add student</a></li>
                <li><i class='bx bx-git-pull-request'></i><a href="studentlist.php">Student Details</a></li>
                <li><i class='bx bxs-pie-chart'></i><a href="report.php">Reports</a></li>
                <li><i class='bx bx-brightness'></i><a href="../student/logout.php">Log Out</a></li>
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
                Students in Out Details
            </h3>
                    <form method="POST" class="filter">
                            <select  name="year" class="filter1"  required>
                                <option >YEAR</option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                             </select><br>   
                            <select name="department" class="filter2" required>
                                <option >DEPARTMENT</option>
                                <option value="CSE">CSE</option>
                                <option value="ECE">ECE</option>
                                <option value="EEE">EEE</option>
                                <option value="MECH">MECH</option>
                                <option value="CIVIL">CIVIL</option>
                            </select><br>
                            
                                <td class="edit"><input type="submit" value="APPLY" class="view-btn2" name="filter" style="padding:10px 20px;font-size:15px;background-color:#faf03a;" /></td>
                            </form>
                           
            <div class="board">
              
                 <table width="100%">
                     <thead>
                         <tr>
                             <td>Name</td>
                             <td>Year</td>
                             <td>Department</td>
                             <td>Phone Number</td>
                             <td>Status</td>
                             <td></td>
                         </tr>
                     </thead>
                     <?php
                      include('../connect.php');
                      session_start();
                      if(isset($_POST['filter'])){
                        $year=$_POST['year'];
                        $dept=$_POST['department'];
                        if( $year!='YEAR' && $dept!='DEPARTMENT'){
                          $sql=mysqli_query($con,"SELECT * FROM student WHERE Year='$year' and Department='$dept'");
                        }
                        else if( $year!='YEAR'){
                          $sql=mysqli_query($con,"SELECT * FROM student WHERE Year='$year'");
                        }
                        else if($dept!='DEPARTMENT'){
                          $sql=mysqli_query($con,"SELECT * FROM student WHERE Department='$dept'");
                        }
                        else{
                          $sql=mysqli_query($con,"SELECT * FROM student");
                       }                     
                   }
                   else{
                      $sql=mysqli_query($con,"SELECT * FROM student");
                   }
                       
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
                 <h3 class="i-name" style="margin-top:0;">
                Students In Hostel
            </h3>
                    <form method="POST" class="filter">
                            <select  name="year" class="filter1"  required>
                                <option >YEAR</option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                             </select><br>   
                            <select name="department" class="filter2" required>
                                <option >DEPARTMENT</option>
                                <option value="CSE">CSE</option>
                                <option value="ECE">ECE</option>
                                <option value="EEE">EEE</option>
                                <option value="MECH">MECH</option>
                                <option value="CIVIL">CIVIL</option>
                            </select><br>
                            
                                <td class="edit"><input type="submit" value="APPLY" class="view-btn2" name="filter" style="padding:10px 20px;font-size:15px;background-color:#faf03a;" /></td>
                            </form>
 
                            <div class="board">
                 <table width="100%">
                 
                     <thead>
                         <tr>
                             <td>Name</td>
                             <td>Year</td>
                             <td>Department</td>
                             <td>Phone Number</td>
                             <td>Status</td>
                             <td></td>
                         </tr>
                     </thead>
                     <?php
                      if(isset($_POST['filter'])){
                        $year=$_POST['year'];
                        $dept=$_POST['department'];
                        if( $year!='YEAR' && $dept!='DEPARTMENT'){
                          $sql=mysqli_query($con,"SELECT * FROM student WHERE Year='$year' and Department='$dept'");
                        }
                        else if( $year!='YEAR'){
                          $sql=mysqli_query($con,"SELECT * FROM student WHERE Year='$year'");
                        }
                        else if($dept!='DEPARTMENT'){
                          $sql=mysqli_query($con,"SELECT * FROM student WHERE Department='$dept'");
                        }
                        else{
                          $sql=mysqli_query($con,"SELECT * FROM student");
                       }                     
                   }
                   else{
                      $sql=mysqli_query($con,"SELECT * FROM student");
                   }
                     while($row=mysqli_fetch_assoc($sql)){
                         if($row['status']=='Hostel'){
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

        
        

    </body>
</html>