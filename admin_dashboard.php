<?php
include "db.php";
$res=mysqli_query($conn,"select * from users");
$total_parents=0;
while($row=mysqli_fetch_assoc($res))
{
	$total_parents++;
}

$res=mysqli_query($conn,"select * from babies");
$total_babies=0;
while($row=mysqli_fetch_assoc($res))
{
	$total_babies++;
}

$res=mysqli_query($conn,"select * from vaccines");
$total_vaccines=0;
while($row=mysqli_fetch_assoc($res))
{
	$total_vaccines++;
}

$res=mysqli_query($conn,"select * from vaccination_records where status='Taken'");
$total_taken=0;
while($row=mysqli_fetch_assoc($res))
{
	$total_taken++;
}
include"header.php";
?>

<div class="admin-dashboard">
	<p class="welcome">Admin Panel</p>
	<h1>Dashboard</h1>
	<p class="dashboard-text">
		Overview of Little Shots Health Centre
	</p>
	<div class="dashboard-cards">
		<div class="dashboard-card">
			<h2><?php echo $total_parents; ?></h2>
			<h3>Total Parents</h3>
			<p>Registered parents</p>
		</div>


		<div class="dashboard-card">
			<h2><?php echo $total_babies; ?></h2>
			<h3>Total Babies</h3>
			<p>Registered babies</p>
		</div>


		<div class="dashboard-card">
			<h2><?php echo $total_vaccines; ?></h2>
			<h3>Total Vaccines</h3>
			<p>Available vaccines</p>
		</div>


		<div class="dashboard-card">
			<h2><?php echo $total_taken; ?></h2>
			<h3>Vaccinations Taken</h3>
			<p>Completed vaccinations</p>
		</div>
	</div>

</div>
<?php 
include"footer.php";
?>