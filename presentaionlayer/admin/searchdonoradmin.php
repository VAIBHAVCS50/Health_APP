<?php include ('../../datalayer/bookserver.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet"  href="style5.css" type="text/css">

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
						<a class="nav-link active" aria-current="page" href="index3.php">Add/Delete Doctor</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="viewdoctor.php">View Doctors</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="viewpatients.php">View Patients</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="viewappointments.php">View Appointments</a>
					<li class="nav-item">
					<li class="nav-item">
						<a class="nav-link" href="searchdonoradmin.php">Search Donor</a>
					<li class="nav-item">
						<a class="nav-link" href="../../applicationlayer/Doctorpatient.php">Logout</a>
					</li>
					
				</ul>
			</div>
		</div>
	</nav>
       



</header>
<body>
	<br><br>
	<form method="post" action="searchdonoradmin.php" class="searchdonor">

	<?php include ('../../datalayer/errors.php') ;?>

	<div class="input-group">
		<label style="font-weight: bold;">Search By:<br>*Blood Group<br>*Organ  </label>
		<input type="text" name="dID3" >

	</div>
   
	<div class="input-group">
		<button type="submit" name="SearchD" class="btnA" style="padding: 5px;margin-left: 90px;margin-top: 20px; padding-left: 15px; padding-right: 15px">Search</button>
	</div>

	







		
	</form>


	

		<?php 

         if (isset($_POST['SearchD'])) {

         ?>	<table class="table2">
		<tr>
		<th>DonorID</th>
		<th>DonorName</th>
		<th>DonorAddress</th>
		<th>DonorContactNumber</th>
		<th>DonorEmail</th>
		<th>DonorBloodGroup</th>
		<th>DonorOrgan</th>



		</tr> <?php  


		$dID3 =$mysqli -> real_escape_string($_POST['dID3']);

		$sql8="SELECT  * FROM  donor   WHERE donarblood=('$dID3') OR organ=('$dID3') ";
		$result8=$mysqli->query($sql8);
		if(mysqli_num_rows($result8)>=1){
			while ($row8=$result8->fetch_assoc()) {

				echo "<tr><td>".$row8["donarID"]."</td><td>".$row8["donarname"]."</td><td>".$row8["donaraddress"]."</td><td>".$row8["donarnumber"]."</td><td>".$row8['donaremail']."</td><td>".$row8['donarblood']."</td><td>".$row8['organ']."</td></tr>";
			}


			echo "</table";
	


		}
	}?>
 </table>
				
	


</body>
</html>

