<html>
<head>
        <title>Removing a Movie</title>
	<!--import style sheet-->
       <LINK REL='stylesheet' TYPE='text/css' HREF='styles.css'/>
</head>
<!--Overriding styles in 'styles.css'-->
<body style ="background-color: orange;"> <!--Set background to be orange-->
<h1 style="text-align:center;font-family:verdana;font-size:30px">Freddies Film House Movies and Actors</h1>
<br>
<h1 style="text-align:center;font-family:verdana;font-size:30px">Movie table with movie deleted:</h1>
<center>
<img src="deleting.jpg" alt="deleting image" class="center" style="width:558px;height:163px;">
</center>
<br><br>

<?php
$namesearch = $_GET['mName']; //get from input

$db_host = 'mysql.cs.nott.ac.uk';
$db_user = 'psyes8_COMP1004';
$db_pass = 'TheSamonMouse100!!';
$db_name = 'psyes8_COMP1004';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_errno)  die("failed to connect to database\n</body>\n</html>"); 

/*Attempt to delete movie, if movie is succesfully deleted, then the movie table
with the movie deleted is returned, else an error message is shown.*/
$sql="DELETE FROM Movie WHERE mvTitle='$namesearch'";
if ($conn->query($sql) === TRUE) {
  $sql="SELECT mvID,mvTitle,mvPrice,mvYear,mvGenre FROM Movie";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt->bind_result($ID, $Title, $Price, $Year, $Genre);
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
<table align="center" width="750" border="1" cellpadding="1" cellspacing="1">
<tr> <th>ID</th> <th>Title</th> <th>Price</th> <th>Year</th> <th>Genre</th> </tr>

<?php
//output results returned into defined table format
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