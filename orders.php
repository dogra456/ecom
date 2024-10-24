<!-- database connectivity -->
<?php include"connection.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- links attachment -->
    <?php include('head.php')  ?>
    <title>CHECKOUT | E-COMMERCE</title>
    <style type="text/css">
        body{
            background: white;
        }
    </style>
</head>
<body class="bg">
     <!-- top navbar -->
    <?php include('header.php')   ?>
    
    <?php
    if(!isset($_SESSION['user_id']))
  echo "<h4 class='mt-4'><center>USER NOT LOGGED IN<center></h4>";
    
// retreiving cart data with respect to user_id
else
  {
    $user_id_signed_in = $_SESSION['user_id'];
    $sql = "            select 
                c.user_id,p.product_name,p.product_img,c.qty,p.product_id, 
                p.product_price
                from cart c
                inner join
                products p
                on c.product_id=p.product_id
                and c.user_id='$user_id_signed_in'";

 

    $result = $connection->query($sql);
    if($result->num_rows==0)
    {
      echo '<h4><center>YAY! NOTHING TO SHOW</center></h4>';
    }
    else
    {
      $i = 1;
      $total = 0;
    ?>
<div class="conatiner" style="padding-top:150px;">
    <div class="card mt-4 table-responsive">
        <div class="card-header" style="background-color:floralwhite;">
            <h5 class="fs-4">PROCEED TO CHECKOUT :</h5>
        </div>
    <div class="card-body">
    <div class="row">
        <div class="col-md-7">
            <div class="text-center fw-bold fs-5 text-dark mt-2 mb-3">SHIPPING DETAILS</div>
        <div class="card">
            <ul class="list-group list-group-flush text-uppercase fw-semibold fs-6">
                <?php
                // customer saved address getting by cust_id
                 $shipping = "select * from users where user_id = '$user_id_signed_in'";
                 $shipping_details = $connection->query($shipping);
                 $shipping_row=$shipping_details->fetch_assoc();
                ?>
                <li class="list-group-item"><span class="spacing">Name : </span>
                <?= $shipping_row['username']?></li>
                <li class="list-group-item"><span class="spacing">Adress : </span>
                <?= $shipping_row['address']?></li>
                <li class="list-group-item"><span class="spacing">Pincode : </span></li>
                <li class="list-group-item"><span class="spacing">Phone : </span>+91 <?= $shipping_row['phone_number']?></li>
            </ul>
</div>     
        </div>
        <div class="col-md-5">
            <table class="table text-center caption-top">
                <caption class="text-center fw-bold fs-5 text-dark">CART DETAILS</caption>
  <?php 
  foreach($result as $row)
     {
        ?>
                <tbody style="font-size: 13px;">
                    <tr class="align-middle fw-semibold">
                    <th scope="row"><?= $i ?></th>
                    <td><img src="<?= "assets/img/product/" . $row['product_img'] ?>"
                        class="card-img-top object-fit" alt=".." height="90px"></td>
                    <td><?= $row['product_name']?></td>
                    <td>&#x20B9; <?= $row['product_price']?></td>
                    <td>&#x2718;</td>
                    <td><?= $row['qty']?></td>
                    <td>&#x20B9; <?= $sub_total = $row['product_price']*$row['qty']?></td>
                    </tr>
  <?php
    $total = $sub_total + $total;
    $i++;
    }
    ?>
                    <tr>
                        <table class="table table-success">
                        <tr>
                        <td>
                        <p class="text-center fw-bold mb-0 fs-5">GRAND TOTAL = &#x20B9; <?= $total ?></p>
                        </td>
                        </tr>
                        </table>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
</div>
    
<a href="confirmorders.php?order_value=<?= $total ?>" class="ms-auto me-2">
<div class="col-md-12 bg-primary text-center">
<button class="btn btn-primary fs-5">Confirm Order</button>
</div>
</a>

<?php
    }
}
?>
<!-- footer -->
<?php include('footer.php') ?>
</body>
</html>