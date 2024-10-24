<?php 
 include"connection.php";
 if(isset($_POST['product_id']) && isset($_SESSION['user_id'])) {
     $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user_id']; 

    $remove = "DELETE FROM cart WHERE user_id = $user_id AND product_id = $product_id";
     
      $connection->query($remove);
   
   
    header("location: cart.php");

  }
  else{
    echo "loging first";
  }  
 ?>