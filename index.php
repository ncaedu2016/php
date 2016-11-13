<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default ">
    <ul  class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="edited.php">Edited Data</a></li>
      <li><a href="deleted.php">Deleted Data</a></li>
    </ul>
  </div>
</nav>
<div class="well col-sm-3"> 
<p>Entry Form</p>
<form role="form" action="index.php" method="POST">
    <div class="form-group">
      <input type="text" name="sName" class="form-control" id="name" placeholder="Enter Stock Name" />
    </div>
    <div class="form-group">
      <input type="text" name="sPrice" class="form-control" id="price" placeholder="Enter Stock Price">
    </div>
    <input type="submit" name="submit">
  </form>
</div>

<?php 

$con=mysqli_connect("localhost","root","","rebus");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM stock");
?>

<div class="well col-sm-6">
<h4>Stock table</h4>
<table border='1' class="table table-bordered" >
  <tr>
    <th>Stock ID</th>
    <th>Stock Name</th>
    <th>Stock Price</th>
  </tr>
<?php while($row = mysqli_fetch_array($result)){ ?>
  <tr>
    <td><?php echo $row['sId']; ?></td>
    <td><?php echo $row['sName']; ?></td>
    <td><?php echo $row['sPrice']; ?></td>
    <td>
    <a href='index.php?ed=<?php echo $row['sId']; ?>'  class="btn btn-warning btn-xs" role="button">Edit</a>
    <a href='index.php?id=<?php echo $row['sId']; ?>'  class="btn btn-danger btn-xs" role="button">Delete</a>
    </td>
  </tr>
<?php } ?>
</table>
</div>







<?php
if(isset($_POST["submit"])){
error_reporting(1);



$result = mysqli_query($con,"SELECT * FROM stock");
$no = mysqli_num_rows($result);
$no1 = $no + 1;
$no1 = time();
$sName = mysqli_real_escape_string($con, $_POST['sName']);
$sPrice = mysqli_real_escape_string($con, $_POST['sPrice']);

$sql="INSERT INTO stock (sId ,sName, sPrice)
VALUES ('$no1','$sName', '$sPrice')";   
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
header("location:index.php");

}
?>

<?php
$dDate = Date("Y-m-d");
if(isset($_GET["id"])){
$id = $_GET['id'];
$did;
$dname;
$dprice;
$dDate = Date("Y-m-d");
///select
$result = mysqli_query($con,"SELECT * FROM stock WHERE sId= $id");
while($row = mysqli_fetch_array($result)) {
	$did = $row['sId'];
	$dname = $row['sName'];
	$dprice = $row['sPrice'];
}

mysqli_query($con,"DELETE FROM stock WHERE sId= $id ");

$sql="INSERT INTO deleted (sId ,sName, sPrice,sDate)
VALUES ('$did','$dname', '$dprice','$dDate')";   
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
header("location:index.php");
}
?> 

<!-- edit -->
<?php
$eid;
$ename;
$eprice;
if(isset($_GET["ed"])){
$ed = $_GET['ed'];


$result = mysqli_query($con,"SELECT * FROM stock WHERE sId= $ed");
while($row = mysqli_fetch_array($result)) {
?>
<?php	$eid = $row['sId']; ?>

<?php 	$ename = $row['sName']; ?>
<?php 	$eprice = $row['sPrice']; ?>
<?php } ?>
<div class="well col-sm-3"> 
<p>Edit Form</p>
<form role="form" action="index.php" method="GET">
    <div class="form-group">
      <input type="text" name="edId" class="form-control hide" id="name" value='<?php echo $eid; ?>'/>
    </div>
    <div class="form-group">
      <input type="text" name="bName" class="form-control hide" id="name" value='<?php echo $ename; ?>'/>
    </div>
    <div class="form-group">
      <input type="text" name="bPrice" class="form-control hide" id="price" value='<?php echo $eprice; ?>' >
    </div>
    <div class="form-group">
      <input type="text" name="edName" class="form-control" id="name" value='<?php echo $ename; ?>'/>
    </div>
    <div class="form-group">
      <input type="text" name="edPrice" class="form-control" id="price" value='<?php echo $eprice; ?>' >
    </div>
    <input type="submit" name="submit" value="update">
  </form>
  </div>
<?php } ?>
<? mysqli_close($con); ?>
<!-- update -->
<?php 
if(isset($_GET["submit"])){
$editid = $_GET['edId'];
$editname = $_GET['edName'];
$editprice = $_GET['edPrice'];
$bname = $_GET['bName'];
$bprice = $_GET['bPrice'];
// mysqli_query($con,"UPDATE stock SET sName = $editname AND sPrice = $editprice WHERE sId = $editid");
echo $editid;
echo $editname;
echo $editprice;

$conn = new mysqli("localhost", "root", "", "rebus");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE stock SET sName = '$editname'  WHERE sId = '$editid' ";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql = "UPDATE stock SET sPrice = '$editprice' WHERE sId = '$editid' ";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql = "INSERT INTO edited (sId, bName, bPrice, aName, aPrice, eDate)
VALUES ('$editid', '$bname', '$bprice','$editname','$editprice','$dDate')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}









$conn->close();
header("location:index.php");
}

?>




</body>
</html>