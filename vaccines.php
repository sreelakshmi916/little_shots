<?php include "db.php"; ?>

<?php include "header.php"; ?>

<div class="vaccines-container">

<h2>Vaccines</h2>

<p class="vaccine-intro">
View information about the vaccines available in the Little Shots system.
</p>

<?php
$res=mysqli_query($conn,"select * from vaccines");
while($row=mysqli_fetch_array($res))
{
	echo "<div class='vaccine-box'>";
	echo "Name-$row[vaccine_name]<br>";
	echo "Importance-$row[importance]<br>";
	echo "Recommended age-$row[recommended_age]<br><br>";
	echo "</div>";
}
?>

</div>

<?php include "footer.php"; ?>