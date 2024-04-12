<!DOCTYPE html>
<head>
        <title>GPMS - Gate Pass Management System</title>
        <link rel="shortcut icon" href="images/favicon.png" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <?php 
  session_start();
  include('connect.php');
  ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h1>Student Gatepass reqests</h1>
<?php
$view=mysqli_query($con,"select * from request");?>
<div class="m-4" >
<table class="table table-striped" cellspacing="0">
       
   <?php
while ($row = $view->fetch_assoc()) {  ?>
    <tbody>
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
        <tr>
            <?php
                  echo "<td>";
                  echo '<a href="read.php?id='. $row['RegisterNo'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                  echo '<a href="update.php?id='. $row['RegisterNo'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                  echo '<a href="delete.php?id='. $row['RegisterNo'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
              echo "</td>";
            ?>
        </tr>
        <tbody>
        <?php } ?>
    
    </table>
</div>

<?php
$view->free();
?>
</body>
<?php 
