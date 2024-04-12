<?php
include('../connect.php');
$gno=$_POST['gno'];
$sql="insert into acceptrequest select * from request  where GatepassNo='$gno'";

$query1=mysqli_query($con,$sql);
if($query1){
        $query="DELETE FROM `request` WHERE GatepassNo='$gno'";
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
	
