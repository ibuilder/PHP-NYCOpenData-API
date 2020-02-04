<?php
error_reporting(0);

 
 $id='181';
  $id=$_GET['id'];
  // $url='https://data.cityofnewyork.us/id/ipu4-2q9a.json?$query=select%20*%2C%20%3Aid%20search%20%27'.$id.'%27&$$app_token=x3LTwBxAzd21ZTjtLeBI3C0JM' ;
    $url='https://data.cityofnewyork.us/api/id/rfu7-paqe.json?$query=select%20*%2C%20%3Aid%20where%20(%60block%60%20%3D%20'.$id.')%20order%20by%20%60boro%60%20asc%2C%20%60block%60%20asc%2C%20%60lot%60%20asc%20limit%20100';
$url='https://data.cityofnewyork.us/api/id/e98g-f8hy.json?$query=select%20*%2C%20%3Aid%20limit%20100';
// Initialize a CURL session. 
$ch = curl_init();  

// Return Page contents. 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

//grab URL and pass it to the variable. 
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
   
 
<table class="table table-dark" style="">
   
    <tr>
		<th scope="col"> Permit BIN </th>
		<th scope="col">Permit Application Job Number </th>
		<th scope="col"   >Permit Application Document Number </th>
		<th scope="col"   >  Permit application job type</th>
		<th scope="col"   > Permit type </th>
		<th scope="col"   > Permit subtype </th>
		<th scope="col"   >  Permit status </th>

		<th scope="col"   > Permit sequence  </th>
		<th scope="col"   > permit status  </th>
		<th scope="col"   >  Permit issuance</th>

        
    </tr>
	 
  <tbody>
	 <?php
	 
		for($i = 0 ;$i <count($array);$i++){
			?>
			
    <tr>
		<th scope="col"><?php echo $array[$i]['permit_bin']?></th>
		<th scope="col"><?php echo $array[$i]['permit_application_job_number']?> </th>
		<th scope="col"   ><?php echo $array[$i]['permit_application_document_number']?> </th>
		<th scope="col"   > <?php echo $array[$i]['permit_application_job_type']?></th>
		<th scope="col"   > <?php echo $array[$i]['permit_type']?> </th>
		<th scope="col"   > <?php echo $array[$i]['permit_subtype']?> </th>
		<th scope="col"   > <?php echo $array[$i]['permit_status_description']?></th>

		<th scope="col"   > <?php echo $array[$i]['permit_sequence_number']?> </th>
		<th scope="col"   > <?php echo date('Y-m-d',strtotime($array[$i]['permit_status_date']))?> </th>
		<th scope="col"   >  <?php echo date('Y-m-d',strtotime($array[$i]['permit_issuance_date']))?></th>

        
    </tr>
	 
			<?php
		
		}
	 ?>
  </tbody>
</table>
</body>
</html>