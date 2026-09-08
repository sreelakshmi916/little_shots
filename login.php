<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$email=$_POST["email"];
	$pass=$_POST["pass"];

	$res=mysqli_query($conn,"select * from users where email='$email' and password='$pass'");

	$row=mysqli_fetch_array($res);

	if($row)
	{
		header("Location: home_new.php?user_id=$row[user_id]");
		exit();
	}
	else
	{
		echo"<br>Invalid email & password<br>";
	}
}
?>

<?php include "header.php"; ?>


<div class="login">

	<p class="login-welcome">Welcome Back</p>

	<h2>Login to Little Shots</h2>

	<p class="login-text">
		Login to manage your baby's vaccination information.
	</p>

	<form method="POST" action="login.php">

		<label for="email">Email</label>
		<input type="email" id="email" name="email">

		<label for="pass">Password</label>
		<input type="password" id="pass" name="pass">

		<input type="submit" id="submit" value="LOGIN">

	</form>

	<p class="register-text">
		New user?
		<a href="register.php">Create an account</a>
	</p>

</div>


<?php include "footer.php"; ?>