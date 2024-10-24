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
$massege="";
if ($_SERVER['REQUEST_METHOD']=="POST") {
  $username=$_POST['username'];
  $fullname=$_POST['fullname'];
  $phone=$_POST['phone_number'];
  $email=$_POST['email'];
  $user_type=$_POST['user_type'];
  $password=$_POST['password'];


  $sql = 'INSERT INTO users (username,fullname,phone_number,email, password,user_type) VALUES ("'.$username.'","'.$fullname.'","'.$phone.'","'.$email.'","'.$password.'","'.$user_type.'" )';


  $result=$connection->query($sql);

   if ($result > 0) {
     $massege="creat succesfully";
   
  }

  else{
    header("location:index.php");
  }
}

 ?>

<form method="post" action="add-users.php" enctype="multipart/form-data">


<div class="container">
    <form class="form-table" method="POST">
        <table class="table table-bordered">
            <tbody>
                <tr class="animated-row">
                    <td><p>User Name</p></td>
                    <td><input type="text" name="username" class="form-control" required></td>
                </tr>
                <tr class="animated-row">
                    <td><p>Full Name</p></td>
                    <td><input type="text" name="fullname" class="form-control" required></td>
                </tr>
                <tr class="animated-row">
                    <td><p>Phone Number</p></td>
                    <td><input type="text" name="phone_number" class="form-control" required></td>
                </tr>
                <tr class="animated-row">
                    <td><p>Email</p></td>
                    <td><input type="text" name="email" class="form-control" required></td>
                </tr>
                <tr class="animated-row">
                    <td><p>User Type</p></td>
                    <td>
                        <select  name="user_type" required>
                                  <option >a</option>
                                  <option >u</option>
                                </select>

                    </td>



                   
                <tr class="animated-row">
                    <td><p>Password</p></td>
                    <td><input type="text" name="password" class="form-control" required></td>
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