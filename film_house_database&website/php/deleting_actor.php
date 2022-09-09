<html>
<head>
        <title>Removing Actor</title>
	<!--importing style sheet-->
       <LINK REL='stylesheet' TYPE='text/css' HREF='styles.css'/>
</head>

<!--Overriding predefined style features-->
<body style ="background-color: orange;"> <!--Background will now be orange-->
<h1 style="text-align:center;font-family:verdana;font-size:30px">Freddies Film House Movies and Actors</h1>
<br>
<h1 style="text-align:center;font-family:verdana;font-size:30px">Actor table with actor deleted:</h1>
<center>
<img src="deleting.jpg" alt="deleting image" class="center" style="width:558px;height:163px;">
</center>
<br><br>

<?php
$titlesearch = $_GET['aName']; //acquiring form input
$db_host = 'mysql.cs.nott.ac.uk';
$db_user = 'psyes8_COMP1004';
$db_pass = 'TheSamonMouse100!!';
$db_name = 'psyes8_COMP1004';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_errno)  die("failed to connect to database\n</body>\n</html>"); 

$sql="DELETE FROM Actor WHERE actName='$titlesearch'";
if ($conn->query($sql) === TRUE) { //if delete has been succesfull, then return the table in its new form
  $sql="SELECT actID,actName FROM Actor";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt->bind_result($ID, $Name);
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
//$conn->close();
?>
<table align="center" width="750" border="1" cellpadding="1" cellspacing="1">
<tr> <th>ID</th> <th>Name</th> </tr>
<?php
while($stmt->fetch()){ //put returned results into a table
  echo "<tr>";
  echo "<td>". htmlentities($ID) ."</td>";
  echo "<td>". htmlentities($Name) ."</td>";
  echo "</tr>";
}
?>
</table>
</body>
</html>