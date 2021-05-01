<?php
$conn_string = "host=13.210.214.176 port=5432 dbname=test user=blairuser password=Fiddler56!";
$conn = pg_connect($conn_string);

?>

<?php
session_start();
$target_dir2 = "uploads/";
$target_file2 = $target_dir2 . basename($_FILES["imagename"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["imagename"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file2)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["imagename"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk === 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["imagename"]["tmp_name"], $target_file2)) {
    // echo "The file ". htmlspecialchars( basename( $_FILES["imagename"]["name"])). " has been uploaded.";
    $eventname = $_POST['eventname'];
    // $thumbname = $_POST['imagename'];
    $imagename = $_FILES['imagename']["name"];
    $venuename = $_POST['venuename'];
    $sdate = $_POST['sdate'];
    $stime = $_POST['stime'];
    $edate = $_POST['edate'];
    $etime = $_POST['etime'];

    $query = "INSERT INTO events (eventname, imagename, venuename, sdate, stime, edate,etime) VALUES ('".$eventname."', '".$imagename."', '".$venuename."', '".$sdate."', '".$stime."',  '".$edate."', '".$etime."')";
    pg_query($conn, $query);

      $nextquery = "SELECT lastval();";
      $nextresult = pg_query($conn,$nextquery);
      $finalresult = pg_fetch_row($nextresult);
    $_SESSION['EVENT_ID'] = $finalresult[0];
    header("Location:add-event-image.php?event=".$finalresult[0] );
      // header("Location:events.php");
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>
