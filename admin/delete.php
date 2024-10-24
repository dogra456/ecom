<?php include"common/connection.php" ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if(isset($_POST['product_id']))
{
  $product_id = $_POST['product_id'];

  $sql = "DELETE FROM products WHERE product_id = $product_id";

  $remove = $connection->query($sql);

  if($remove)
  {
    echo "PRODUCT DELETED SUCCESSFULLY";
    header("location: product-view.php");
  }
  else
  {
    echo "SOME ERROR OCCURED";
  }
}
}
?>

<?php
//   if (isset($_SESSION['admin_user']) && $_POST['product_id']) {
//     $product_id=$_POST['product_id'];
//     $user_id=$_SESSION['admin_user'];
//     $delete="DELETE FROM product WHERE product_id=$product_id";
//     $check_sql=$conn->query($delete);
//     header("location:product.php");
//   }
// ?>