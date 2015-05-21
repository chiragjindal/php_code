<html>
<body>

Welcome <?php echo $_POST["name"]; ?><br>
<?php if(empty($_POST["name"]))
	echo "eror"; ?>
Your email address is: <?php echo $_POST["email"]; ?>

</body>
</html> 