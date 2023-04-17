<?php include '../../datalayer/bookserver.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet"  href="style5.css">

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

<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Admit Patient</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="miniprog.php" method="post" onsubmit="return true">
           <input type="text" hidden id="sno" name="sno">
            <div class="mb-3">
              <label for="title" class="form-label" >Patient</label>
              <input type="text" required class="form-control" id="editT" name="editT" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="desc" class="form-label" >Description</label>
              <textarea required class="form-control" id="editD" name="editD" rows="3"></textarea>
            </div>
            <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="submit_edit">Admit</button>
        </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>


    <div class="container">
    <h1>Patients Not Admitted</h1></div>
	<table class="table4">
		<tr>
		<th>Patient ID</th>
		<th>Patient Name</th>
		<th>Contact Number</th>
		<th>Blood Group</th>
        <th>Bed     </th>
        <th>Action</th>

		</tr>

		<?php $sql3="SELECT *from patients,beds where is_admit=0 and beds.is_available=1";
		$result3=$mysqli->query($sql3);
		if(mysqli_num_rows($result3)>=1){
			while ($row3=$result3->fetch_assoc()) {

				echo "<tr><td>".$row3["UserID"]."</td><td>".$row3["Name"]."</td><td>".$row3["ContactNumber"]."</td><td>".$row3['Bloodtype']."</td><td>".$row3['bed_id']."</td><td><button type='button' class='admit btn btn-primary'>Admit</button></td></tr>";
			}


			echo "</table";
	


		}

		?>
		
	</table>

    <script>
     const sel=document.getElementsByClassName("admit");
      for(i of sel)
      {
        i.addEventListener('click',function(e)
        {
            const rw=e.target.parentElement.parentElement;
          const ch=rw.children;
          let title=ch[1].innerText;
          let des=ch[2].innerText;
          let sno=ch[0].innerText;
          console.log(sno);
          console.log(title);
          console.log(des);
          $("#exampleModal").modal('toggle');
          const de=document.getElementById("editT");
          de.value=title;
          const doo=document.getElementById("editD");
          doo.value=des;
          const doe=document.getElementById("sno");
          doe.value=sno;
        });
      }

  </script>


</body>
</html>