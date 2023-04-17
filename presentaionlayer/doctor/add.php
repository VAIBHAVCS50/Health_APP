<?php include ('../../datalayer/bookserver.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctor</title>
	<link rel="stylesheet"  href="style3.css">

	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
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
						<a class="nav-link active" aria-current="page" href="index2.php">MyInfo</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="doctorapp.php">My Appointments</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="searchpatient.php">Search Patient</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="add.php">Add Description</a>
					<li class="nav-item">
						<a class="nav-link" href="../../applicationlayer/Doctorpatient.php">Logout</a>
					</li>
					
				</ul>
			</div>
		</div>
	</nav>



</header>

<form method="post" action="add.php" class="add">

	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

		<div class="input-group">
		<label style="font-weight: bold;">PatientID</label>
	   	<input type="text" name="Patientsearch" class="xd">

	</div>
	<div class="input-group">
		<button type="submit" name="SearchPA" class="btn">Search</button>
	</div>

	<?php  


	  if (isset($_POST['SearchPA'])) {

	$Patientsearch = mysqli_real_escape_string($mysqli,$_POST['Patientsearch']);
	
	$query="SELECT * FROM patients WHERE UserID=('$Patientsearch')";
	$result2=mysqli_query($mysqli,$query);	
	while ($row2=mysqli_fetch_assoc($result2)) {
?>

<div class="input-group">
		<label>Patient ID</label>
		<input type="text" name="descID" value="<?php echo $row2['UserID']; ?>">

	</div>




	<div class="input-group">
		<label>Name</label>
		<input type="text" name="descName" value="<?php echo $row2['Name']; ?>">

	</div>

	<div class="input-group">
		<label>Treatment</label>
		<input type="text" name="Treatment">
	</div>

	<div class="input-group-add">
		<label>Note</label>
		<input type="text" name="Note">
	</div>


	 <div class="input-group">
			<button type="submit" name="AddD" class="btn">Add</button>
			</div>


	<?php  

	}
	 ?>

			 </div>  
<?php 
}


	    ?>

	    <?php  


if (isset($_POST['AddD'])) {
	include ('../../datalayer/errors.php');
	    	$errors=array();

	$descID 			= $_POST['descID'];
	$descName 			= $_POST['descName'];
	$treatment 			= $_POST['Treatment'];
	$note				= $_POST['Note'];
	$docI=$_SESSION['DoctorID'];
	$sql7 = "INSERT INTO  description (descID,descName,treatment,note,doctorIDdesc) VALUES ('$descID','$descName','$treatment','$note','$docI') ";
	if ($mysqli -> query($sql7)) { ?>

	<h2 class="thanks"> <?php printf("Your Description Is Added",$mysqli->affected_rows);?></h2>
			
			
		<?php 
	}
}


?>

</form>

</body>

</html>