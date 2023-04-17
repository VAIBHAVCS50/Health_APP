<?php include('../datalayer/server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Patient</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
	<h2>Patient Login</h2>
</div>

<form method="post" action="login.php">

	<?php include ('../datalayer/errors.php')?>

	<div class="input-group">
		<label>User ID</label>
		<input type="text" name="UserID" required>

	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="Password" name="password" required>

	<div class="input-group">
		<button type="submit" name="Login" class="btn"> Login</button>
	</div>
	<p>
		Not a member? <a href="1st.php">Sign Up </a>
	</p>
	
</form>
<?php
if (isset($_POST['Login'])) {

	$UserID 	= $_POST['UserID'];
	$Password 	= $_POST['password'];

	$Password=md5($Password);
$query="SELECT * FROM patients WHERE UserID=('$UserID')AND Password=('$Password')";
$result=mysqli_query($mysqli,$query);
if (mysqli_num_rows($result) ==1 )  {
$row=mysqli_fetch_assoc($result);

$_SESSION['UserID']=$UserID;
$_SESSION['Name']=$row['Name'];
$_SESSION['Address']=$row['Address'];
$_SESSION['Contact']=$row['ContactNumber'];
$_SESSION['Email']=$row['Email'];
$_SESSION['Blood']=$row['Bloodtype'];

header('location:../presentaionlayer/patient/index.php');
}
}
?>



</body>
</html>