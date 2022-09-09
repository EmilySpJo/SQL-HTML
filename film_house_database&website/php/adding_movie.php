<html>
<head>
        <title>Adding a Movie</title>
	<!--Inserting style.css file for basic style settings-->
       <LINK REL='stylesheet' TYPE='text/css' HREF='styles.css'/>
</head>
<body style ="background-color: DarkRed;"> <!--overriding basic styling, web page red instead of black-->
<h1 style="text-align:center;font-family:verdana;font-size:30px">Freddies Film House Movies and Actors</h1>
<br>
<h1 style="text-align:center;font-family:verdana;font-size:30px">Movie table with new addition:</h1>
<center>
<img src="adding_movie_under_title.jfif" alt="movie options" class="center" style="width:558px;height:163px;">
</center>
<br><br>

<?php
$aidsearch = $_GET['aID'];
$namesearch = $_GET['mName'];
$pricesearch = $_GET['mPrice'];
$yearsearch = $_GET['mYear'];
$genresearch = $_GET['mGenre'];

$db_host = 'mysql.cs.nott.ac.uk';
$db_user = 'psyes8_COMP1004';
$db_pass = 'TheSamonMouse100!!';
$db_name = 'psyes8_COMP1004';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_errno)  die("failed to connect to database\n</body>\n</html>"); 

$sql="SELECT mvID,mvTitle,mvPrice,mvYear,mvGenre FROM Movie WHERE mvTitle='$namesearch'";
if ($conn->query($sql) === TRUE)
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
else
{
	$sql="INSERT INTO Movie (actID,mvTitle,mvPrice,mvYear,mvGenre) values ($aidsearch,'$namesearch',$pricesearch,$yearsearch,'$genresearch')";
	if ($conn->query($sql) === TRUE) {
 	$sql="SELECT mvID,mvTitle,mvPrice,mvYear,mvGenre FROM Movie";
 	$stmt = $conn->prepare($sql);
  	$stmt->execute();
  	$stmt->bind_result($ID, $Title, $Price, $Year, $Genre);
	} else {
  	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

?>
<table align="center" width="750" border="1" cellpadding="1" cellspacing="1">
<tr> <th>ID</th> <th>Title</th> <th>Price</th> <th>Year</th> <th>Genre</th> </tr>

<?php
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