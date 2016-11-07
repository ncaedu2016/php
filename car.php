<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../../maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="../../ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="../../maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="row">
    <div class="col-sm-6 col-xs-12 col-md-4" style="background-color:lavender;">.col-sm-4</div>
    <div class="col-sm-6 col-xs-12 col-md-4" style="background-color:lavenderblush;">.col-sm-4</div>
    <div class="col-sm-6 col-xs-12 col-md-4" style="background-color:lavender;">.col-sm-4</div>
  </div>
  <button type="button" class="btn btn-default">Default</button>
<form method="post" action="car.php">
   Weight(ton): <input type="text" name="weight">
   <br>
	Car type: 
   <input type="radio" name="type" value="1">PASSENGER
   <input type="radio" name="type" value="2">TRACK<br>
   <input type="submit" name="submit" value="Submit">
</form>

<?php 
error_reporting(1);
	$price;
	 $weight = $_POST["weight"];
	 $type = $_POST["type"];
	 if($weight <= 1){
	 	$price = 300;
	 }else if($weight < 3.1 ){
	 	if($type == 1){
	 		$price = $weight * 350;
	 	}else{
	 		$price = $weight * 450;
	 	}
	 }else if($weight < 6.1){
	 	if($type == 1){
	 		$price = $weight * 420;
	 	}else{
	 		$price = $weight * 560;
	 	}
	 }else if($weight < 10.1){
	 	if($type == 1){
	 		$price = $weight * 500;
	 	}else{
	 		$price = $weight * 720;
	 	}
	 }else{
	 	$price = $weight * 800;
	 }

 ?>
 <p>Cost :<?php echo $price;?> kyats </p>
 
</body>
</html>