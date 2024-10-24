<!-- database connectivity -->
<?php include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- links attachment -->
    <?php include('head.php')  ?>
    <style type="text/css">
        body{
            background: white;
        }
    </style>
</head>
<body class="bg">
     <!-- top navbar -->        
    <?php
    $ref_id = '';
    if(isset($_GET['order_value']))
    {
        $user_in = $_SESSION['user_id'];
        $total_price = $_GET['order_value'];
        $ref_id = $user_in . rand(1000,9999) . $total_price; 
$sql = "insert into orders (user_id, total_price, reference_id) values ('$user_in', '$total_price', '$ref_id')";
        
        

            $insert = $connection->query($sql);
        if($insert > 0)
        {
            $order= "select order_id from orders where reference_id = '$ref_id'";
            $order_id_select = $connection->query($order);
            $order_id_fetch = $order_id_select->fetch_assoc();
            $order_id = $order_id_fetch['order_id'];
            $select = 
            "    select 
                c.user_id,p.product_name,p.product_img,c.qty,p.product_id, 
                p.product_price
                from cart c
                inner join
                products p
                on c.product_id=p.product_id
                and c.user_id='$user_in'";

            $select_from_cart = $connection->query($select);


            if($select_from_cart->num_rows>0)
            {
                foreach($select_from_cart as $row)
                {
                    $product_id = $row['product_id'];

                    $product_price = $row['product_price'];

                    $order_quantity = $row['qty'];

                  
                    $insert_items = "insert into order_items (order_id, product_id, qty, price) values ('$order_id', '$product_id','$order_quantity', '$product_price')";


                    $insert_success = $connection->query($insert_items);

                    if($insert_success)
                    {
                        $delete = "delete from cart where user_id = '$user_in'";
                        $connection->query($delete);
                    }
                }
            }
        }
    }
    ?>
    <div class="card text-center">
  <div class="card-header">
    <h1>Success</h1>
  </div>
  <div class="card-body">
    <h5 class="card-title fs-4">Order is Confirmed</h5>
    <p class="card-text fs-5 fw-semibold">Reference_id <?=$ref_id?></p>
    <a href="order_history.php" class="btn btn-primary fs-5">Order Details</a>
  </div>
</div>    
<!-- footer -->
<?php include"footer.php"; ?>
</body>
</html>