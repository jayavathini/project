<?php
include('../connect.php');
$id=$_POST['rno'];
$sql=mysqli_query($con,"DELETE FROM student WHERE Email='$id'");
$sql1=mysqli_query($con,"DELETE FROM studentlogin WHERE username='$id'");
if($sql && $sql1){
        echo "<script type='text/javascript'> document.location ='studentlist.php'; </script>";
}
else{
        echo "something went wrong";
}


?>