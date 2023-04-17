<?php 

session_start();
$errors=array();

$mysqli = new mysqli("localhost","root","1234","vaibhav");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}




if (isset($_GET['logout'])) {

	session_destroy();
	isset($_SESSION['UserID']);
	header('location:login.php');
	}


	if (isset($_GET['My info'])) {
	header('location:login.php');
	}



	$userprofile=isset($_SESSION['UserID']);
$query="SELECT * FROM patients WHERE UserID=('$userprofile')";
 $result= mysqli_query($mysqli, $query);
 $col= mysqli_fetch_assoc($result);










$doctorprofile=isset($_SESSION['DoctorID']);
$querydoctor="SELECT * FROM doctor WHERE DoctorID=('$doctorprofile')";
 $resultdoctor= mysqli_query($mysqli, $querydoctor);
 $colD= mysqli_fetch_assoc($resultdoctor);

 if (isset($_GET['logout'])) {

	session_destroy();
	isset($_SESSION['UserID']);
	header('location:login.php');
	}



if (isset($_POST['Login3'])) {

		$adminID	= $_POST['adminID'];
		$adminpassword= $_POST['adminpassword'];

	

	$queryA="SELECT * FROM admin WHERE AdminID=('$adminID')AND adminpassword=('$adminpassword')";
	$resultA=mysqli_query($mysqli,$queryA);
	if (mysqli_num_rows($resultA) ==1 )  {
	
	

	
	$_SESSION['AdminID']=$adminID;
  	$_SESSION['success']="you are now logged in";
  	header('location:../presentaionlayer/admin/index3.php'); 
} 
}
//  $mysqli -> close();



   
 ?>