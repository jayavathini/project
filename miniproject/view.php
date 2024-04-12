<!DOCTYPE html>
<head>
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
<link rel="stylesheet" href="view.css">
</head>
<body>
    <h2>Student Gatepass requests</h2>
<?php
$view=mysqli_query($con,"select * from request");?>
<div class="m-4" >
<table class="table table-striped" cellspacing="0">
    <thead>
        <tr>
            <th>Name</th>
            <th>Room Number</th>
            <th>Register Number</th>
            <th>Phone Number</th>
            <th>Purpose</th>
            <th>Place of Visit</th>
            <th>Out time</th>
            <th>In Time Expected</th>
            <th>In Time Actual</th>
            <th>Action</th>
        </tr>
    <thead>    
   <?php
while ($row = $view->fetch_assoc()) {  ?>
    <tbody>
        <tr>
            <td><?php echo $row["Name"];?></td>
            <td><?php echo $row["RoomNo"];?></td>
            <td><?php echo $row["RegisterNo"];?></td>
            <td><?php echo $row["PhoneNo"];?></td>
            <td><?php echo $row["Purpose"];?></td>
            <td><?php echo $row["PlaceVisit"];?></td>
            <td><?php echo $row["Outtime"];?></td>
            <td><?php echo $row["IntimeExpected"];?></td>
            <td><?php echo $row["IntimeActual"];?></td>
            <?php
                echo"<td>";
                echo"<button style='color:white;background-color:green;margin:5px;'>Accept</button>";
                echo"<button style='color:white;background-color:red;'>Reject</button>";
                echo"</td>";
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
