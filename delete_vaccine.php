<?php
		$vaccine_id=$_GET['vaccine_id'];
	include"db.php";
	$res=mysqli_query($conn,"delete from vaccines where vaccine_id=$vaccine_id");
	header("location:manage_vaccines.php");
?>