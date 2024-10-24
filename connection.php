    <?php  

    session_start();
    $server="localhost";
    $username="root";
    $password="";
    $database="ecom";

    $connection= new mysqli($server,$username,$password,$database);

    if ($connection->connect_error) {
        die("connection error".$connection->connect_error);
    }

    function is_login(){
        if(isset($_SESSION['username'])){
            return true;
        }
        else{
            return false;
        }
    }