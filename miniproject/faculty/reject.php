<?php
include('connect.php');
$gno=$_POST['gno'];
$sql2="UPDATE fstatus SET status='Rejected' WHERE GatePassNo='$gno'"; 
$query2=mysqli_query($con,$sql2);
if($query2){
        $query1="DELETE FROM `request` WHERE GatepassNo='$gno'";
        $query_run=mysqli_query($con,$query1);
	    if($query_run)
	    {
			echo "<script type='text/javascript'> document.location ='requests.php'; </script>";
	    } 
}
else{
		echo "<script>alert('Error')</script>";
}

?>