<?php
include('../connect.php');
$visit=$_POST['ra'];
$name=$_POST['name'];
$rno=$_POST['rono'];
$regno=$_POST['reno'];
$phonno=$_POST['phoneno'];
$depart=$_POST['department'];
$year=$_POST['year'];
$ptov=$_POST['place'];
$purpose=$_POST['purpose'];
$out=$_POST['outtime'];
$inexp=$_POST['intimeexp'];
$pamoem=$_POST['parent'];
function generateRandomString($length = 4) {
  $characters = '0123456789';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}
//usage 
$gno = generateRandomString(4);
$sql=mysqli_query($con, "insert into request(GatePassNo, Visit, Name, RoomNo, RegisterNo, Year, Department, PhoneNo, ParentMobileEmail, PlaceVisit, Purpose, Outtime, IntimeExpected) value('$gno','$visit','$name','$rno','$regno','$year','$depart','$phonno','$pamoem','$ptov','$purpose','$out','$inexp')");
$sql1=mysqli_query($con, "insert into fstatus(GatePassNo,Status) values('$gno','Progress')");
if ($sql && $sql1) {
    echo "<script type='text/javascript'> document.location ='submittsuccess.php'; </script>";
   }
  mysqli_close($con);
?>
