<?php

include "db.php";

$res=mysqli_query($conn,"select * from vaccines");

?>

<!DOCTYPE html>

<html>

<head>

	<title>Manage Vaccines</title>

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


<div class="manage-vaccines">

	<p class="welcome">Admin Panel</p>

	<h1>Manage Vaccines</h1>

	<p class="vaccine-text">
		View and manage the vaccines available in Little Shots.
	</p>


	<div class="vaccine-cards">

	<?php

	while($row=mysqli_fetch_array($res))
	{
		echo "<div class='vaccine-card'>";

		echo "<h2>$row[vaccine_name]</h2>";

		echo "<p><b>Vaccine ID:</b> $row[vaccine_id]</p>";

		echo "<p><b>Importance:</b> $row[importance]</p>";

		echo "<p><b>Recommended Age:</b> $row[recommended_age]</p>";

		echo "<a href='edit_vaccine.php?vaccine_id=$row[vaccine_id]' class='edit-button'>Edit Vaccine</a>";

		echo "</div>";
	}

	?>

	</div>


	<a href="add_vaccine.php" class="add-vaccine-button">
		+ Add New Vaccine
	</a>

	<br><br>

	<a href="admin_home.php" class="back-button">
		Back to Admin Home
	</a>

</div>


<footer>

	<p>© 2026 Little Shots Health Centre</p>

</footer>

</body>

</html>