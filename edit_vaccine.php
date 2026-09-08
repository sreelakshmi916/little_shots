<?php
$vaccine_id=$_GET['vaccine_id'];

include "db.php";

$res=mysqli_query($conn,"select * from vaccines where vaccine_id=$vaccine_id");
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Vaccine - Little Shots</title>
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


<div class="edit-vaccine">

	<p class="welcome">Admin Panel</p>

	<h1>Edit Vaccine</h1>

	<p class="edit-text">
		Update the vaccine information below.
	</p>

	<form method="POST" action="edit_vaccine.php?vaccine_id=<?php echo $vaccine_id; ?>">

	<?php
	while($row=mysqli_fetch_array($res))
	{
		echo"<label for='name'>Vaccine Name</label>";
		echo"<input type='text' id='name' name='name' value='$row[vaccine_name]'><br><br>";

		echo"<label for='imp'>Importance</label>";
		echo"<input type='text' id='imp' name='imp' value='$row[importance]'><br><br>";

		echo"<label for='age'>Recommended Age</label>";
		echo"<input type='text' id='age' name='age' value='$row[recommended_age]'><br><br>";

		echo"<label for='days'>Recommended Days</label>";
		echo"<input type='number' id='days' name='days' value='$row[recommended_days]'><br><br>";

		echo"<input type='submit' value='Update Vaccine' class='update-button'>";
	}
	?>

	</form>

	<br>

	<a href="manage_vaccines.php" class="back-button">Back to Manage Vaccines</a>

</div>


<footer>
	<p>© 2026 Little Shots Health Centre</p>
</footer>

</body>
</html>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$name=$_POST['name'];
	$imp=$_POST['imp'];
	$age=$_POST['age'];
	$days=$_POST['days'];

	$res=mysqli_query($conn,"update vaccines set vaccine_name='$name',importance='$imp',recommended_age='$age',recommended_days='$days' where vaccine_id=$vaccine_id");

	header("location:manage_vaccines.php");
	exit();
}

?>