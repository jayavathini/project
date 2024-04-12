<?php
include('../connect.php');
$gno=$_POST['gno'];
$rno=$_POST['rno'];
$status=$_POST['ra'];
$sql1="UPDATE student SET status='$status' WHERE RegisterNo='$rno'"; 
$sql="select * from acceptrequest  where GatepassNo='$gno'";
$query=mysqli_query($con,$sql);
$row=mysqli_fetch_array($query);
$r1=$row["GatepassNo"];
$r3=$row["Visit"];
$r4=$row["Name"];
$r5=$row["RoomNo"];
$r6=$row["RegisterNo"];
$r7=$row["Year"];
$r9=$row["Department"];
$r10=$row["PhoneNo"];
$r11=$row["ParentMobileEmail"];
$r12=$row["PlaceVisit"];
$r13=$row["Purpose"];
$r14=$row["Outtime"];
$r15=$row["IntimeExcepted"];
$sql3=mysqli_query($con, "insert into closeform(GatepassNo, Visit, Name, RoomNo, RegisterNo, Year, Department, PhoneNo, ParentMobileEmail, PlaceVisit, Purpose, Outtime, IntimeExpected) value('$r1','$r2','$r3','$r4','$r5','$r6','$r7','$r8','$r9','$r10','$r11','$r12','$r13')");
$sql2="UPDATE fstatus SET status='Accepted' WHERE GatePassNo='$gno'"; 
$query1=mysqli_query($con,$sql1);
$query2=mysqli_query($con,$sql2);
if($query2){
        $query="DELETE FROM `acceptrequest` WHERE GatepassNo='$gno'";
        $query_run=mysqli_query($con,$query);
        
	    if($query_run)
	    {
			echo "<script type='text/javascript'> document.location ='requests.php'; </script>";
	    } 
}
else{
		echo "<script>alert('Error')</script>";
}

?>