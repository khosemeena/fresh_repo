<!--
/*
include("connection.php");
if(isset($_POST['submit'])){
		
        $Email= $_POST['email'];
        $Password= $_POST['pass'];
        
		
		
		$sql="select email,pass from registration where email='$Email' and password='$Password'";
		
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		$Count=mysqli_num_rows($result);
		if($Count==1){
			header("Location: event-tab.html");
		}
		else {
			echo '<script>
			window.location.href="login.html";
			alert("Login failed.Invalid Email id or Password!!")
			</script>';
			
			exit();
		}
	}*/
-->





<!--

/*     
    include('connection.php');  
    $Email = $_POST['email'];  
    $password = $_POST['pass'];  
      
        to prevent from mysqli injection  
        $Email = stripcslashes($Email);  
        $password = stripcslashes($password);  
        $Email = mysqli_real_escape_string($con, $Email);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select email,pass from registration where email = '$Email' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
 
          
        if($count == 1){  
           // echo "<h1><center> Login successful </center></h1>";

			header("Location: welcome.html"); // Change 'welcome.php' to the desired page
			exit();
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }  
        */   

  <?php 
  session_start();

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database_name = "event";

  $conn=mysqli_connect($servername,$username,$password,$database_name);

  if($_SERVER['REQUEST_METHOD']=="POST")
  {
      $Email= $_POST['email'];
      $Password= $_POST['pass'];
      if(!empty($Email) && !empty($Password) && !is_numeric($Email))
        {
            $query = "Select * from registration where email='$Email' limit 1";
            $result=mysqli_query($conn, $query);
            if($result)
            {
                if($result && mysqli_num_rows($result)>0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['pass']==$Password)
                    {
                        header('Location:login-admin.html');
                        die;
                    }
                }
            }
            echo "<script type='text/javascript'> alert('Wrong email or password)</script>";
        }
        else{
            echo "<script type='text/javascript'> alert('Wrong email or password)</script>";
        }
    }
  ?>

