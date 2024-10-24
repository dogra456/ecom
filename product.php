<?php include"connection.php"; ?>
<?php 

  $sql= "SELECT * FROM products";
  $result=$connection->query($sql);
 ?>


<!DOCTYPE html >
<html>
<head>
  <?php include 'head.php'; ?>
<style type="text/css">
  body{
    background: white;
  }
  
</style>
 
</head>
<body>


  <?php include 'header.php'; ?>


<div class="container">
  <div class="row" style="padding-top: 150px;">
  
     <h1>       <?php 

            if(isset($_SESSION['username'])){
              echo "Hello, ".$_SESSION['username'];;
            }
            else{
              
            }
           ?>             
      </h1>

          <?php foreach ($result as $key ) { ?> 
<div class="col-lg-3 col-sm-6 mt-2">
     <div class="scar">
     <a href="productinfo.php?id=<?php echo $key['product_id']; ?> "style="text-decoration: none;">
            <img src="assets/img/product/<?php echo $key['product_img']; ?>" width="280" height="350">
     
      <div class="m4a1">
        <div class="box2">
          <div class="row" >
            <div class="col-4">
              <a href="cart.php" style="color: black;"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
            <div class="col-4">
              <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <div class="col-4">
              <i class="fa-regular fa-heart"></i>
            </div>
          </div>
        </div>
      </div>
        <div  class="text-center">
            <h2 > <?php echo $key['product_name']; ?> </h2>
          <span><h5><i class="fa-solid fa-indian-rupee-sign"></i><?php echo $key['product_price']; ?></h5></span>
        </div> 
     </a> 
       </div>
    </div>
    <?php } ?> 
</div>
</div>
<!-- men's printed t-shirts ends -->
</body>
</html>	

<div>
  <!-- footer begin -->
<?php 
  include'footer.php';
 ?>
<!-- footer end -->
</div>