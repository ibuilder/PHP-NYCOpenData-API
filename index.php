<?php
/*
PHP NYC Open Data Api Script
Author: Matthew M. Emma
url: https://github.com/ibuilder/PHP-NYCOpenData-API
*/
error_reporting(0);
$url='https://data.cityofnewyork.us/api/id/hzhn-3cmt.json?$limit=1000&$$app_token=x3LTwBxAzd21ZTjtLeBI3C0JM';
$url='https://data.cityofnewyork.us/api/id/rfu7-paqe.json?$query=select%20*%2C%20%3Aid%20order%20by%20%60boro%60%20asc%2C%20%60block%60%20asc%2C%20%60lot%60%20asc%20limit%20100';
$ch = curl_init();  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_URL, $url); 
$result = curl_exec($ch); 
$array=json_decode($result,true);
?>
<html>
<body>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
<script>
function LoadDeed(id) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("resp").innerHTML = this.responseText;
	  document.getElementById("myModal").style.display='block'
	 
    }
  };
  xhttp.open("GET", "deed.php?id="+id, true);
  xhttp.send();
}
 function loadDociframe(id,id1) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
	   document.getElementById("modal-content").style.width='65%'
     document.getElementById("resp").innerHTML = this.responseText;
	  document.getElementById("myModal").style.display='block'
	
	 
    }
  };
  xhttp.open("GET", "iframe.php?id="+id+"&id1="+id1, true);
  xhttp.send();
}
function loadPermit(id) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("resp").innerHTML = this.responseText;
	  document.getElementById("myModal").style.display='block'
	 
    }
  };
  xhttp.open("GET", "deed.php?id="+id, true);
  //xhttp.open("GET", "permit.php?id="+id, true);
  xhttp.send();
}
</script>
  <!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content" id="modal-content">
    <span class="close" onclick='document.getElementById("myModal").style.display="none"'>&times;</span>
    <p id="resp"> </p>
  </div>
</div>
<br>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Description</th>
      <th scope="col" width="50px;">Block</th>
      <th scope="col">Lot</th>
	   <th scope="col" width="50px;">State<br/>Zip</th>   
      <th scope="col">Restriction</th>
	   <th scope="col">Latitude<br/>Longitude</th>
      <th scope="col">View</th>      
    </tr>
  </thead>
  <tbody>
	<?php  
		for($i = 0 ;$i <count($array);$i++){
	?>
    <tr>
		<th scope="row"><?php echo $i+1;?></th>
		<td><?php echo $array[$i]['boro_description']?></td>
		<td><?php echo $array[$i]['block']?></td>
		<td><?php echo $array[$i]['lot']?></td>
		<td><?php echo $array[$i]['property_disposed_to_state'].'<br/>'.$array[$i]['property_disposed_to_zip']?></td> 
		<td><?php echo substr($array[$i]['restriction'],0,50);?></td>
		<td><?php echo $array[$i]['latitude'].'<br/>'.$array[$i]['longitude']?></td>
		<td> <input type="button" name="Permits" value="Permits" onclick="loadDociframe('<?php echo $array[$i]['block']?>','<?php echo $array[$i]['lot']?>')" ><input type="button" name="Deed Info" value="Deed Info" onclick=" loadPermit('<?php echo $array[$i]['block']?>')" ></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</body>
</html>
