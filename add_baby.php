<?php
include "db.php";

$user_id=$_GET['user_id'];
?>

<!DOCTYPE html>

<html>
<head>
	<title>Add Baby</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<form class="baby-form" method="POST" action="add_baby.php?user_id=<?php echo $user_id; ?>">

<label for="name">Baby Name</label>
<input type="text" id="name" name="name"><br><br>
<label for="dob">Date of Birth</label>
<input type="date" id="dob" name="dob"><br><br>
<label>Gender</label>
<label for="female">Female</label>
<input type="radio" id="female" name="gender" value="female">
<label for="male">Male</label>
<input type="radio" id="male" name="gender" value="male"><br><br>
<label for="pname">Parent Name</label>
<input type="text" id="pname" name="pname"><br><br>
<label for="phone">Phone No</label>
<input type="tel" id="phone" name="phone"><br><br>
<input type="submit" id="submit" value="Add Baby"><br><br>

</form>

<a href="home_new.php?user_id=<?php echo $user_id; ?>">Home</a>

</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$name=$_POST["name"];
	$dob=$_POST["dob"];
	$gender=$_POST["gender"];
	$pname=$_POST["pname"];
	$phone=$_POST["phone"];

	$res=mysqli_query($conn,"insert into babies(user_id,baby_name,date_of_birth,gender,parent_name,phone_no) values($user_id,'$name','$dob','$gender','$pname','$phone')");


	$res1=mysqli_query($conn,"select * from babies where user_id=$user_id and baby_name='$name' and date_of_birth='$dob'");

	while($row=mysqli_fetch_array($res1))
	{
		$baby_id=$row['baby_id'];
	}


	$res2=mysqli_query($conn,"select * from vaccines");

	while($row=mysqli_fetch_array($res2))
	{
		$vaccine_id=$row['vaccine_id'];
		$recommended_days=$row['recommended_days'];

		$res3=mysqli_query($conn,"insert into vaccination_records(baby_id,vaccine_id,due_date,status) values('$baby_id','$vaccine_id',DATE_ADD('$dob',INTERVAL $recommended_days DAY),'Pending')");
	}

	header("location:babies.php?user_id=$user_id");
	exit();
}

?>