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
<div style="width: 800px;
height: 137px;
border: 0px solid
red;
position: absolute;
background:
white;"></div>
<div style="width: 800px;
height: 137px;
border: 0px solid
red;
position: absolute;
background:
white;bottom:0px"></div>
<iframe src='http://a810-bisweb.nyc.gov/bisweb/PropertyProfileOverviewServlet?boro=1&block=181&lot=20&go3=+GO+&requestid=0' style="width: 800px;height: 1100px;">

<?php die; ?>
 