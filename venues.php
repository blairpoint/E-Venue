
<?php
$conn_string = "host=13.210.214.176 port=5432 dbname=test user=blairuser password=Fiddler56!";
$conn = pg_connect($conn_string);
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
		<meta charset="utf-8">
		<title>Evenue</title>
		<!-- this is a comment -->
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>

	<body style="background: white">
		<div id='banner'><img src="evenue.png" id='evenue' height='75'></div>
		<ul id="menu">
			<li><a href=index.php>Home</a></li>
			<li><a href="events.php">Events</a>
				<ul>
					<li><a href="addevent.php">Add Event</a></li>

				</ul>
			</li>
			<li><a href="venues.php">Venues</a>
				<ul>
					<li><a href="addvenue.php">Add Venue</a></li>

				</ul>
			</li>
	</ul>

<br>
<br>
<div id='banner'><img src="venues.png" id='evenue' height='16'></div><br>
<table id='left'><tr>
					<td>
					<?php
		$result = pg_query($conn, "SELECT * FROM venues;");
		while ($row = pg_fetch_assoc($result) ){
			$img_pathumb = "uploads/".$row['thumbname'];
			$img_pathfp = "uploads/".$row['fpimagename'];
		echo   "<table id='roller'>
								<tr>
								<td></td>
		            <td><img src=".$img_pathumb." height='100'></td>
		            <td>
								<ul>
									<li>Venue name: ".$row['venuename']."</li>
		              <li>Capacity: ".$row['capacity']."</li>
								<li>City: ".$row['city']."</li>
								<li>Address: ".$row['address']."</li>
								</ul>
								</td>

		        </tr>";
		}
		echo  "</table></body></html>";

?>
</td>
</tr>

</table>
		<script type="text/javascript" src="fred.js" ></script>

	</body>
</html>
