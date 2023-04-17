<?php include('../datalayer/server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
	<h2>Register</h2>
</div>

<form  action="1st.php" method="post" onsubmit="return validate();">

	<div class="input-group">
		<label>User ID</label>
		<input type="text" name="UserID" id="UserID" required>

	</div>

	<div class="input-group">
		<label>Name</label>
		<input type="text" name="Name" id="Name" required>

	</div>

	<div class="input-group">
		<label>Address</label>
		<input type="text" name="Address" id="Address" required>

	</div>
	<div class="input-group">
		<label>Contact Number</label>
		<input type="text" name="ContactNumber" id="ContactNumber" required>

	</div>


	<div class="input-group">
		<label>Email address</label>
		<input type="email" name="Email" id="Email" required>

	</div>

	<div class="input-group">
		<label>Password</label>
		<input type="text" name="password" id="password" required>

	</div>

	<div class="input-group">
		<label>Blood type</label>
		<input type="text" name="bloodtype" id="bloodtype" required>

	</div>
   <br>

	<div class="input-group">
		<input type="submit" name="Register" class="btn" value="Register">
	</div>

	<p>
		Already a member? <a href="login.php">Sign in </a>
	</p>
	
	<p id="error"></p>
	</form>

	<script>
		function validate() {

			let userId = document.getElementById("UserID").value;
			let name = document.getElementById("Name").value;
			let phone = document.getElementById("ContactNumber").value;
			let password = document.getElementById("password").value;

			
			if (!/^-?\d+$/.test(userId)) {
				document.getElementById("error").innerText = "User ID must be an integer";
				document.getElementById("error").style.color = "red";
				return false;
			}

		
			if (!/^[a-zA-Z\s]+$/.test(name)) {
				document.getElementById("error").innerText = "Name must contain only letters and spaces";
				document.getElementById("error").style.color = "red";
				return false;
			}

			if (!/^\d{10}$/.test(phone)) {
				document.getElementById("error").innerText = "Phone number must contain 10 digits";
				document.getElementById("error").style.color = "red";
				return false;
			}

			
			if (password.includes(name)) {
				document.getElementById("error").innerText = "Password cannot contain the user's name";
				document.getElementById("error").style.color = "red";
				return false;
			}
			return true;
		}
	</script>




<?php
if (isset($_POST['Register'])) {
	$UserID 	= $_POST['UserID'];
	$Username 	= $_POST['Name'];
	$Address 	= $_POST['Address'];
	$ContactNumber	 = $_POST['ContactNumber'];
	$Email 		= $_POST['Email'];
	$Password 	= $_POST['password'];
	$bloodtype 	= $_POST['bloodtype'];
	$Password=md5($Password);
	$sql = "INSERT INTO  patients (UserID, Name, Address, ContactNumber, Email, Password,Bloodtype) VALUES ('$UserID','$Username','$Address','$ContactNumber','$Email','$Password','$bloodtype') ";
	$result909=$mysqli ->query($sql);
if($result909)
{
  $_SESSION['UserID']=$UserID;
  $_SESSION['Name']=$Username;
  $_SESSION['Address']=$Address;
  $_SESSION['Contact']=$ContactNumber;
  $_SESSION['Email']=$Email;
  $_SESSION['Blood']=$bloodtype;

  header('location:../presentaionlayer/patient/index.php');
}
}
?>

</body>
</html>