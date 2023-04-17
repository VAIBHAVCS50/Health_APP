
<?php include ('../../datalayer/server.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Patient</title>
	<!-- <link rel="stylesheet"  href="style2.css"> -->
	<!-- <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet"> -->

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



	</nav>




</header>
<body >
		<div class="headerP" style="width: 15%;margin-top: 60px;color: white;background: #39ca74;text-align: center;border-radius: 10px 10px 5px 5px;border-bottom: none; border :1px solid #39ca74;padding: 10px;margin-left:-4px   ">
	<h2>My Information</h2>
</div>



<form method="post" action="index.php"  class="infoP" style="margin-left:-1px; margin-top:0px ;width: 40%;padding: 20px;border :3px solid #39ca74 ;background: white; border-radius: 10px 10px 10px 10px;">

    




<div class="contentP" style="font-weight: bold;">



	<label>ID: <?php echo "" .$_SESSION['UserID'];?></label>

	 	   <br>
	 	   <br>
	 	   <label> Email : <?php echo $_SESSION['Email']; ?></label>
	 	   	 	   <br>
	 	   <br>
	 	   <label> Name : <?php echo $_SESSION['Name']; ?></label>
	 	   	 	   <br>
	 	   <br>
	 	   <label> Address : <?php echo $_SESSION['Address']; ?></label>
	 	   	 	   <br>
	 	   <br>
	 	   <label> Contact Number : <?php echo $_SESSION['Contact']; ?></label>
	 	   	 	   <br>
	 	   <br>
	 	   <label> Blood Type : <?php echo $_SESSION['Blood']; ?></label>
	 	   	 	   <br>
	 	   <br>
    
	 	   </div>
    
	