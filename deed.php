<?php
error_reporting(0);
$id='181';
$id=$_GET['id'];
$url='https://data.cityofnewyork.us/api/id/rfu7-paqe.json?$query=select%20*%2C%20%3Aid%20where%20(%60block%60%20%3D%20'.$id.')%20order%20by%20%60boro%60%20asc%2C%20%60block%60%20asc%2C%20%60lot%60%20asc%20limit%20100';
$ch = curl_init();  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_URL, $url); 
$result = curl_exec($ch); 
$array=json_decode($result,true);
  
  $arraydata=array();
  for($i = 0; $i <count($array) ;$i++){
	if($array[$i]['block'] ==	 $id){
	
		$arraydata=$array[$i];
	}
  
  }
   
?>
 
<html>

<body>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
 
<table class="table table-dark">
   
    <tr>
      <th scope="col">Borough Description  : <?php echo $arraydata['boro_description'];?></th>
      <th scope="col">Block: <?php echo $arraydata['block'];?></th>
      <th scope="col"   >Lot : <?php echo $arraydata['lot'];?></th>
      <th scope="col">Id :<?php echo $arraydata[':id'];?></th>
	   <th scope="col"  >State / Zip : <?php echo $arraydata['property_disposed_to_state'].' / '.$arraydata['property_disposed_to_zip'];?></th>     
       
    </tr>
	 <tr>
      <th scope="col">Commonly known name <br/> <?php echo $arraydata['commonly_known_name'];?></th>
      <th scope="col">Street Name <br/>  <?php echo $arraydata['property_disposed_to_street_name'];?></th>
      <th scope="col" >City <br/>  <?php echo $arraydata['property_disposed_to_city'];?></th>
      <th scope="col">Pdf <br/> <a href="<?php echo $arraydata['electronic_link_to_deed_lease_easement'][url];?>">click here</a></th>
	   <th scope="col"  >Location <br/>  <?php echo $arraydata['location'];?></th>     
      
    </tr>
	<tr>
      <th scope="col" colspan="5">Description <br/> <?php echo $arraydata['restriction'];?></th>
       
      
    </tr>
  <tbody>
	 
  </tbody>
</table>
</body>
</html>