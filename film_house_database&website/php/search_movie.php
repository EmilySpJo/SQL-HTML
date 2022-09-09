<html>
<head>
        <title>Movie search</title>
	<!--Import style sheet-->
       <LINK REL='stylesheet' TYPE='text/css' HREF='styles.css'/>
</head>
<!--Change default web page styling-->
<body style ="background-color: lightBlue;">
<h1 style="text-align:center;font-family:verdana;font-size:30px">Freddies Film House Movies and Actors</h1>
<br>
<h1 style="text-align:center;font-family:verdana;font-size:30px">Movie Details:</h1>
<center>
<img src="magnifiyingGlass.jpg" alt="magnifiying glass image" class="center" style="width:558px;height:163px;">
</center>
<br><br>


<?php
$titlesearch = $_GET['mName']; //get form input
$db_host = 'mysql.cs.nott.ac.uk';
$db_user = 'psyes8_COMP1004';
$db_pass = 'TheSamonMouse100!!';
$db_name = 'psyes8_COMP1004';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_errno)  die("failed to connect to database\n</body>\n</html>"); 

$sql="SELECT mvID,mvTitle,mvPrice,mvYear,mvGenre FROM Movie WHERE mvTitle='$titlesearch'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->bind_result($ID, $Title, $Price, $Year, $Genre);
?>

<table align="center" width="750" border="1" cellpadding="1" cellspacing="1">
<tr> <th>ID</th> <th>Title</th> <th>Price</th> <th>Year</th> <th>Genre</th> </tr>

<?php
//print results into table
while($stmt->fetch()){
  echo "<tr>";
  echo "<td>". htmlentities($ID) ."</td>";
  echo "<td>". htmlentities($Title) ."</td>";
  echo "<td>". htmlentities($Price) ."</td>";
  echo "<td>". htmlentities($Year) ."</td>";
  echo "<td>". htmlentities($Genre) ."</td>";
  echo "</tr>";
}
?>
</table>
</body>
</html>