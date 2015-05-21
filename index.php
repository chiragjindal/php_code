<?php 
	include "sql1.php";

	$result = mysqli_query($db,"SELECT * FROM userinfo") or die(mysql_error());
	echo "<br>";
	while($person=mysqli_fetch_array($result))
	{	
		 ?>
		<a href ="rec.php? name=<?php echo $person['name'] ?>"><?php echo $person['name']?></a>
		<?php 
		echo $person['dob'];
		echo "<br>";
	}
?>
