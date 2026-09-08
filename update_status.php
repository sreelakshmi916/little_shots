<?php
$record_id=$_GET['record_id'];
$user_id=$_GET['user_id'];

include "db.php";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$status=$_POST['status'];
	$date=$_POST['date'];

	$res=mysqli_query($conn,"update vaccination_records set status='$status',vaccation_date='$date' where record_id=$record_id");

	header("location:vaccinations.php?user_id=$user_id");
	exit();
}
?>

<!DOCTYPE html>

<html>
<head>
<title>Update Vaccination</title>
</head>
<body>

<form method="POST" action="update_status.php?record_id=<?php echo $record_id; ?>&user_id=<?php echo $user_id; ?>">

<label for="date">Vaccination Date</label> <input type="date" id="date" name="date"><br><br>

<label for="status">Status</label> <select id="status" name="status"> <option value="Pending">Pending</option> <option value="Taken">Taken</option> </select><br><br>

<input type="submit" value="Update">

</form>

</body>
</html>
