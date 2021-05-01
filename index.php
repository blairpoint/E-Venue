
<?php
$conn_string = "host=13.210.214.176 port=5432 dbname=test user=blairuser password=Fiddler56!";
$conn = pg_connect($conn_string);
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
		<meta charset="utf-8">
		<title>Evenue</title>
		<!-- this is a comment -->
		<link rel="stylesheet" type="text/css" href="style.css" />
		<style type="text/css">
		body,td,th {
    font-family: Ubuntu, sans-serif;
}
body {
    background-image: url();
}
        </style>
    </head>

	<body>
<div id='banner'><img src="evenue.png" id='evenue' height='75'></div>		<ul id="menu">
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
<table id='landing'><tr>
					<td><br>
						<div class="w3-content w3-section" style="max-width:500px">
  <img class="mySlides" src="slideshow1.jfif" style="width:100%">
  <img class="mySlides" src="slideshow2.jpg" style="width:100%">
  <img class="mySlides" src="slideshow3.jpg" style="width:100%">
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
</td>
</tr>

</table>
		<script type="text/javascript" src="fred.js" ></script>

	</body>
</html>
