
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
		<style>

		.gridcell, #div1, #div2{
		  float: left;
		  width: 18px;
		  height: 18px;
		  margin: 0px;

		  padding: 0px;
		  border: 0.1px transparent;
		  line-height: 0.5;

		}
		#gridtable {
		  display:grid ;
		  background-image: aumfloorplan.png;

		}
		#grid-table {
			<?php
			$id = $_REQUEST['event'];
				$result = pg_query($conn, "select * from events,venues where events.id=".$id." and events.venuename=venues.venuename;");

				$background = pg_fetch_assoc($result);?>
		    /* background-image: url(uploads/aumfloorplan.png); */
				background-image: url(uploads/<?php echo $background['fpimagename'] ?>);

				display:grid;
		    width: 480px;
		    height; 480px;
				margin-left:auto;
				margin-right:auto;
				border-style:outset;
				background-color: #f5f0ff;
				border-top-left-radius: 4px;
				border-top-right-radius: 4px;
				border-bottom-left-radius: 4px;
				border-bottom-right-radius: 4px;
		}

		#bluebutton{
		  background-color: DodgerBlue;
		  color: #fff;
		}
		</style>
		<script>
		function allowDrop(ev) {
		  ev.preventDefault();
		}

		function drag(ev) {
		  ev.dataTransfer.setData("text", ev.target.id);
		}

		function drop(ev) {
		  ev.preventDefault();
		  var data = ev.dataTransfer.getData("text");
		  ev.target.appendChild(document.getElementById(data));
		  //Send data to the database.
		  var gridData = {
		    'position':ev.target.id,
		    'image':ev['srcElement'].getElementsByTagName('img')[0].getAttribute('src'),
		    'event':4
		  };
		  // console.log(ev);

		  let jsonString = JSON.stringify(gridData);
		  post(jsonString,'image-grid-db.php');

		}

		async function post(data, url) {
		  const reponse = await fetch(url,{
		    method:'POST',
		    headers: {
		      'Content-Type':'application/json'
		    },
		    body:data
		  });
		  return response.json();
		}
		</script>
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

	<table width="480" height="480" id="grid-table"gridtable"><tr><td>
	<div id="div1"  class="gridcell" style="border-color: grey;" ondrop="drop(event)" ondragover="allowDrop(event)">


	</div>    <div id="div2"  class="gridcell" style="border-color: grey;" ondrop="drop(event)" ondragover="allowDrop(event)">

	</div>  <br><br>

	<?php
	//$pgsomething = pg_prepare
	$eventid = 0+$_REQUEST['event'];
	$result = pg_query($conn, "select locdata,locimage,id,eventid from imagelocs where eventid=$eventid;");


 	$artifacts = array();


	//$locdata = $_POST['eventname'];
	while ($row_users = pg_fetch_array($result)) {

		$locData =   $row_users['locdata']; # This is what goes here
		$locImage =   $row_users['locimage']; # This is what goes here

		$artifacts[$locData]=$locImage;


	}


	  for ($i=0; $i<546; $i++){




	  ?>  <div id="grid<?php echo $i ?>" class="gridcell" style="border-color: grey;" ondrop="drop(event)" ondragover="allowDrop(event)">
			<?php if (isset($artifacts["grid$i"])){   ?>
				<img src="<?php echo $artifacts["grid$i"]?>" draggable="false" ondragstart="drag(event)" id="drag1" width="22" height="22">
			<?php } ?></div><?php
	  }







	?>
<table>	<button id="bluebutton" type="button" onclick="a href="events.php"><a href="events.php"> DONE </a></button>
</table>
	</tr>
	</table>
	<!-- <button id="clickme"> Submit </button> -->
		<script type="text/javascript" src="fred.js" ></script>

	</body>
</html>
