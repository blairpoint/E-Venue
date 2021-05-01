<?php
    session_start();
    $inputData = file_get_contents("php://input");
    $jsonData = json_decode($inputData,TRUE);

    $conn_string = "host=13.210.214.176 port=5432 dbname=test user=blairuser password=Fiddler56!";
    $conn = pg_connect($conn_string);

    $location = $jsonData["position"];
    $image = $jsonData["image"];
    $event_id = $_SESSION['EVENT_ID'];

    // $query = "UPDATE events SET locdata='".$location."', locimage='".$image."' WHERE eventname='".$event_name."'";
    $query = "insert into imagelocs (eventid,locdata,locimage,created_time) values (".$event_id.",'".$location."','".$image."',CURRENT_TIMESTAMP )";

    pg_query($conn, $query);

    $conn.close();
?>
