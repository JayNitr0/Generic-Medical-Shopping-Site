<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$a= $_POST["a"]; [B]//get value from search.html[/B]
mysql_select_db("onm", $con);

$result = mysql_query("SELECT * FROM info
WHERE SiteId REGEXP '$a'");

while($row = mysql_fetch_array($result))
  {
  echo "<table  align=center class=lims>";
  echo "<tr>";
  echo "<th bgcolor=#5D9BCC >SiteID</th>";
  echo "<td bgcolor=#FEE9A9>" . $row['SiteId'] . "</td>";
  
  
  echo "<tr>";
			
			
			
 
	
	

	 
	  $b =$row['SiteId']; 
  }
echo "</table>";


mysql_close($con);

?>