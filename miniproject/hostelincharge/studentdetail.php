<?php
include('connect.php');
$name=$_POST['stuname'];
$registerno=$_POST['Regno'];
$year=$_POST['year'];
$department=$_POST['department'];
$email=$_POST['email'];
$mobile=$_POST['mobileno'];
$permanentaddress=$_POST['address1'];
$parentname=$_POST['parentname'];
$parentmobileno=$_POST['pmobileno'];
$parentemail=$_POST['parentemail'];
$temporaryaddress=$_POST['address2'];
$dateofjoin=$_POST['Joiningdate'];
$dateofbirth=$_POST['dob'];
$pass=$_POST['pass'];
$conpass=$_POST['conpass'];
$select=mysqli_query($con,"SELECT * FROM student");
while($row=mysqli_fetch_array($select))
     echo $row['Name'];
     $sql1=mysqli_query($con,"insert into studentlogin(username, password) value('$email','$pass')");
     $sql=mysqli_query($con, "insert into student(Name, RegisterNo, Year, Department, MobileNumber, Email,Password, ConfirmPassword, ParentName, ParentMobile, ParentEmail, DOB, DOJ, PermentAddress, TemporaryAddress) value('$name','$registerno','$year','$department','$mobile','$email','$pass','$conpass','$parentname','$parentmobileno','$parentemail','$dateofbirth','$dateofjoin','$permanentaddress','$temporaryaddress')");
if($sql)
     echo "<script type='text/javascript'> document.location ='studentlist.php'; </script>";
else
   echo "Not process";

?>

