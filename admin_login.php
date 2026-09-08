<?php

include "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$name=$_POST["name"];
	$pass=$_POST["pass"];
	$res=mysqli_query($conn,"select * from admin where username='$name' and password='$pass'");
	$row=mysqli_fetch_array($res);
	if($row)
	{
		header("Location: admin_home.php");
		exit();
	}
	else
	{
		echo "<br>Invalid username & password<br>";
	}
}

?>

<?php include "../header.php"; ?>

<div class="admin-login-page">
    <div class="admin-login-box">
        <p class="admin-welcome">Welcome Admin</p>
        <h1>Little Shots</h1>
        <p class="admin-text">
            Login to manage vaccines and
            vaccination information.
        </p>

        <form method="POST" action="admin_login.php">
            <label for="name">Username</label>
            <input type="text" id="name" name="name">
            <label for="pass">Password</label>
            <input type="password" id="pass" name="pass">
            <input type="submit" id="submit" value="LOGIN">
        </form>
		<a href="../index.php">Back to Home</a>
    </div>
</div>

<?php include "../footer.php"; ?>