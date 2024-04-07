
<?php 
/*
  session_start();

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database_name = "event";

  $conn=mysqli_connect($servername,$username,$password,$database_name);

  if($_SERVER['REQUEST_METHOD']=="POST")
  {
      $username= $_POST['username'];
      $password= $_POST['password'];
      if(!empty($username) && !empty($password) && !is_numeric($username))
        {
            $query = "Select * from admin where username='$username' limit 1";
            $result=mysqli_query($conn, $query);
            if($result)
            {
                if($result && mysqli_num_rows($result)>0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['password']==$password)
                    {
                        header('Location:index.html');
                        die;
                    }
                }
            }
            echo "<script type='text/javascript'> alert('Wrong email or password)</script>";
        }
        else{
            echo "<script type='text/javascript'> alert('Wrong email or password)</script>";
        }
    }*/



    
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database_name = "event";

$conn = mysqli_connect($servername, $username, $password, $database_name);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    if (!empty($username) && !empty($password)) {
        $query = "SELECT * FROM admin WHERE username=? LIMIT 1";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            if (password_verify($password, $user_data['password'])) {
                header('Location: index.html');
                exit;
            } else {
                echo "<script type='text/javascript'>alert('Wrong email or password')</script>";
                echo "username: $username<br>";
                echo "password: $password<br>";
            }
        } else {
            echo "<script type='text/javascript'>alert('Wrong email or password')</script>";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "<script type='text/javascript'>alert('Please enter username and password')</script>";
    }
    mysqli_close($conn);
}


    
  ?>