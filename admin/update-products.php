<?php include 'common/connection.php';?>
<!doctype html>
<html lang="en">
    <head>
        <?php include('common/head.php'); ?>
    </head>
    <body>
        
        <?php include("common/header.php"); ?>

<?php
if(isset($_POST['update']))
{
    
    $target_dir = '../assets/img/product/';
    $target_file = $target_dir . basename($_FILES['product_img']['name']);
    $uploadOk = 1;

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["product_img"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["product_img"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }

    $product_id = $_POST['product_id'];
    $product_img = $_FILES['product_img']['name'];
    $product_code_update = $_POST['product_code'];
    $product_name_update = $_POST['product_name'];
    $product_price_update = $_POST['product_price'];
    $product_product_info = $_POST['product_info'];

    $sql = "update products SET product_code = '$product_code_update' , product_name = '$product_name_update' , product_price = '$product_price_update' , product_info = '$product_product_info' , product_img = '$product_img'  WHERE product_id = '$product_id'";

    $update = $connection->query($sql);

    if($update)
    {
        echo "PRODUCT UPDATED SUCCESSFULLY";

    }
    else
    {
        echo "SOME ERROR OCCURED";
    }
}
?>
        <?php
         if(isset($_GET['product_id'])) {

        $product_id = $_GET['product_id'];
        $sql = "SELECT * FROM products where product_id = '$product_id'";

        $result=$connection->query($sql);
        ?>
        <hr>
        <h4>update product</h4>
        <hr>
        <div class="table-responsive">


     <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- DataTales Example -->


                <tbody>
                    <?php
                    foreach ($result as $row);{
                    ?>
                    <tr>
                
        <form  action="update-products.php" method="post" enctype="multipart/form-data">
        <td ></td>
                     <table class="table table-bordered">
            <tbody>
                <tr class="animated-row">
                    <td><h4>Product id</h4></td>
                    
                   <td><input  value="<?= $row['product_code'] ?>" type = "text" name="product_code" ></td>
                    
                </tr>

                <tr class="animated-row">
                    <td><h4>Product Code</h4></td>
                    <td><input   type = "text" value="<?= $row['product_id']; ?>" name="product_id" ></td>
                
                </tr>


                <tr class="animated-row">
                    <td><h4>Product Name</h4></td>
                   <td><input type = "text" value="<?= $row['product_name'] ?>" name="product_name" ></td>
                </tr>

                <tr class="animated-row">
                    <td><h4>Product Price</h4></td>
                      <td><input   value="<?=$row['product_price']?>"type = "number" name="product_price"></td>
                    
                </tr>


                <tr class="animated-row">
                    <td><h4>Description</h4></td>
                         <td><input  type = "text" value="<?= $row['product_info'] ?>" name="product_info" ></td>

                </tr>

                <tr class="animated-row">
                    <td><h4>Product Image</h4></td>
                    <td><img src = "<?= "../assets/img/product/" . $row['product_img'] ?>" height="170px"  width="150">
                               <input style="width:100px; margin-left:30px ;" class="" type="file" name="product_img" >
                           </td>

                </tr>

                <tr >

                 <td> <input style="width:100px; margin-top: " class="btn
                btn-success" type="submit" value="UPDATE" name="update">
                </td>

                </tr>
             
         
            </tbody>
    </tr>
        </table>       
        
                    <?php
                    }
                    ?>

        </form>


                    </tr>
                </tbody>
            </table>
        </div> <?php
        } 
    ?>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>

        </div>
        <!-- End of Content Wrapper -->

        <?php include("common/footer.php"); ?>
    </body>
</html>