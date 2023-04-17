<?php include '../../datalayer/bookserver.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Patient</title>
	<link rel="stylesheet"  href="style2.css">

	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
	<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
	<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>

<header>
	
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Doctor Patient</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="index.php">MyInfo</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="book.php">Book Appointment</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="view.php">View Appointment</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="cancel.php">Cancel Booking</a>
					<li class="nav-item">
						<a class="nav-link" href="searchdoctor.php">Search Doctor</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="donate.php">Donate Organ</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="searchdonor.php">Search Donar</a>
					</li>
                    <li class="nav-item">
						<a class="nav-link" href="des.php">Doctor's Message</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../../applicationlayer/Doctorpatient.php">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>




</header>
<body>
	<div class="header">
	<h2>Donate Organ</h2>
</div>

	<form method="post" action="donate.php">

	<?php include ('../../datalayer/errors.php'); ?>




	<?php  
if (isset($_POST['Donate'])) {

	$DUserID 			= $_POST['DUserID'];
	$DUsername 			= $_POST['DName'];
	$DAddress 			= $_POST['DAddress'];
	$DContactNumber		= $_POST['DContactNumber'];
	$DEmail 			= $_POST['DEmail'];
	$Dbloodtype 		= $_POST['Dbloodtype'];
	$Dorgan				= $_POST['Organ'];
	
	







if(count($errors)==0){



	$sql7 = "INSERT INTO  `donor` (`donarID`,`donarname`,`donaraddress`,`donarnumber`,`donaremail`,`donarblood`,`organ`) VALUES ('$DUserID','$DUsername','$DAddress','$DContactNumber','$DEmail','$Dbloodtype','$Dorgan') ";
	if ($mysqli -> query($sql7)) { ?>

	<h2 class="thanks"> <?php printf("Thanks For Donation",$mysqli->affected_rows);?></h2>
			
			
		<?php 



	}
}
}














?>


	<div class="input-group">
		<label>User ID</label>
		<input type="text" name="DUserID" value=" <?php echo "" .isset($_SESSION['UserID']);?> " >

	</div>


	<div class="input-group">
		<label>Name</label>
		<input type="text" name="DName" value="<?php echo $_SESSION['Name']; ?> " >


	</div>

	<div class="input-group">
		<label>Address</label>
		<input type="text" name="DAddress" value="<?php echo $_SESSION['Address']; ?>">

	</div>

	<div class="input-group">
		<label>Contact Number</label>
		<input type="text" name="DContactNumber" value=" <?php echo $_SESSION['Contact']; ?>">


	</div>


	<div class="input-group">
		<label>Email address</label>
		<input type="text" name="DEmail" value="<?php echo $_SESSION['Email']; ?>">

	</div>

	<div class="input-group">
		<label>Blood type</label>
		<input type="text" name="Dbloodtype" value="<?php echo $_SESSION['Blood']; ?>">

	</div>

	<div class="input-group">
		<label>Type Of Organ</label>
	   	<select name="Organ" class="xd">
	   		<option value="Blood">Blood</option>
	   		<option value="Heart">Heart</option>
	   		<option value="kidney">kidney</option>
	   		<option value="Eye">Eye</option>

	   	</select>

	<div class="input-group">
		<button type="submit" name="Donate" class="btn btn-danger">Donate</button>
	</div>

</div>





</form>


	











	


</body>
</html>
