<?php
include "../db.php";
include "header.php";

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>LITTLE_SHORTS</title>
</head>
<body>
<div class="admin-home">

<h1>Little Shots Admin Panel</h1>

<p>Welcome Admin!!</p>
<nav>
	<a href="admin_dashboard.php">Dashboard</a>
	<a href="manage_vaccines.php">Manage Vaccines</a>
	<a href="../index.php">Logout</a>
</nav>

</div>
</html>
<?php
include "../footer.php";
?>