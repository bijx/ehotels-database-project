<?php
	session_start();
	
?>



<!DOCTYPE html>

<html>
	<head>
		<title>Search Results - Customer Portal</title>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	</head>

	<body>

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="">HotelDb</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item">
		        <a class="nav-link disabled" href="">Customer SSN: <?php echo $_SESSION['user_SSN'];?></a>
		      </li>
		    </ul>
		    <form action="index.php?signout=true" method="post">
		    	<button name="signoutbtn" class="btn btn-outline-success my-2 my-sm-0">Sign Out</button>
		    </form>
		  </div>
		</nav>

		<div class="container">
			<br>
			<center>
				<h1>Booking Successful</h1>
				<p>Your booking has successfully been added.</p>
				<button class="btn btn-secondary" onClick="window.location.href='customer.php'">Back to Search</button>
			</center>
		</div>
	</body>

</html>


<?php
	print_r($_POST['checkin']);
	if(isset($_POST['s1'])){
		
		//if(pg_query($db_connection, 'SELECT "roomID" FROM "Booked_To" WHERE "roomID"='.pg_fetch_array($result)[$_POST['bookingID']][11]) != ""){
			$i=$_POST['bookingID'];

			pg_query($db_connection, 'update "Customer" SET ("customerAdddress","customerName")=(\''.$_POST['address'].'\',\''.$_POST['bookerName'].'\') WHERE "cSSN"='.$_SESSION['user_SSN'].';');

			pg_query($db_connection, 'INSERT INTO "public"."Bookings_Rentings" VALUES (random() * 99999 + 2, '.$array[$i][2].', true, false, '.$array[$i][1].', '.$_SESSION['user_SSN'].', \''.$_POST['checkin'].'\',null,\''.$array[$i][0].'\');');
			header("Location: booking_success.php");

	}

?>