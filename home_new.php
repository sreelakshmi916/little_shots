<?php
	$user_id=$_GET['user_id'];
?>

<!DOCTYPE html>

<html>
<head>
	<title>LITTLE_SHORTS</title>
	 <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="home">

<h1>Little Shots!!</h1>

<p>Little Shots, Big Protection - Never Miss Your Baby's Vaccine.</p>
<nav>
	<a href="home_new.php?user_id=<?php echo $user_id; ?>">Home</a>
	<a href="add_baby.php?user_id=<?php echo $user_id; ?>">Add Baby</a>
	<a href="babies.php?user_id=<?php echo $user_id; ?>">My Baby</a>
	<a href="index.php">Logout</a>
</nav>

<h2>Welcome to Little Shots!</h2>

<p>
	Manage your baby's details and keep track of vaccination records in one place.
</p>

<h2>Quick Information</h2>

<p>
	View important vaccine information and recommended vaccination ages.
	You can also manage your baby's vaccination records and update them when a vaccine is taken.
</p>

<a href="vaccines.php">View Vaccines</a>

<!-- Added section -->

<h2>Why Use Little Shots?</h2>

<p>
	Little Shots helps parents keep their baby's vaccination information
	organized and easy to access. Parents can add baby details, view their
	vaccination card, check due and upcoming vaccines, and update vaccination
	records when a vaccine is taken.
</p>

<h2>Vaccination Tracking</h2>

<p>
	Keep track of completed, due, and upcoming vaccinations so that important
	vaccines are easier to manage.
</p>

</div>

</body>
</html>