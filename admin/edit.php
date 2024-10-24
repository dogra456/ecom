<?php include 'common/connection.php';?>
<!doctype html>
<html lang="en">
    <head>
        <?php include('common/head.php'); ?>
    </head>
    <body>
        
        <?php include("common/header.php"); ?>
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
        
        $target_dir = '../assets/img/product/';
        $product_img = basename($_FILES['product_img']['name']);
        $target_file = $target_dir . $product_img;
        move_uploaded_file($_FILES['product_img']['tmp_name'], $target_file);


        $product_id = $_POST['product_id'];
        $product_code = $_POST['product_code'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_img = $_FILES['product_img']['name'];
        $product_product_info = $_POST['product_info'];
        

        $sql = "update products SET product_img = '$product_img', product_code = '$product_code' , product_name = '$product_name' , product_price = '$product_price' , product_info = '$product_product_info' , product_img = '$product_img'  WHERE product_id = '$product_id'";
        $update = $connection->query($sql);
        

        if($update){
            header('location: product-view.php'); 
        }

    }
    
        ?>
        <?php
         if(isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        $sql = "SELECT * FROM products where product_id = $product_id";
        $result=$connection->query($sql);
        ?>
        <hr>
        <h4>update product</h4>
        <hr>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered border-primary table-sm">
                <thead class="table-secondary">
                    <tr>
                        <th scope="col">Product_Id</th>
                        <th scope="col">Product_Code</th>
                        <th scope="col">Product_Name</th>
                        <th scope="col">Product_Price</th>
                        <th scope="col">product_info</th>
                        <th scope="col">Product_Img</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($result as $row)
                    {
                    ?>

                    <tr>
                
                        <form  action="edit.php" method="post" enctype="multipart/form-data">
        <td ><input style="width:100px;"  type = "text" value="<?= $row['product_id']; ?>" name="product_id" ></td>
        <td><input style="width:100px;" value="<?= $row['product_code'] ?>" type = "text" name="product_code" 
         placeholder="New Product_code"></td>
        <td><input style="width:100px;"type = "text" value="<?= $row['product_name'] ?>" name="product_name" 
         placeholder="New Product_name"></td>
        <td><input style="width:100px;"  value="<?=$row['product_price']?>"type = "number" name="product_price" 
         placeholder="New Product_price"></td>
        <td><input style="width:100px;" type = "text" value="<?= $row['product_info'] ?>" name="product_info" 
         placeholder="New Description"></td>

        <td>
            <p>
                <input style="width:100px; margin-left:30px ;" value="<?= "../assets/img/product/".$row['product_img'] ?>" type="file" name="product_img" >
            </p>
            <img src = "<?= "../assets/img/product/" . $row['product_img'] ?>" height="170px"  width="150">
        </td>
        <td><input style="width:100px; margin-top: 80px;" type="submit" value="UPDATE" name="update">   </td>
    </tr>

        </form>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div> <?php
        } 
    ?>
        <?php include("common/footer.php"); ?>
    </body>
</html>