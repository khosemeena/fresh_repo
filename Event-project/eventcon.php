<?php
/*
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database_name = "event";

$conn=mysqli_connect($servername, $username, $password, $database_name);

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $eventname= $_POST['eventname'];
    $venue= $_POST['venue'];
    $datee= $_POST['datee'];
    $timee= $_POST['timee'];
    
    // Validate if fields are not empty
    if(!empty($eventname) && !empty($venue) && !empty($datee) && !empty($timee))
    {
        $query = "INSERT INTO eventdetails (eventname,venue,datee,timee) VALUES ('$eventname','$venue','$datee','$timee')";
        $result=mysqli_query($conn, $query);
        if($result) {
            echo "<script type='text/javascript'> alert('Successfully Registered')</script>";
        }
        else {
            echo "<script type='text/javascript'> alert('Failed to register')</script>";
        }
    }   
    else
    {
        echo "<script type='text/javascript'> alert('Please Enter Some Valid Information')</script>";
    }
}
*/



session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database_name = "event";

$conn = mysqli_connect($servername, $username, $password, $database_name);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $eventname = mysqli_real_escape_string($conn, $_POST['eventname']);
    $venue = mysqli_real_escape_string($conn, $_POST['venue']);
    $datee = mysqli_real_escape_string($conn, $_POST['datee']);
    $timee = mysqli_real_escape_string($conn, $_POST['timee']);

    // Validate if fields are not empty
    if (!empty($eventname) && !empty($venue) && !empty($datee) && !empty($timee)) {
        $query = "INSERT INTO eventdetails (eventname, venue, datee, timee) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $eventname, $venue, $datee, $timee);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "<script type='text/javascript'> alert('Successfully Registered')</script>";
        } else {
            echo "<script type='text/javascript'> alert('Failed to register')</script>";
            // For debugging, you can uncomment below line to see the error message
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "<script type='text/javascript'> alert('Please Enter Some Valid Information')</script>";
    }
    mysqli_close($conn);
}

?>
