<?php 
error_reporting(1);
$con=mysqli_connect("localhost","root","","rebus");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM deleted");
?>
<div class="col-sm-6">
<h4>Deleted data</h4>
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