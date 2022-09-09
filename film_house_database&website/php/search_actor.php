<html>
<head>
        <title>Actor search</title>
	<!--Import style sheet-->
       <LINK REL='stylesheet' TYPE='text/css' HREF='styles.css'/>
</head>
<!--Override predefined stylistic choices-->
<body style ="background-color: lightBlue;">
<h1 style="text-align:center;font-family:verdana;font-size:30px">Freddies Film House Movies and Actors</h1>
<br>
<h1 style="text-align:center;font-family:verdana;font-size:30px">Actor details:</h1>
<center>
<img src="magnifiyingGlass.jpg" alt="searching image" class="center" style="width:558px;height:163px;">
</center>
<br><br>

<?php
$titlesearch = $_GET['aName']; //get input from form
$db_host = 'mysql.cs.nott.ac.uk';
$db_user = 'psyes8_COMP1004';
$db_pass = 'TheSamonMouse100!!';
$db_name = 'psyes8_COMP1004';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_errno)  die("failed to connect to database\n</body>\n</html>"); 

$sql="SELECT actID,actName FROM Actor WHERE actName='$titlesearch'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->bind_result($ID, $Name);
	
?>

<!--Define table for result of sql search to go into-->
<table align="center" width="750" border="1" cellpadding="1" cellspacing="1">
<tr> <th>ID</th> <th>Name</th> </tr>

<?php
//put results into defined table
while($stmt->fetch()){
  echo "<tr>";
  echo "<td>". htmlentities($ID) ."</td>";
  echo "<td>". htmlentities($Name) ."</td>";
  echo "</tr>";
}
?>
</table>
</body>
</html>