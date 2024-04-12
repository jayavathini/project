<html>
    <head>
        <title>GPMS - Gate Pass Management System</title>
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
        <link href="../style1.css" rel="stylesheet">
        <link href="../btn.css" rel="stylesheet">
        <style>
        .ss{
            display:flex;
            margin:3% 38%;
        }
        form input{
            margin:2%;
            padding:2% 7%;
        }
        table{
            width:80%;
            margin:2% 10%;

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
             text-align:left;
             margin:30px;
        }
        .btn input{
    border:none;
    border-radius: 5px;
    padding:13px 20px;
    font-size: 16px;
    background-color:rgb(24, 24, 185);
    color:white;
}
.btn-1 input{
    border:none;
    border-radius: 5px;
    padding:13px 20px;
    font-size: 16px;
    background-color:rgb(185, 24, 24);
    color:white;
}
.btn input:hover{
    cursor: pointer;
    background-color:rgb(48,73,202) ;
}
.btn-1 input:hover{
    
    cursor: pointer;
    background-color:rgb(202,48,48) ;
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
        <?php 
  session_start();
  include('../connect.php');
  ?>
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
        <div class="board" style="margin-top:0;">
        <h3 class="i-name">
        Student Details
            </h3>
            <hr>
        <?php
        $id=$_POST['rno'];
$view=mysqli_query($con,"select * from student where RegisterNo='$id'");
$row=mysqli_fetch_array($view);?>
    <table >
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
        <div class="ss">
            <form action="studentdetailupdate.php" method="post">
                <input type="text" name="gno" value="<?php echo $row["RegisterNo"];?>" hidden/>
                <div class="btn"><input type="submit" value="Edit" /></div>
            </form>
            <form action="delete.php" method="post">
            <input type="text" name="rno" value="<?php echo $row["Email"];?>" hidden/>
                <div class="btn-1"><input type="submit" value="Delete" /></div>
            </form>
        </div>
</div>

<?php
$view->free();
?>
        
    </section>
    <script>
        $('#menu-btn').click(function(){
            $('#menu').toggleClass("active");
        })
    </script>
</body>
</html>




