<?php
include "db.php";

$baby_id=$_GET['baby_id'];
$user_id=$_GET['user_id'];

$res=mysqli_query($conn,"select * from babies where baby_id='$baby_id'");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Vaccination Card</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="vaccination-heading">
	<p>Little Shots</p>
	<h1>Vaccination Card</h1>
	<p>Keeping track of every little protection</p>
</div>
<div class="vaccination-card">
<div class="card-intro">
	<h3>Baby Vaccination Record</h3>
	<p>View and manage your baby's vaccination information.</p>
</div>

<?php

while($baby=mysqli_fetch_array($res))
{
	echo "<h2>$baby[baby_name]'s Vaccination Card</h2>";
	echo "Baby ID - $baby[baby_id]<br>";
	echo "Date of Birth - $baby[date_of_birth]<br>";
	echo "Gender - $baby[gender]<br>";
	echo "Parent Name - $baby[parent_name]<br>";
	echo "Phone No - $baby[phone_no]<br><br>";
}

echo "<h2>Taken Vaccinations</h2>";

$res1=mysqli_query($conn,"select * from vaccination_records where baby_id='$baby_id' and status='Taken'");

$flag=0;

while($row=mysqli_fetch_array($res1))
{
	$flag=1;

	$vaccine_id=$row['vaccine_id'];

	$res2=mysqli_query($conn,"select * from vaccines where vaccine_id='$vaccine_id'");

	while($row2=mysqli_fetch_array($res2))
	{
		echo "Vaccine Name - $row2[vaccine_name]<br>";
	}

	echo "Vaccination Date - $row[vaccation_date]<br>";
	echo "Status - $row[status]<br>";
	
	}

if($flag==0)
{
	echo "No vaccinations taken yet.<br><br>";
}


echo "<h2> Pending Vaccinations</h2>";

$today=date("Y-m-d");

$res3=mysqli_query($conn,"select * from vaccination_records where baby_id='$baby_id' and status='Pending'");

$flag=0;

while($row=mysqli_fetch_array($res3))
{
	$flag=1;

	$vaccine_id=$row['vaccine_id'];

	$res4=mysqli_query($conn,"select * from vaccines where vaccine_id='$vaccine_id'");

	while($vaccine=mysqli_fetch_array($res4))
	{
		echo "Vaccine Name - $vaccine[vaccine_name]<br>";
	}
		echo "Due Date - $row[due_date]<br>";
		echo "Status - $row[status]<br>";

		echo "<a href='mark_taken.php?record_id=$row[record_id]&baby_id=$baby_id&user_id=$user_id'>Mark as Taken</a><br><br>";
	}

if($flag==0)
{
	echo "No pending vaccinations.<br><br>";
}

echo"<h2>Upcoming Vaccinations</h2>";
$res5=mysqli_query($conn,"select * from vaccination_records where baby_id='$baby_id' and status='pending' and due_date>'$today'");

$flag=0;
while($row=mysqli_fetch_array($res5))
{
	$flag=1;
	$vaccine_id=$row['vaccine_id'];
	
	$res6=mysqli_query($conn,"select * from vaccines where vaccine_id='$vaccine_id'");
	while($vaccine=mysqli_fetch_array($res6))
	{
		echo "Vaccine Name - $vaccine[vaccine_name]<br>"; 
		echo "Due Date - $row[due_date]<br>"; 
		echo "Status - $row[status]<br><br>";
	}
}
if($flag==0)
{
	echo"No upcoming vaccinations.<br><br>";
}
echo "<a href='babies.php?user_id=$user_id'>Back to My Babies</a>";
?>
<div class="vaccination-note">
	<p>Stay on track with your baby's vaccination schedule.</p>
</div>

</div>

<div class="vaccination-footer">
	<p>Little Shots — Little Protection, Big Care.</p>
</div>
</body>
</html>