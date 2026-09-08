<?php
include "db.php";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$name=$_POST['name'];
	$importance=$_POST['importance'];
	$age=$_POST['age'];
	$recommended_days=$_POST['recommended_days'];

	mysqli_query($conn,"insert into vaccines(vaccine_name,importance,recommended_age,recommended_days) values('$name','$importance','$age','$recommended_days')");

	$res=mysqli_query($conn,"select * from vaccines where vaccine_name='$name' and recommended_days='$recommended_days'");

	while($row=mysqli_fetch_array($res))
	{
		$vaccine_id=$row['vaccine_id'];
	}

	$res1=mysqli_query($conn,"select * from babies");

	while($row1=mysqli_fetch_array($res1))
	{
		$baby_id=$row1['baby_id'];
		$dob=$row1['date_of_birth'];

		mysqli_query($conn,"insert into vaccination_records(baby_id,vaccine_id,due_date,status) values('$baby_id','$vaccine_id',DATE_ADD('$dob',INTERVAL $recommended_days DAY),'Pending')");
	}

	header("location:manage_vaccines.php");
	exit();
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Add Vaccine - Little Shots</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

<header>
	<div class="logo">
		<h1>Little Shots</h1>
		<h2>HEALTH CENTRE</h2>
	</div>

	<nav>
		<a href="admin_home.php">Home</a>
		<a href="admin_dashboard.php">Dashboard</a>
		<a href="manage_vaccines.php">Vaccines</a>
		<a href="../index.php">Logout</a>
	</nav>
</header>
<div class="add-vaccine">

	<p class="welcome">Admin Panel</p>

	<h1>Add New Vaccine</h1>

	<p class="add-text">
		Add a new vaccine to the Little Shots vaccination system.
	</p>

	<form method="POST" action="add_vaccine.php">

		<label for="name">Vaccine Name</label>
		<input type="text" id="name" name="name">

		<label for="importance">Importance</label>
		<input type="text" id="importance" name="importance">

		<label for="age">Recommended Age</label>
		<input type="text" id="age" name="age">

		<label for="recommended_days">Recommended Days</label>
		<input type="number" id="recommended_days" name="recommended_days">

		<input type="submit" value="Add Vaccine" class="add-button">

	</form>

	<br>

	<a href="manage_vaccines.php" class="back-button">
		Back to Manage Vaccines
	</a>

</div>


<footer>
	<p>© 2026 Little Shots Health Centre</p>
</footer>

</body>
</html>