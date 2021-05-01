
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

	<body style="background: white"><br>
<table width="25" id='left'><tr>
					<td width="15">
					<?php
		$result = pg_query($conn, "select * ,events.id as eventid from venues,events WHERE venues.venuename=events.venuename;");
		while ($row = pg_fetch_assoc($result) ){
			$img_pathumb = "uploads/".$row['imagename'];
			$img_pathfp = "uploads/".$row['fpimagename'];
		echo   "<table id='roller'>
								<tr>
								<td></td>
		            <td><img src=".$img_pathumb." height='100'></td>
		            <td>
								<ul>
									<li>Event name: ".$row['eventname']."</li>
									<li>Venue name: ".$row['venuename']."</li>
									<li>City: ".$row['city']."</li>
		              <li>Start date: ".$row['sdate']." Time: ".$row['stime']." </li>
									<li>End date: ".$row['edate']." Time: ".$row['etime']." </li>
								</ul>
								</td>
								<td><a href=\"edit-event-image.php?event=".$row['eventid']."\"><img src=".$img_pathfp." height='100'></a></td>
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
