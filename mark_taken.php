<?php
$record_id=$_GET['record_id'];
$baby_id=$_GET['baby_id'];
$user_id=$_GET['user_id'];

include "db.php";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$date=$_POST['date'];

	$res=mysqli_query($conn,"update vaccination_records set status='Taken',vaccation_date='$date' where record_id=$record_id");

	header("location:vaccination_card.php?baby_id=$baby_id&user_id=$user_id");
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mark Vaccine as Taken</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Mark Vaccine as Taken</h2>

<form class="taken" method="POST" action="mark_taken.php?record_id=<?php echo $record_id; ?>&baby_id=<?php echo $baby_id; ?>&user_id=<?php echo $user_id; ?>">

<label for="date">Vaccination Date</label>
<input type="date" id="date" name="date"><br><br>

<input type="submit" value="Mark as Taken">

</form>

</body>
</html>