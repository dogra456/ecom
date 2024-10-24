<?php include 'common/connection.php';
    
    if (!isset($_SESSION['admin_user'])) {
        header("location: admin_login1.php");
    }

    $usertype = "u";

    if (isset($_POST['usertype'])) {
        $usertype = $_POST['usertype'];
    }



$sql = "SELECT * FROM users WHERE user_type = '$usertype' ";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<?php include"common/head.php"; ?>
</head>
<body>
<?php include("common/header.php"); ?>




                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!-- DataTales Example -->
	                        </div>
                        <div class="card-body">

    <div class="card shadow mb-4">

    	<div>
    		
    	</div>
         <div class="card-header py-3">
                        	<div class="row">
                        		<div class="col-6 text-info "><h1>Users</h1></div>
                        		 <div class="col-6 text-right">
                                            

                                            <form action="view-customer.php" method="post" style="display:inline-block;">
                                                <input type="hidden" value="u" name="usertype">
                                                <input type="submit" class="btn btn-success" value="USERS">
                                            </form>
                                          
                                                
                                            <form action="view-customer.php" method="post" style="display:inline-block;">
                                                <input type="hidden" value="a" name="usertype">
                                                <input type="submit" class="btn btn-primary" value="ADMIN">
                                            </form>


                                            
                                        </div>
                        	</div>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				                            <thead>
												<tr>
													<th width="10%">CustomerId</th>
													<th width="15%">Name</th>
													<th width="15%">Fullname</th>
													<th width="15%">E-mail</th>
													<th width="20%">Address</th>
													<th width="5%">Phone</th>
												</tr>
											</thead>
												<?php
													foreach ($result as $row) 
													{
														?>

												<tr align="center">
													<td width="10%"><?= $row['user_id'] ?></td>
													<td width="15%"><?= $row['username'] ?></td>
													<td width="15%"><?= $row['fullname'] ?></td>
													<td width="15%"><?= $row['email'] ?></td>
													<td width="10%"><?= $row['address'] ?></td>
													<td width="30%"><?= $row['phone_number'] ?></td>
													
												</tr>


														<?php
													}
												?>
	                            </table>
						  </div>
                        </div>
             </div>
        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            
            <!-- start  of footer -->

        		<?php include("common/footer.php"); ?>

            <!-- End of Footer -->

        <!-- End of Content Wrapper -->
</body>
</html>