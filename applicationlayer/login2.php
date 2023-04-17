<?php include('../datalayer/server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Doctor</title>
	<link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body class="Dbody">
	<div class="Dheader">
	<h2>Doctor Login</h2>
</div>

<form method="post" action="login2.php" class="Dform">

	<div class="input-groupD">
		<label>Doctor ID</label>
		<input type="text" name="doctorID" required>

	</div>




	<div class="input-groupD">
		<label>Password</label>
		<input type="Password" name="doctorpassword" required>



	<div class="input-groupD">
		<button type="submit" name="Login2" class="btnD"> Login</button>
	</div>

</form>
<?php
 if (isset($_POST['Login2'])) {

	$DoctorID2	=$_POST['doctorID'];
	$DoctorPassword2= $_POST['doctorpassword'];



$queryD="SELECT * FROM doctor WHERE DoctorID=('$DoctorID2')AND password=('$DoctorPassword2')";
$resultD=mysqli_query($mysqli,$queryD);
if (mysqli_num_rows($resultD) ==1 )  {

	$row=mysqli_fetch_assoc($resultD);


	$_SESSION['DoctorID']=$DoctorID2;
	$_SESSION['DoctorName']=$row['Doctorname'];
	$_SESSION['Address']=$row['Address'];
	$_SESSION['Contact']=$row['ContactNumber'];
	$_SESSION['Email']=$row['email'];
	$_SESSION['Category']=$row['categorey'];

  header('location:../presentaionlayer/doctor/index2.php'); 
}

}

?>
</body>
</html>