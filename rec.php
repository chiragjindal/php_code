<?php 
	include "sql1.php";
	$category = $_GET['name'];
	
	$result = mysqli_query($db,"SELECT * FROM userinfo WHERE name='".$category."'") or die(mysql_error());
	echo "<br>";
	$person=mysqli_fetch_array($result);
	
	echo $person['name'],"<br>";	
	echo $person['dob'],"<br>"; 
	echo $person['id'],"<br>";
	echo $person['grade'],"<br>";
	//header('Location:index.php');
	header('Refresh: 2;index.php');
?>