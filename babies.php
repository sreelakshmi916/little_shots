<?php include"db.php";
	$user_id=$_GET['user_id'];
	?>
	
	<!DOCTYPE html>
<html>
<head>
    <title>Babies</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="babies-header">
	<p>Little Shots</p>
	<h1>My Babies</h1>
	<h3>Keep track of your little one's vaccination journey</h3>
</div>

<div class="babies-container">
<div class="babies-intro">
	<h2>Baby Information</h2>
	<p>View your baby's details and vaccination card below.</p>
</div>
<?php
	$res=mysqli_query($conn,"select * from babies where user_id='$user_id'");
	$flag=0;
	while($row=mysqli_fetch_array($res))
	{
		$flag=1;

		echo "$row[baby_id]<br>";
		echo "Name-$row[baby_name]<br>";
		echo "Date Of Birth-$row[date_of_birth]<br>";
		echo "Gender-$row[gender]<br>";
		echo "Parent Name-$row[parent_name]<br>";
		echo "Phone No -$row[phone_no]<br>";

		echo "<a href='edit_baby.php?baby_id=$row[baby_id]&user_id=$row[user_id]'>Edit changes</a><br>";

		echo "<a href='vaccination_card.php?baby_id=$row[baby_id]&user_id=$user_id'>View Vaccination Card</a><br><br>";
	}

	if($flag==0)
	{
		echo "<h3>No baby details added yet.</h3>";
		echo "<a href='add_baby.php?user_id=$user_id'>Add Baby Details</a>";
	}
	echo "<br><a href='home_new.php?user_id=$user_id'>Home</a>";
?>
</div>
<div class="babies-footer-text">
	<p>Every little shot is a big step towards protection.</p>
</div>
</body>
</html>