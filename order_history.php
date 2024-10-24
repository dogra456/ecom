<?php 
include"connection.php";

if (!isset($_SESSION['user_id'])) {
	header("location:login.php");
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<?php include"head.php"; ?>
 	<style type="text/css">
 		body{
 			background: white;
 		}
 	</style>
 </head>
 <body style="padding-top:150px;">
 <?php include"header.php"; ?>

 <?php 
  $customer_id = $_SESSION["user_id"];
  $sql="select * from orders where user_id ='$customer_id'";
  $result=$connection->query($sql);

  if ($result->num_rows > 0) {
  	 $i=1;
  }
  ?>

      <div class="card mt-4">
  <div class="card-header" style="background-color:floralwhite;">
    <div class="row">
    	<div class="col-6"><?php echo "username: ".$_SESSION['username'];?></div>
    	<div class="col-6"><h5>Order Details :</h5></div>
    </div>
  </div>
  <div class="card-body table-responsive">
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Order Id</th>
      <th scope="col">Total Price</th>
      <th scope="col">Order Date</th>
      <th scope="col">Reference No.</th>
      <th scope="col">Details</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    </tr>
    <?php 
       foreach($result as $row)
          {
             ?>
       <tbody>
         <tr class="align-middle">
           <th scope="row"><?= $i ?></th>
           <td><?= $row['order_id']?></td>
           <td>Rs.<?= $row['total_price']?></td>
           <td><?= $row['order_date']?></td>
           <td><?= $row['reference_id']?></td>
           <td><a href="order_details.php">View Details</a></td>    
         </tr>
       <?php
          $i++;
          }
        
          ?>
  </tbody>
</table>

<!-- footer -->
    <?php include('footer.php') ?>
</body>
</html>

 </body>
 </html>