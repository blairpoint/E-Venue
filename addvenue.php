
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

<Br>

	<table id='left'>
		<tr>


	<td>
			<form action="upload.php" method="post" enctype="multipart/form-data">
		<label for="vname"> Venue name:</label><br>
	<input type="text" name="venuename"><br>
	<label for="thumb"> Thumbnail:</label><br>

	 	  <input type="file" name="thumbToUpload" id="thumbToUpload">
<br>
	<label for="cap"> Capacity:</label><br>
	<input type="text" name="capacity"><br>
	<label for="city"> City:</label><br>
<input type="text" name="cityname"><br>
<label for="addr"> Address:</label><br>
<input type="text" name="address"><br>
<label for="floorp"> Floorplan:</label><br>
<!-- <form action="upload.php" method="post" enctype="multipart/form-data"> -->
		<input type="file" name="fileToUpload"><br><br>
	<input type="submit" value="submit" name="submit">

</form><br>
</td>
</table>

	<!-- <button id="clickme"> Submit </button> -->
		<script type="text/javascript" src="fred.js" ></script>

	</body>
</html>
