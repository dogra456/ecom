<?php include 'common/connection.php'; 

    $sql ="SELECT * FROM product";

    $result =  $conn->query($sql);


?>

<!DOCTYPE html>
<html>
<head>
    <?php 
        include "common/head.php";
     ?>
</head>
<body>
    <?php include "common/header.php"; ?>


<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Product View</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>product code</th>
                                            <th>name</th>
                                            <th>img</th>
                                          
                                            <th>price</th>
                                            <th>edit</th>
                                            <th>delete</th>
                                        </tr>
                                    </thead>
                                    
                                 <tbody>
                                     <?php foreach ($result as $key ) { ?>
                            <tr>
                              <th><?=$key['product_code'] ?></th>
                              <td><?=$key['product_name'] ?></td>
                              <td><img style="width: 200px;" src="../assets/img/product-img/<?=$key['product_img'] ?>"></td>
                        
                              <td><?=$key['product_price'] ?></td>
                              <td class="text-primary"><a href="product_update.php?product_id=<?= $key['product_id'] ?>">Edit</a></td>
                              <td class="text-danger"> 
                                    <form method="post" action="product_delete.php"> 
                                        <input type="hidden" name="product_id" value="<?= $key['product_id'] ?>" >
                                        <input class="btn btn-danger" type="submit" value="delete">
                                 </form>
                              </td>
                            </tr>
                <?php } ?>
                          </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->



    <?php include "common/footer.php"; ?>
    <?php include "common/script.php"; ?>
</body>
</html>