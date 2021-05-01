<!DOCTYPE HTML>
<html>
<head>
<style>

.gridcell, #div1, #div2{
  float: left;
  width: 18px;
  height: 18px;
  margin: 0px;

  padding: 0px;
  border: 0.1px solid black;
  line-height: 0.5;

}
#gridtable {
  display:grid ;
  background-image: aumfloorplan.png;

}
#grid-table {
    background-image: url(uploads/aumfloorplan.png);
    width: 480px;
    height; 480px;
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
<body>
<table width="480" height="480" id="grid-table"gridtable"><tr><td>
<div id="div1"  style="border-color: grey;" ondrop="drop(event)" ondragover="allowDrop(event)">
  <img src="pinmain.jpg" draggable="true" ondragstart="drag(event)" id="drag1" width="22" height="22">

</div>    <div id="div2"  style="border-color: grey;" ondrop="drop(event)" ondragover="allowDrop(event)">
  <img src="toilet.png" draggable="true" ondragstart="drag(event)" id="drag2" width="22" height="22">
</div>  <br><br>

<?php

  for ($i=0; $i<504; $i++){
  ?>  <div id="grid<?php echo $i ?>"  class="gridcell" style="border-color: grey;" ondrop="drop(event)" ondragover="allowDrop(event)"></div><?php
  }
?>
</tr>
</table>





</body>
</html>
