<html>
<head>
        <title>Adding actor</title>
	<!--Importing styles css file-->
       <LINK REL='stylesheet' TYPE='text/css' HREF='styles.css'/>
</head>
<!--Overriding some of the stylistic features outlined in styles.css-->
<body style ="background-color: DarkRed;"> <!--Web page will appear red instead of black-->
<h1 style="font-family:verdana;font-size:30px">Freddies Film House Movies and Actors</h1>
<br>
<h1 style="font-family:verdana;font-size:30px">Actor table with new addition:</h1>

<!--importing image-->
<center>
<img src="new_Actor.jpg" alt="actor options" class="center" style="width:558px;height:163px;">
</center>
<br><br>

<?php
$titlesearch = $_GET['aName']; //acquire form input
$db_host = 'mysql.cs.nott.ac.uk';
$db_user = 'psyes8_COMP1004';
$db_pass = 'TheSamonMouse100!!';
$db_name = 'psyes8_COMP1004';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_errno)  die("failed to connect to database\n</body>\n</html>");

//check actor does not already exist in table
$sql="SELECT actID,actName FROM Actor WHERE actName='$titlesearch'";
if ($conn->query($sql) === TRUE)
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
else{
	//if actor does not already exist, then insert them into the table, else return error
	$sql="INSERT INTO Actor (actName) values ('$titlesearch')";
	if ($conn->query($sql) === TRUE) {
  	$sql="SELECT actID,actName FROM Actor";
  	$stmt = $conn->prepare($sql);
  	$stmt->execute();
  	$stmt->bind_result($ID, $Name);
	} else {
  	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>

<!--Set up table to display returned results-->
<table align="center" width="750" border="1" cellpadding="1" cellspacing="1">
<tr> <th>ID</th> <th>Name</th> </tr>

<?php
while($stmt->fetch()){
//put the returned results into the created table
  echo "<tr>";
  echo "<td>". htmlentities($ID) ."</td>";
  echo "<td>". htmlentities($Name) ."</td>";
  echo "</tr>";
}
?>
</table>
</body>
</html>