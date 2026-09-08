<?php
		$baby_id=$_GET['baby_id'];
		$user_id=$_GET['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit baby</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<form class="edit-form" method="POST" action="edit_baby.php?baby_id=<?php echo"$baby_id";?>&user_id=<?php echo"$user_id";?>">
<?php
	include"db.php";
	$res=mysqli_query($conn,"select * from babies where baby_id=$baby_id");
	while($row=mysqli_fetch_array($res))
	{
		echo"<label for='name'>Baby Name</label>";
		echo"<input type='text' name='name' value='$row[baby_name]'><br><br>";
		echo"<label for='dob'>Date of Birth</label>";
		echo"<input type='date' name='dob' value='$row[date_of_birth]'><br><br>";
		echo"<label for='gender'>Gender</label>";
		if($row['gender']=='female')
		{
		echo"<label for='female'>Female</label>";
		echo"<input type='radio' id='female' name='gender' value='female' checked>";
		echo"<label for='male'>Male</label>";
		echo"<input type='radio' id='male' name='gender' value='male'><br><br>";
		}
		else
		{
		echo"<label for='female'>Female</label>";
		echo"<input type='radio' id='female' name='gender' value='female'>";
		echo"<label for='male'>Male</label>";
		echo"<input type='radio' id='male' name='gender' value='male' checked><br><br>";
		}
		echo"<label for='name'>Parent Name</label>";
		echo"<input type='text' name='pname' value='$row[parent_name]'><br><br>";
		echo"<label for='name'>Phone No</label>";
		echo"<input type='tel' name='phone' value='$row[phone_no]'><br><br>";
		echo"<input type='submit' value='Update'>";
		echo "<br><br><a href='babies.php?user_id=".$user_id."'>Cancel</a>";
		echo "<br><br><a href='home_new.php?user_id=".$user_id."'>Home</a>";}
?>
</form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$name=$_POST['name'];
	$dob=$_POST['dob'];
	$gender=$_POST['gender'];
	$pname=$_POST['pname'];
	$phone=$_POST['phone'];
	$res=mysqli_query($conn,"update babies set baby_name='$name',date_of_birth='$dob',gender='$gender',parent_name='$pname',phone_no='$phone' where baby_id=$baby_id");
	header("location:babies.php?user_id=$user_id");
}
?>