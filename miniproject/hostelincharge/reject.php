<?php
include('connect.php');
$gno=$_POST['gno'];
$sql2="UPDATE fstatus SET status='Rejected' WHERE GatePassNo='$gno'"; 
$query2=mysqli_query($con,$sql2);
if($query2){
        $query2="DELETE FROM `acceptrequest` WHERE GatepassNo='$gno'";
        $query_run1=mysqli_query($con,$query2);
        if($query_run1)
	    {
			echo "<script type='text/javascript'> document.location ='requests.php'; </script>";
	    } 
}
else{
		echo "<script>alert('Error')</script>";
}

?>