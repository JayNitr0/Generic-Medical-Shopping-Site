<!DOCTYPE html>
<html>
<head>
	<title>Search Bar using PHP</title>
</head>
<body>

<!-- Navbar items -->
    <div id="navlist"> 
        <a href="#">category1</a> 
        <a href="#">category2</a> 
        <a href="#">category3</a> 
        <a href="#">category4</a> 
        <a href="#">category5</a> 

<form method="post">
<label>Search</label>
<input type="text" name="search">
<input type="submit" name="submit">

	
</form>

</body>
</html>

<?php

$con = new PDO("mysql:host=localhost;dbname=CodeFlix",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `search` WHERE Name = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
			<tr>
				<th>Name</th>
				<th>Description</th>
			</tr>
			<tr>
				<td><?php echo $row->Name; ?></td>
				<td><?php echo $row->Description;?></td>
			</tr>

		</table>
<?php 
	}
		
		
		else{
			echo "Name Does not exist";
		}


}

?>