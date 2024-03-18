<?php
$username=$_POST['txtname'];
$email=$_POST['txtemail'];
$number=$_POST['txtno'];

if (!empty($username) || (!empty($email) || (!empty($number)) {
	$host="localhost";
	$dbUsername="rupalitarade62100@gmail.com";
	$dbPassword="Rupali@123";
	$dbname="table";
	
	$conn=new mysqli($host,$dbUsername,$dbPassword, $dbname);

	if(mysqli_connect_error()){
		die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
} else {
	$SELECT="SELECT email from details where email =? Limit 1";
	$INSERT="INSERT Into details  (username,email,number) values(?,?,?)";

	$stmt=$conn->prepare($SELECT);
	$stmt->bind_para("s,$email");
	$stmt->execute();
	$stmt->bind_result($email);
	$stmt->store_result();
	$rnum=$stmt->num_rows;

	if ($rnum==0) {
	$stmt->close();
	$stmt=$conn->prepare($INSERT);
	$stmt->bind_param("ssi",$username,	$email,$number);
	$stmt->execute();
	echo "New record inserted successfully";
} else {
	echo "Someone already register";
}
$stmt->close();
$conn->close();
}

}else {
	echo "All fields are required";
	die();
}
?>