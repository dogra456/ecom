<?php include"connection.php"; ?>
<?php   
$massege="";
if ($_SERVER['REQUEST_METHOD']=="POST") {
  $username=$_POST['username'];
  $fullname=$_POST['fullname'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
  $password=$_POST['password'];


  $sql = 'INSERT INTO users (username,fullname,phone_number,email, password) VALUES ("'.$username.'","'.$fullname.'","'.$phone.'","'.$email.'","'.$password.'" )';


  $result=$connection->query($sql);

   if ($result > 0) {
     $massege="creat succesfully";
   
  }

  else{
    header("location:index.php");
  }
}

 ?>

<!DOCTYPE html >
<html>
<head >
  <?php 
   include"head.php";
   ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>creat account</title>
   <?php include "header.php"; ?>
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
       <main id="main" style="padding-top: 150px;">
            <div class="container" style="width: 250px;">
              <div class="row">
                    <form  method="POST" action="sigin.php">
                        <input type="text" name="username" placeholder="username">
                        
                        <input type="text" name="fullname" placeholder="fullname">
                        
                        <input type="text" name="phone" placeholder="phone">
                        
                        <input type="email" name="email" placeholder="email">
                        
                        <input type="password" name="password" placeholder="password">
                        
                        <input type="submit" value="submit">
                        <a style="color: blue;" href="login.php">alerady have account? login</a>
                    </form>
                 </div>   
            </div>
    </main><!-- End #main -->
</body>
</html>

    <?php include "footer.php"; ?>