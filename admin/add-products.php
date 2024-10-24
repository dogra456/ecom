<?php 
include"common/connection.php";

if (!isset($_SESSION['admin_user'])) {
	header('location: index.php');
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<?php include"common/head.php"; ?>
 	<style>
    /* Custom CSS for additional styling */
    .form-table {
        margin: 100px auto;
        max-width: 500px;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    /* Animation */
    .form-table tr {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.4s ease, transform 0.4s ease;
    }
    .form-table tr.animated-row {
        opacity: 1;
        transform: translateY(0);
    }
</style>

 </head>
 <body>
 <?php include"common/header.php"; ?>


 <?php 
  $message='';
  if (isset($_POST['submit'])) {
  	 $tar_dir='../assets/img/product/';
  	 $product_img=basename($_FILES['product_img']['name']);
  	 $tar_file =$tar_dir . $product_img;
  	 move_uploaded_file($_FILES['product_img']['tmp_name'], $tar_file);

  	$product_code = $_POST['product_code'];
	$product_name = $_POST['product_name'];
	$product_price = $_POST['product_price'];
	$product_info = $_POST['product_info'];

	$sql="insert into products (product_code, product_name , product_price , product_info , product_img) values ('$product_code','$product_name','$product_price','$product_info','$product_img')";

	$result = $connection->query($sql);
	if ($result)
	{
        		$message = '';
           echo '<script>alert("PRODUCT ADDED SUCCESSFULLY")</script>';
	}
	else
	{
		echo "some error occured";
	}

	
}

  ?>

  <center><strong><?= $message ?></strong></center>
<form method="post" action="add-products.php" enctype="multipart/form-data">


<div class="container">
    <form class="form-table" method="POST">
        <table class="table table-bordered">
            <tbody>
                <tr class="animated-row">
                    <td><p>Product Code</p></td>
                    <td><input type="text" name="product_code" class="form-control" required></td>
                </tr>
                <tr class="animated-row">
                    <td><p>Product Name</p></td>
                    <td><input type="text" name="product_name" class="form-control" required></td>
                </tr>
                <tr class="animated-row">
                    <td><p>Product Price</p></td>
                    <td><input type="text" name="product_price" class="form-control" required></td>
                </tr>
                <tr class="animated-row">
                    <td><p>Description</p></td>
                    <td><textarea type="text" rows="5" style="width: 100%;" name="product_info" class="form-control" required></textarea></td>
                </tr>
                <tr class="animated-row">
                    <td><p>Product Image</p></td>
                    <td><input type="file" name="product_img" class="form-control" required></td>
                </tr>
                <tr class="animated-row">
                    <td colspan="2" align="center"><input type="submit" value="Submit" name="submit" class="btn btn-primary"></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

<!-- Bootstrap Bundle with Popper -->
<script>
    // JavaScript for animating table rows
    document.addEventListener("DOMContentLoaded", function() {
        var rows = document.querySelectorAll('.form-table tr');
        setTimeout(function() {
            rows.forEach(function(row, index) {
                setTimeout(function() {
                    row.classList.add('animated-row');
                }, index * 200);
            });
        }, 500);
    });
</script>
</form>
<?php include("common/footer.php"); ?>
 </body>
 </html>