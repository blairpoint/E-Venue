<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MobileAddEvent</title>
<link href="jquery.ui.core.min.css" rel="stylesheet" type="text/css" />
<link href="jquery.ui.theme.min.css" rel="stylesheet" type="text/css" />
<link href="jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css" />
<script src="jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="jquery.ui-1.10.4.datepicker.min.js" type="text/javascript"></script>
</head>

<body>
<br />
<table id='left'>
  <tr>
    <td><form action="addevent-code.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <label for="ename"> Event name:</label>
      <br />
      <input type="text" name="eventname" style="width:400px" />
      <br />
      <label for="thumb"> Thumbnail:</label>
      <br />
      <input type="file" name="imagename" id="thumbToUpload" />
      <br />
      <label for="ev-ven"> Event Venue: </label>
      <br />
      <div class="autocomplete" style="width:500;">
        <input id="myInput" type="text" name="venuename" placeholder="" />
      </div>
      <script>
 var venues = [];
 <?php
		$arr=array();
		$result = pg_query($conn, "SELECT venuename FROM venues;");
		//$venuearray = venues();
$i = 0;
		while ($row = pg_fetch_assoc($result) ){
			$arr[]=$row['venuename'];
		}
		echo "venues=".json_encode($arr);
		// find a way to iterate the array
?>

 //var venues = ["TSB Arena","Aum"];
 function autocomplete(inp, arr) {
   /*the autocomplete function takes two arguments,
   the text field element and an array of possible autocompleted values:*/
   var currentFocus;
   /*execute a function when someone writes in the text field:*/
   inp.addEventListener("input", function(e) {
       var a, b, i, val = this.value;
       /*close any already open lists of autocompleted values*/
       closeAllLists();
       if (!val) { return false;}
       currentFocus = -1;
       /*create a DIV element that will contain the items (values):*/
       a = document.createElement("DIV");
       a.setAttribute("id", this.id + "autocomplete-list");
       a.setAttribute("class", "autocomplete-items");
       /*append the DIV element as a child of the autocomplete container:*/
       this.parentNode.appendChild(a);
       /*for each item in the array...*/
       for (i = 0; i < arr.length; i++) {
         /*check if the item starts with the same letters as the text field value:*/
         if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
           /*create a DIV element for each matching element:*/
           b = document.createElement("DIV");
           /*make the matching letters bold:*/
           b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
           b.innerHTML += arr[i].substr(val.length);
           /*insert a input field that will hold the current array item's value:*/
           b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
           /*execute a function when someone clicks on the item value (DIV element):*/
               b.addEventListener("click", function(e) {
               /*insert the value for the autocomplete text field:*/
               inp.value = this.getElementsByTagName("input")[0].value;
               /*close the list of autocompleted values,
               (or any other open lists of autocompleted values:*/
               closeAllLists();
           });
           a.appendChild(b);
         }
       }
   });
   /*execute a function presses a key on the keyboard:*/
   inp.addEventListener("keydown", function(e) {
       var x = document.getElementById(this.id + "autocomplete-list");
       if (x) x = x.getElementsByTagName("div");
       if (e.keyCode == 40) {
         /*If the arrow DOWN key is pressed,
         increase the currentFocus variable:*/
         currentFocus++;
         /*and and make the current item more visible:*/
         addActive(x);
       } else if (e.keyCode == 38) { //up
         /*If the arrow UP key is pressed,
         decrease the currentFocus variable:*/
         currentFocus--;
         /*and and make the current item more visible:*/
         addActive(x);
       } else if (e.keyCode == 13) {
         /*If the ENTER key is pressed, prevent the form from being submitted,*/
         e.preventDefault();
         if (currentFocus > -1) {
           /*and simulate a click on the "active" item:*/
           if (x) x[currentFocus].click();
         }
       }
   });
   function addActive(x) {
     /*a function to classify an item as "active":*/
     if (!x) return false;
     /*start by removing the "active" class on all items:*/
     removeActive(x);
     if (currentFocus >= x.length) currentFocus = 0;
     if (currentFocus < 0) currentFocus = (x.length - 1);
     /*add class "autocomplete-active":*/
     x[currentFocus].classList.add("autocomplete-active");
   }
   function removeActive(x) {
     /*a function to remove the "active" class from all autocomplete items:*/
     for (var i = 0; i < x.length; i++) {
       x[i].classList.remove("autocomplete-active");
     }
   }
   function closeAllLists(elmnt) {
     /*close all autocomplete lists in the document,
     except the one passed as an argument:*/
     var x = document.getElementsByClassName("autocomplete-items");
     for (var i = 0; i < x.length; i++) {
       if (elmnt != x[i] && elmnt != inp) {
       x[i].parentNode.removeChild(x[i]);
     }
   }
 }
 /*execute a function when someone clicks in the document:*/
 document.addEventListener("click", function (e) {
     closeAllLists(e.target);
 });
 }
 autocomplete(document.getElementById("myInput"), venues);

 </script>
      <br />
      <label for="sdate"> Start Date:</label>
      <input type="text" id="sdate" name="sdate" style="width:100px" />
      <label for="stime"> Time:</label>
      <input type="text" id="starttime" name="stime" style="width:100px" />
      <br />
      <label for="sdate"> End Date:</label>
      <input type="text" id="edate" name="edate" style="width:100px" />
      <label for="etime"> Time:</label>
      <input type="text" id="endtime" name="etime" style="width:100px" />
      <br />
      <input type="submit" value="NEXT -&gt;" name="submit" />
    </form>
      <br /></td>
  </tr>
</table>
<script type="text/javascript">
$( function() {
	$( "#edate" ).datepicker();
} );
$( function() {
	$( "#sdate" ).datepicker();
} );
</script>
</body>
</html>
