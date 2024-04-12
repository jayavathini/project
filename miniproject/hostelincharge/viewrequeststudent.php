<html>
    <head>
        <title>incharges dashboard</title>
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
        <link href="../style1.css" rel="stylesheet">
        <link href="../btn.css" rel="stylesheet">
        <style>
        .ss{
            display:flex;
            
        }
        form{
            margin:20px 10px 20px 10px;
            
        }
        table{
            text-align:left;
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
        .btn input{
    border:none;
    border-radius: 5px;
    padding:9px 14px;
    font-size: 16px;
    background-color:rgb(24, 185, 24);
    color:white;
}
.btn-1 input{
    border:none;
    border-radius: 5px;
    padding:9px 14px;
    font-size: 16px;
    background-color:rgb(185, 24, 24);
    color:white;
}
.btn input:hover{
    cursor: pointer;
    background-color:rgb(48, 202, 73) ;
}
.btn-1 input:hover{
    
    cursor: pointer;
    background-color:rgb(202, 48, 48) ;
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
        <?php 
  session_start();
  include('../connect.php');
  ?>
        <div class="pages">
                <li><i class='bx bxs-dashboard'></i><a href="dashboard.php">Dashboard</a></li>
                <li><i class='bx bx-git-pull-request'></i><a href="requests.php">Requests</a></li>
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
        <h3 class="i-name">
            Request Details
        </h3>
        <div class="board">
        <h3 class="i-name">
                Profile
            </h3>
            <hr>
        <?php
$view=mysqli_query($con,"select * from request where Name='Sivaranjitha C'");
$row=mysqli_fetch_array($view);?>
    <table cellpadding="30px">
        <tr>
        <th>Gate Pass No</th>
            <td><?php echo $row["GatepassNo"];?></td>
            </tr>
        <tr>
        <th></th>
            <td><?php echo $row["Visit"];?></td>
            </tr>
        <tr>   
            <th>Name</th> 
            <td><?php echo $row["Name"];?></td>
            </tr>
        <tr>
            <th>Room Number</th>
            <td><?php echo $row["RoomNo"];?></td>
            </tr>
        <tr>
        <th>Register Number</th>
            <td><?php echo $row["RegisterNo"];?></td>
            </tr>
        <tr>
        <th>Phone Number</th>
            <td><?php echo $row["PhoneNo"];?></td>
            </tr>
        <tr>
             <th>Purpose</th>
            <td><?php echo $row["Purpose"];?></td>
            </tr>
        <tr>
        <th>Place of Visit</th>
            <td><?php echo $row["PlaceVisit"];?></td>
            </tr>
        <tr>
        <th>Parent Email/Mobile Number</th>
            <td><?php echo $row["ParentMobileEmail"];?></td>
            </tr>
        <tr>
        <th>Out time</th>
            <td><?php echo $row["Outtime"];?></td>
            </tr>
        <tr>
        <th>In Time Expected</th>
            <td><?php echo $row["IntimeExpected"];?></td>
            </tr>
           
    
    </table>
        <div class="ss">
            <form action="acceptrequest.php" method="post">
                <input type="text" name="gno" value="<?php echo $row["GatepassNo"];?>" hidden/>
                <div class="btn"><input type="submit" value="accept" /></div>
            </form>
            <form action="../reject.php">
                <div class="btn-1"><input type="submit" value="Reject" /></div>
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