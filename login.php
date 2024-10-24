 <?php
 
 include"connection.php";
$massege='';
if ($_SERVER['REQUEST_METHOD']=="POST") {
  $username=$_POST['username'];
  $password=$_POST['password'];

  $sql='select user_id,username,password,user_type from users where username="'.$username.'" and password="'.$password.'"';
  $result=$connection->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $row['username'];
    $_SESSION['user_id'] = $row['user_id']; // Make sure 'id' is the correct column name

   if (isset($_SESSION['last_id'])) {
     $last_id = $_SESSION['last_id'];
     
     header("location:http://localhost/devanshu.com/ecom/productinfo.php?id=$last_id");
   }
   else{
    header("location:product.php");
   }
}


  else{
    $massege="invalid username or password";
  }
}

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>login</title>
   <?php include"head.php"; ?>
  <style type="text/css">
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: url('assets/img/sallu.webp') center/cover no-repeat fixed;
      margin: 0;
      padding: 0;
/*      display: flex;*/
      align-items: center;
      justify-content: center;
      height: 100vh;
      animation: fadeIn 1s ease-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    form {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
      width: 300px;
      text-align: center;
      animation: dance 2s infinite;
    }

    @keyframes dance {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-10px);
      }
    }

    form input {
      width: calc(100% - 20px);
      padding: 10px;
      margin: 10px 0;
      box-sizing: border-box;
      border: none;
      border-bottom: 2px solid #ccc;
      border-radius: 5px;
      background-color: #f9f9f9;
      transition: border-color 0.3s ease-in-out;
    }

    form input:focus {
      outline: none;
      border-color: #4caf50;
    }

    form input[type="submit"] {
      background: linear-gradient(to right, #45a049, #4caf50);
      color: #fff;
      cursor: pointer;
      transition: background 0.3s ease-in-out;
    }

    form input[type="submit"]:hover {
      background: linear-gradient(to right, #4caf50, #45a049);
    }

    h2 {
      color: #333;
    }
  </style>
</head>
<body>
  <?php 
   include"header.php";
   ?>
<main id="main" style="padding-top: 150px;">
  <div class="container">
    <div class="row">
       <center>
<form   method="POST" action="login.php">
  <input type="text" name="username" placeholder="username">
  <input type="password" name="password" placeholder="password">
  <input type="submit" value="submit">
  <a href="sigin.php">Don't have account? signin</a>
<?php echo $massege ?>
</form>
 </center>
    </div>
  </div>
</main>
</body>
</html>

<?php 
  include "footer.php";
 ?>