<?php 
include"common/connection.php";

if (!isset($_SESSION['admin_user'])) {
	header("location:login.php");
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<?php include"common/head.php"; ?>
 	<style type="text/css">
 		body{
 			background: white;
 		}
 	</style>
 </head>
 <body >
 <?php include"common/header.php"; ?>


 <?php 
  $customer_id = $_SESSION["admin_user"];
  $sql="select * from orders";
  $result=$connection->query($sql);

  if ($result->num_rows > 0) {
  	 $i=1;
  }
  ?>

      <div style="padding-right: 10px;" class="card mt-4" style="margin-left:100px;">
  <div class="card-header" style="background-color:floralwhite;">
    <div class="row">
    	<div class="col-6"><?php echo "Admin Name: ".$_SESSION['admin_user'];?></div>
    	<div class="col-6"><h5>ALL ORDERS :</h5></div>
    </div>
  </div>


                          <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                          <tr>
                                            <th scope="col">S.No</th>
                                            <th scope="col">User Id</th>
                                            <th scope="col">Total Price</th>
                                            <th scope="col">Order Date</th>
                                            <th scope="col">Reference No.</th>
                                          </tr>
                                        </thead>
                                         <tbody>
                                              <?php 
                                                 foreach($result as $row)
                                                    {
                                                       ?>
                                                   <tr class="align-middle">
                                                     <th scope="row"><?= $i ?></th>
                                                     <td><?= $row['user_id']?></td>
                                                     <td>Rs.<?= $row['total_price']?></td>
                                                     <td><?= $row['order_date']?></td>
                                                     <td><?= $row['reference_id']?></td>    
                                                   </tr>
                                                 <?php
                                                    $i++;
                                                    }
                                                  
                                                    ?>
                                            </tbody>
                                </table>
                            </div>
                        </div>

<!-- footer -->


    <?php include('common/footer.php') ?>
</body>
</html>

 </body>
 </html>