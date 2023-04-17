<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
	<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
	<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</head>
	

<?php  
$flag = false;
$errors=array();
include ('server.php');

$mysqli = new mysqli("localhost","root","1234","vaibhav");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}


if (isset($_POST['Book'])) {

	
	$AppoID = 	$_POST['AppoID'];
	$Date 	=	 $_POST['Date'];
	$Time 	= $_POST['Time'];
	$userID= $_SESSION['UserID'];
	$_SESSION['flagb']=false;
    $docID = $_POST['docID'];
    $_SESSION['doc_view']=$docID;
	$sql = "INSERT INTO  `bookapp` (`AppoID`, `Date`, `Time`, `patientID`,`docID`) VALUES ('$AppoID','$Date','$Time','$userID','$docID')";
	$result99=$mysqli ->query($sql);
		if ($result99) {
			$_SESSION['flagb']=true;
			echo "<div class='alert alert-success' role='alert'>
				Appointment Successfully!
			  </div>";
            }
	elseif (!$mysqli -> query($sql)) {
  printf("%d Can't Book At The Moment.\n", $mysqli->affected_rows);
	 } 
	  $_SESSION['AppoID']=$AppoID;
}




if (isset($_POST['cancel'])) {

		$AppoID2 =$_POST['AppoID2'];
		$userID= $_SESSION['UserID'];

	$query5="DELETE FROM bookapp WHERE patientID = '$userID' AND AppoID = '$AppoID2' ";
	$result12=$mysqli -> query($query5);
   if($mysqli->affected_rows)
   {
	
	echo "<div class='alert alert-success alert-dismissible' role='alert'>
	<span type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></span>
	<strong>Success!</strong> Appointment Cancelled!.
    </div>";
   }
	
}


if (isset($_POST['Add'])) {

	$addID 				= $_POST['addID'];
	$addname 			= $_POST['addname'];
	$addAddress 		= $_POST['addAddress'];
	$addContactNumber	= $_POST['addContactNumber'];
	$addEmail 			= $_POST['addEmail'];
	$addPassword 		= $_POST['addpassword'];
	$category=$_POST['addcategory'];




  $_SESSION['addID']=$addID;
  $sql1 = "INSERT INTO doctor VALUES ('$addID', '$addname', '$addAddress', '$addContactNumber', '$addEmail', '$addPassword', '$category')";

  $result19=$mysqli ->query($sql1);
		if ($result19) {
			echo "<div class='alert alert-success' role='alert'>
				New Doctor Added !
			  </div>";
            }

}



if (isset($_POST['Delete'])) {

		$deleteID =$mysqli -> real_escape_string($_POST['deleteID']);

	if (empty($deleteID)) {
	array_push($errors,"Doctor ID is required");
}
 if (count($errors)==0) {
 




	$querydelete="DELETE FROM doctor WHERE DoctorID='$deleteID' ";
	if ($mysqli -> query($querydelete)) {

		if ($mysqli->affected_rows==1) {
			echo "<div class='alert alert-success' role='alert'>
				 Doctor Deleted !
			  </div>";
		}
		
		



	}
	  else {
	  
	  echo 'Book is Canceled';
	  


	  }

	}
}

?>
</body>
</html>
