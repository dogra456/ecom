<?php  
include"connection.php";
?>
<?php 	
 $id=$_GET['id'];

 $sql="SELECT * FROM products where product_id= $id";

 $result = $connection->query($sql);
 if($result->num_rows > 0){
  ?>
  <!DOCTYPE html>
  <html>
  <head>

  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<title></title>
  	  <?php include "head.php"; ?>
          <style>
        input[type="number"].num {
            width: 10%;
        }
  	body{
  		background: white;
  	}
  </style>

  </head>
  <body>
<?php include "header.php"; ?>
     <?php foreach ($result as $row) {?>
   <div class="container" style="padding-top: 150px;">

       <div class="row">
           <div class="col-5" >
               <img src="assets/img/product/<?php echo $row['product_img'];?>" width="420" height="420">
           </div>
           <div class="col-7">
               <p><h1><?= $row['product_name'];?></h1></p>
                <p><h3 style="color:blue;">RS.<?= $row['product_price'];?>/-</h3></p>
                <p><?= $row['product_info'];?></p>
                <p> <select>
                            <option>chose colour</option>
                            <option>white</option>
                            <option>black</option>
                    </select>
                </p>

               <div class="row">

                  <form action="cart.php" method="post" style="width: 250px;">
                        <div>
                            <input type="button" class="minus" value="-">
                            <input type="number" name="qty" class="num" style="width:80px;">
                            <input type="button" class="plus" value="+">
                            <input type="hidden" name="last_id" value="<?=$row['product_id']?>">
                            <input type="submit" value="Add To Cart" class="cart" id="addtocartbtn" > 
                        </div>
                    </form>
               </div>   
           </div>
       </div> 
   </div>
   	<?php } ?>
  </body>
  </html>

  <?php
 }

 else{
 	echo "no product found";
 }
  ?>
  <?php include "footer.php" ?>
  <script type="text/javascript">
          document.addEventListener("DOMContentLoaded",function(){
        const plus = document.querySelector(".plus");
        const minus = document.querySelector(".minus");
        const numInput = document.querySelector(".num");
        const addtocartbtn = document.getElementById("addtocartbtn");// add this line

        let quantity = 0;

        plus.addEventListener("click",function(){
             quantity++;
             numInput.value = quantity;
        });

         minus.addEventListener("click",function(){
            if (quantity > 1 ) {
                quantity--;
             numInput.value = quantity;

            }
        });
            addtocartbtn.addEventListener("click",function(event){
             event.preventDefault();
             document.querySelector("form").submit();
        });
      });
  </script>
 