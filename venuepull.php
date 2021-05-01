<?php
$conn_string = "host=13.210.214.176 port=5432 dbname=test user=blairuser password=Fiddler56!";
$conn = pg_connect($conn_string);
?>
<?php
		$result = pg_query($conn, "SELECT * FROM venues WHERE id='1';");
		while ($row = pg_fetch_assoc($result) ){
		echo   "<tr>
		            <td>".$row['id']."</td><br>
		            <td>".$row['venuename']."</td><br>
		          <td><img src=".$row['thumbname']." height='100'></td><br>
		            <td>".$row['capacity']."</td><br>
								<td>".$row['city']."</td><br>
								<td>".$row['address']."</td><br>
								<td><img src=".$row['fpimagename']." height='100'></td><br>

		        </tr>";
		}
		echo  "</table></body></html>";
?>
