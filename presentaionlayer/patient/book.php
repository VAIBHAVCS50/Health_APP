<?php include '../../datalayer/bookserver.php';?>


<!DOCTYPE html>
<html>

<head>
	<title>Patient</title>
	<link rel="stylesheet" href="style2.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
	<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
	<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>

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
		<h2>Book Appointment</h2>
	</div>

	<form method="post" action="book.php">

		<?php include('../../datalayer/errors.php'); ?>





		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">


			<div class="input-group">
				<label>Categery</label>
				<select name="categorey" class="xd">
					<option value="bone">bone</option>
					<option value="heart">heart</option>
					<option value="Dentistry">Dentistry</option>
					<option value="MentalHealth">Mental Health</option>
					<option value="Surgery">Surgery</option>

				</select>


			</div>

			<div class="input-group">
				<button type="submit" name="Search" class="btn btn-success">Search</button>
			</div>




			<?php

			if (isset($_POST['Search'])) {

				$categorey = $_POST['categorey'];

				$query2 = "SELECT * FROM doctor WHERE categorey=('$categorey')";
				$result2 = mysqli_query($mysqli, $query2);
			?>

				<div class="input-group">

					<label>Doctor ID</label>


					<select class="input-group2" name="docID" >

						<?php while ($row2 = mysqli_fetch_assoc($result2)) {
						?>


							<option> <?php echo $row2['DoctorID'] ;?> </option>	

						<?php

						} ?>
					</select>
				</div>


				<div class="input-group">
					<label>Appointment ID</label>
					<input type="text" name="AppoID" >

				</div>




				<div class="input-group">
					<label>Date</label>
					<input type="Date" name="Date" id="datefield" >

				</div>

				<div class="input-group">
					<label>Time</label>
					<input type="Time" name="Time" min="09:00" max="18:00" >
				</div>

				<div class="input-group">
					<button type="submit" name="Book" class="btn btn-success">BOOK</button>
				</div>

			<?php
			}


			?>

		</form>


 <script>
	var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();

if (dd < 10) {
   dd = '0' + dd;
}

if (mm < 10) {
   mm = '0' + mm;
} 
    
today = yyyy + '-' + mm + '-' + dd;
document.getElementById("datefield").setAttribute("min", today);

 </script>


</body>

</html>