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
        <link rel="stylesheet" href="../student/gatepassform.css">
        <link rel="shortcut icon" href="images/favicon.png" />
        <style>
        .profile1 img{
                width:200px;
                height:200px;
                margin:50px 80px 50px 0px;
        }
        .ss{
            display:flex;
            margin:3% 34%;
        }
        table{
            text-align:left;
            width:100%;
            margin:0px 30px 30px 0px;
        }
        tr{
             border-bottom: 0px solid rgb(224, 224, 224);
        }
        td{
             font-size: 17px;
             font-weight: 400;
             background: rgb(248, 248, 248);
             padding:10px 30px 10px 30px;
        }
        th{

            font-size: 17px;
             padding:10px 30px 10px 20px;
             margin:30px;
        }
        #menu .pages li:nth-child(4){
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
                Profile
            </h3>
            <hr>
            <div class="form-1">
    <table>
        <tr>
        <th>Name</th>
            <td><?php echo $row["Name"];?></td>
            </tr>
        <tr>
        <th>Register Number</th>
            <td><?php echo $row["RegisterNo"];?></td>
            </tr>
        <tr>
            <th>Year</th>
            <td><?php echo $row["Year"];?></td>
            </tr>
        <tr>
        <th>Department</th>
            <td><?php echo $row["Department"];?></td>
            </tr>
        <tr>
        <th>Phone Number</th>
            <td><?php echo $row["MobileNumber"];?></td>
            </tr>
        <tr>
             <th>Email</th>
            <td><?php echo $row["Email"];?></td>
            </tr>
        <tr>
        <th>Parent Name</th>
            <td><?php echo $row["ParentName"];?></td>
            </tr>
        <tr>
        <th>Parent Email</th>
            <td><?php echo $row["ParentEmail"];?></td>
            </tr>
        <tr>
        <th>Parent Mobile Number</th>
            <td><?php echo $row["ParentMobile"];?></td>
            </tr>
        <tr>
        <th>Date of Birth</th>
            <td><?php echo $row["DOB"];?></td>
            </tr>
        <tr>
        <th>Date of Joining</th>
            <td><?php echo $row["DOJ"];?></td>
            </tr>
            <tr>
            <th>Permenent Address</th>
            <td><?php echo $row["PermentAddress"];?></td>
            </tr>
        <tr>
        <th>Temporary Address</th>
            <td><?php echo $row["TemporaryAddress"];?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?php echo $row["status"];?></td>
        </tr>  
    
    </table>
            </div>
            </div>
        </section>
    </body>
</html>