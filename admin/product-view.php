<?php
include "common/connection.php";

if (!isset($_SESSION["admin_user"])) {
    header("location: index.php");
}
?>

<?php
$sql = "select * from products";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <?php include "common/head.php"; ?>
</head>
<body id="page-top">
        <?php include "common/header.php"; ?>

        <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Products</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Product_Image</th>
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Discription</th>
                                            <th>delete</th>
                                            <th>Update</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php foreach ($result as $row) { ?>

                                           
                                            <tr>
    <td width="10%"><?= $row["product_id"] ?></td>
    <td width="20%"><img src="<?= "../assets/img/product/" .
        $row["product_img"] ?>" width="60%"></td>
    <td width="15%"><?= $row["product_code"] ?></td>
    <td width="15%"><?= $row["product_name"] ?></td>
    <td width="10%">Rs.<?= $row["product_price"] ?></td>
    <td width="30%"><?= $row["product_info"] ?></td>
    
    <!-- Delete Form in its own <td> -->
    <td width="10%">
        <form method="post" action="delete.php">
            <input type="hidden" name="product_id" value="<?= $row[
                "product_id"
            ] ?>">
            <input class="btn btn-danger" type="submit" value="delete">
        </form>
    </td>

    <!-- Update button in another <td> -->
    <td>
        <a class="btn btn-info" href="update-products.php?product_id=<?= $row[
            "product_id"
        ] ?>">Edit</a>
    </td>
</tr>

                                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- container-fluid -->

        <?php include "common/footer.php"; ?>

</body>
</html>