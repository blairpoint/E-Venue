
<?php
$conn_string = "host=13.210.214.176 port=5432 dbname=test user=blairuser password=Fiddler56!";
$conn = pg_connect($conn_string);
?>

<!DOCTYPE html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
		<meta charset="utf-8">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
	$( "#datepicker" ).datepicker();
} );
</script>

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
	<canvas id="myCanvas" width="200" height="100" style="background-image:'aumfloorplan.JPG' border:1px solid #000000;">
	</canvas>
	<script>
	var c = document.getElementById("myCanvas");
	var ctx = c.getContext("2d");
	var img = document.getElementById("pin.jpg");
	ctx.drawImage(img, 10, 10);
	</script>
	<table id='left'>
		<tr>


	<td>
			<form action="addevent-code.php" method="post" enctype="multipart/form-data" autocomplete="off">

 <?php
 $result = pg_query($conn, "SELECT * FROM venues;");
 while ($row = pg_fetch_assoc($result) ){
 $img_pathumb = "uploads/".$row['thumbname'];
 $img_pathfp = "uploads/".$row['fpimagename'];
 echo   "<table id='roller'>
 			<tr>

 			<td><img src=".$img_pathfp." height='400' width='350'></td>
 	</tr>";
 }
 echo  "</table></body></html>";

 ?>

	<input type="submit" value="submit" name="submit">

</form><br>
</td>
</table>

	<!-- <button id="clickme"> Submit </button> -->
		<script type="text/javascript" src="fred.js" ></script>

	</body>
</html>
