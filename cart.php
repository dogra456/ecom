<?php
include"connection.php";

if (!isset($_SESSION['user_id'])) {
    $_SESSION['last_id'] = $_POST['last_id'];
    header("location: login.php");
}


if (isset($_SESSION['user_id'])) {
    
    $user_id = $_SESSION['user_id'];
    
    if (isset($_POST['qty'])) {
        $product_id = $_POST['last_id'];
        $qty = $_POST['qty'];

         $check_sql = "SELECT * FROM cart WHERE user_id = $user_id AND product_id = $product_id";
        $check_result = $connection->query($check_sql);

        if ($check_result->num_rows > 0) {
            $update_sql = "UPDATE cart SET qty = qty + $qty WHERE user_id = $user_id AND product_id = $product_id";
            $connection->query($update_sql);

        } else {
           
            $insert_sql = "INSERT INTO cart (user_id, product_id, qty) VALUES ($user_id, $product_id, $qty)";
            $connection->query($insert_sql);
        }

        echo "<script type='text/javascript'>alert('product added into cart successfully');</script>" ;
    }

}


$user_id = $_SESSION['user_id'];

$sqlSelect = "
select 
c.user_id,p.product_name,p.product_img,c.qty,p.product_id, 
p.product_price
from cart c
inner join
products p
on c.product_id=p.product_id
and c.user_id=".$user_id." 
";
$result = $connection->query($sqlSelect);


if(isset($_POST['save_qty'])) {
    $product_id = $_POST['product_id'];
    $new_qty = $_POST['new_qty'];
    
    $update_sql = "UPDATE cart SET qty = $new_qty WHERE user_id = $user_id AND product_id = $product_id";    
    $connection->query($update_sql);

    header("location: cart.php");
}
?>


<!DOCTYPE html>
<html>
<head>

    <?php include "head.php"; ?>

    <style type="text/css">
        body{
            background: white;
        }
    </style>

</head>
<body>
    <?php include"header.php"; ?>

        <div class="container mb-5" style="padding-top: 150px;">
            <div class="row">
                <div class="col-md-12 text-center border rounded bg-light my-5">
                    <h1>My Cart</h1>
                </div>

                <div class="col-md-12">
                    <table class="table" style="border-bottom:1px solid ;" width="100%">
    
                      <thead>
                        <tr class="text-center">
                          <th scope="col">product image</th>
                          <th scope="col">product name</th>
                          <th scope="col">product price</th>
                          <th scope="col">quantity</th>
                          <th scope="col">total price</th>
                        </tr>
                      </thead>

                      <?php 
                      $total = 0;
                      foreach ($result as $row) { ?>

                    <tbody>
                        <tr class="text-center">
                          <th scope="row"><img src="assets/img/product/<?= $row['product_img'] ?>" style="height: 100px;"></th>

                          <td><?= $row['product_name'] ?></td>

                          <td><i class="fa-solid fa-indian-rupee-sign"></i><?php echo $row['product_price'];?></td>

                          <td>
                            <p class="old_qty"><?= $row['qty'] ?></p>

                            <form action="cart.php" method="POST">

                              <input type="number" class="form-control new_qty" name="new_qty" style="display: none;" value="<?= $row['qty'] ?>">

                          </td>
                          <td><i class="fa-solid fa-indian-rupee-sign"></i><?= $sub_total= $row['product_price']*$row['qty'] ?></td>

                          <td>

                              <input type="hidden" name="product_id" 
                              value="<?= $row['product_id'] ?>">

                             <button type="button" class="btn btn-success edit-btn">Edit</button>

                             <button type="submit" name="save_qty" style="display: none;" class="btn btn-primary save">Save</button>
                            </form>

                            

                          </td>

                          <td>
                            <form action="delete.php" method="post">

                              <input type="hidden" name="product_id"
                               value="<?=$row['product_id']; ?>">

                              <button type="submit" class="btn btn-danger delete">Delete</button>
                            </form>
                          </td>                       

                        </tr>    
                      </tbody>
                <?php $total= $sub_total + $total; } ?>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-10 "><h1>Grand Total</h1></div>
                <div class="col-2"><h4>Rs.<?php echo $total?></h4></div>
            </div>
            <div class="row">
                <div class="col-6"></div>
                <div class="col-6"> 
                    <form action="orders.php" method="GET">
                        <button type="submit" class="btn btn-danger">Checkout</button>
                    </form>
                </div>

            </div>
        </div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> 

<script type="text/javascript">
                                $(document).ready(function(){
                                    $(".edit-btn").click(function(){
                                        var row = $(this).closest("tr");
                                        row.find(".old_qty").hide();
                                        row.find(".edit-btn").hide();
                                        row.find(".delete").hide();
                                        row.find(".save").show();                           
                                        row.find(".new_qty").show();
                                    });
                                });
</script>
<?php include "footer.php"; ?>
</body>
</html>