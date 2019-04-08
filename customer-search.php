<?php
	session_start();
	$db_connection = pg_connect("host=ec2-107-20-177-161.compute-1.amazonaws.com dbname=dolhm4vbocfne user=hsfaekqhyucjbw password=8f044502346b09fa315753963d40c52902498d96f74c4c9b61ce5c3f0f627c22");


		//$result = pg_query($db_connection, 'select distinct "hotelName","roomCapacity","price","rating","RoomID","viewType" from "public"."Room", "public"."Hotel", "public"."HotelChains" where "hotelName" = \''.$_SESSION['search'][2].'\' and "roomCapacity" = '.$_SESSION['search'][4].' and "price" > '.$_SESSION['search'][6].' and "rating" = '.$_SESSION['search'][3].' order by "price" asc');

	$array = array();
	//print_r($_POST['checkin']);
	

	
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
			<h1>Search Results</h1>
			<button class="btn btn-secondary" onClick="window.location.href='customer.php'">Back to Search</button>
			<br>
			<br>
			<div class="container">
				<table class="table table-dark">
				  <thead>
				    <tr>
				    	<th scope="col">Booking ID</th>	
				    	<th scope="col">Hotel</th>	
						<th scope="col">Room Number</th>
						<th scope="col">Price ($)</th>
						<th scope="col">Room Capacity</th>
						<th scope="col">Mountain View</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php
					  	$db_connection = pg_connect("host=ec2-107-20-177-161.compute-1.amazonaws.com dbname=dolhm4vbocfne user=hsfaekqhyucjbw password=8f044502346b09fa315753963d40c52902498d96f74c4c9b61ce5c3f0f627c22");

						$result = pg_query($db_connection, 'select distinct "RoomID","hotelName","roomCapacity","price","rating","viewType" from "public"."Room", "public"."Hotel", "public"."HotelChains" where "hotelName" = \''.$_SESSION['search'][2].'\' and "roomCapacity" = '.$_SESSION['search'][4].' and "price" > '.$_SESSION['search'][6].' and "rating" = '.$_SESSION['search'][3].' order by "price" asc');
			            $i=0;
			            while($row = pg_fetch_array($result)) {
			            ?>
			                <tr>
			                	<td><?php echo $i; $i++; ?></td>
			                	<td><?php echo $row['hotelName']?></td>
			                    <td><?php echo $row['RoomID']?></td>
			                    <td><?php echo $row['price']?></td>
			                    <td><?php echo $row['roomCapacity']?></td>
			                    <td><?php echo $row['viewType']?></td>
			                </tr>

			            <?php
			            	$tempArray = array($row['hotelName'],$row['RoomID'],$row['price'],$row['roomCapacity'],$row['viewType']);
			            	array_push($array,$tempArray);
			            	//print_r($array);
			            }
			            ?>
				  </tbody>
				</table>
			</div>
			<hr>
			<div class="container">
			<br>
		  	<h3>Booking</h3>
		  	<form method="post">
			  <div class="form-row">
			  	<div class="form-group col-md-4">
			      <label for="bookingID">Booking ID</label>
			      <input type="number" name="bookingID" min="0" class="form-control" id="bookingID" value="0" required>
			    </div>
			    <div class="form-group col-md-8">
			      <label for="checkin">Check in Date</label>
			      <input type="date" value="2019-01-01" name="checkin" class="form-control" id="checkin" required>
			    </div>
			  </div>
			  <div class="form-row">
			  	<div class="form-group col-md-2">
			      <label for="bookerSSN">Booker SSN</label>
			      <input type="text" value=<?php echo '"'.$_SESSION['user_SSN'].'"';?> name="bookerSSN" min="0" class="form-control" id="bookerSSN" disabled>
			    </div>
			    <div class="form-group col-md-3">
			      <label for="bookerName">Name</label>
			      <input type="text" placeholder="Name" name="bookerName" min="0" class="form-control" id="bookerName" required>
			    </div>
			    <div class="form-group col-md-7">
			      <label for="address">Address</label>
			      <input type="text" placeholder="Address" name="address" class="form-control" id="address" required>
			    </div>
			  </div>
			  <button type="submit" name="submit" class="btn btn-primary">Book</button>
			</form>
			<br>
			</div>
		</div>
	</body>


</html>


<?php
	$i=0;
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
		
		//if(pg_query($db_connection, 'SELECT "roomID" FROM "Booked_To" WHERE "roomID"='.pg_fetch_array($result)[$_POST['bookingID']][11]) != ""){
		$i=$_POST['bookingID'];
		print($i);
		pg_query($db_connection, 'update "Customer" SET ("customerAdddress","customerName")=(\''.$_POST['address'].'\',\''.$_POST['bookerName'].'\') WHERE "cSSN"='.$_SESSION['user_SSN'].';');

		pg_query($db_connection, 'INSERT INTO "public"."Bookings_Rentings" VALUES (random() * 99999 + 2, '.$array[$i][2].', false, '.$array[$i][1].', '.$_SESSION['user_SSN'].', \''.$_POST['checkin'].'\',null,\''.$array[$i][0].'\',true);');
		echo('<script type="text/javascript">location.href = \'index.php?booksuccess=true\';</script>');
	}
?>