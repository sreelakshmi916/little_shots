<?php
	$conn=mysqli_connect("localhost","root","","little_shorts");
	if(!$conn)
	{
		die("connection failed".mysqli_connect_error());
	}
?>