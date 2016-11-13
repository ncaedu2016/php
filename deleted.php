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
<?php 
error_reporting(1);
$con=mysqli_connect("localhost","root","","rebus");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM deleted");
?>

<br>
<div class="col-sm-3"> </div>
<div align="center" class="well col-sm-6">
<h4>Deleted Data table</h4>
<table border='1' class="table table-bordered" >
  <tr>
    <th>Stock ID</th>
    <th>Stock Name</th>
    <th>Stock Price</th>
    <th>Deleted Date</th>
  </tr>
<?php while($row = mysqli_fetch_array($result)){ ?>
  <tr>
    <td><?php echo $row['sId']; ?></td>
    <td><?php echo $row['sName']; ?></td>
    <td><?php echo $row['sPrice']; ?></td>
    <td><?php echo $row['sDate']; ?></td>
  </tr>
<?php } ?>
</table>
</div>
<?php mysqli_close($con); ?>

</body>
</html>