<?php include '../../datalayer/bookserver.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient</title>
	<link rel="stylesheet"  href="style2.css">

	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>


<body>


	

	


	<div class="header">
	<h2>Book Appointment</h2>
</div>

<form method="post" action="book.php">

<?php include ('../../datalayer/errors.php');?>





	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">


			<div class="input-group">
		<label>Categorie</label>
	   	<select name="categorey" class="xd">
	   		<option value="bone" >Cancérologue</option>
	   		<option value="heart">Médecin généraliste</option>
	   		<option value="Dentistry">Neurologue</option>
	   		<option value="MentalHealth">Sexologue</option>
	   		<option value="Surgery">Toxicologue</option>

	   	</select>


	</div>





	<div class="input-group">
		<button type="submit" name="Search" class="btn">Chercher</button>
	</div>











	<?php  

	  if (isset($_POST['Search'])) {

	$categorey = mysqli_real_escape_string($mysqli,$_POST['categorey']);
	
	$query2="SELECT * FROM doctor WHERE categorey=('$categorey')";
	$result2=mysqli_query($mysqli,$query2);
	?>
	
		<div class="input-group"> 

			<label>Docteur</label>
			

		<select class="input-group2" name="docID">
			
	<?php   while ($row2=mysqli_fetch_assoc($result2)) {
		?>
		
	 
		<option> <?php echo $row2['DoctorID'] ?> </option>
		
	   
	  
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
		<input type="Date" name="Date">

	</div>

	<div class="input-group">
		<label>Time</label>
		<input type="Time" name="Time">
	</div>

	 <div class="input-group">
			<button type="submit" name="Book" class="btn">BOOK</button>
			</div>
	 
	 <?php  
}


	    ?>








</form>





</body>

</html>