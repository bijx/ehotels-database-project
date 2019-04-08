<?php
	session_start();
	$db_connection = pg_connect("host=ec2-107-20-177-161.compute-1.amazonaws.com dbname=dolhm4vbocfne user=hsfaekqhyucjbw password=8f044502346b09fa315753963d40c52902498d96f74c4c9b61ce5c3f0f627c22");
	
	$array = array();

	

	//$result = 
	//$columns = pg_fetch_row($result);
	//$result = $myPDO->query('SELECT *');

	//echo $columns[0];
?>


<!DOCTYPE html>

<html>
	<head>
		<title>Employee Portal</title>
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
		        <a class="nav-link disabled" href="">Employee SSN: <?php echo $_SESSION['user_SSN'];?></a>
		      </li>
		      <li>
		      <a class="nav-link" href="employee.php">Bookings</a>
		      </li>
		      <li>
		      <a class="nav-link" href="employee-rentings.php">Rentings</a>
		      </li>
		    </ul>
		    <form action="index.php?signout=true" method="post">
		    	<button name="signoutbtn" class="btn btn-outline-success my-2 my-sm-0">Sign Out</button>
		    </form>
		  </div>
		</nav>

		<div class="container">
			<br>
			<h1>Rentings</h1>
			<div class="container">
				<table class="table table-dark">
				  <thead>
				    <tr>
				    	<th scope="col">#</th>	
				    	<th scope="col">Booking ID</th>	
				    	<th scope="col">Room ID</th>	
						<th scope="col">Booker SSN</th>
						<th scope="col">Check In Date</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php
					  	$db_connection = pg_connect("host=ec2-107-20-177-161.compute-1.amazonaws.com dbname=dolhm4vbocfne user=hsfaekqhyucjbw password=8f044502346b09fa315753963d40c52902498d96f74c4c9b61ce5c3f0f627c22");

						$result = pg_query($db_connection, 'SELECT * FROM "Bookings_Rentings" WHERE "isRented"=\'true\' and "isActive"=\'true\''); //JOIN TABLE WITH booked to table.
			            $i=0;
			            while($row = pg_fetch_array($result)) {
			            ?>
			                <tr>
			                	<td><?php echo $i; $i++; ?></td>
			                	<td><?php echo $row['bookingID']?></td>
			                    <td><?php echo $row['roomID']?></td>
			                    <td><?php echo $row['cSSN']?></td>
			                    <td><?php echo $row['checkin']?></td>
			                </tr>

			            <?php
				            $tempArray = array($row['bookingID'],$row['roomID'],$row['cSSN'],$row['checkin']);
				            array_push($array,$tempArray);
			            }
			            ?>
				  </tbody>
				</table>
			</div>
			<hr>
			<div class="container">
			<br>
		  	<h3>Customer Check Out</h3>
		  	<form method="post">
			  <div class="form-row">
			  	<div class="form-group col-md-4">
			      <label for="bookingID">Booking Number</label>
			      <input type="number" name="bookingID" min="0" class="form-control" id="bookingID" value="0" required>
			    </div>
			    <div class="form-group col-md-8">
			      <label for="checkout">Check out Date</label>
			      <input type="date" placeholder="2019-01-01" value=<?php echo '"'.$row['checkin'].'"'?> name="checkin" class="form-control" id="checkout" required>
			    </div>
			  </div>
			    
			  </div>
			  <button name="submit" class="btn btn-primary">Checkout Customer</button>
			</form>
			<br>
			<br>
			</div>
		</div>
	</body>

</html>

<?php  
	
	if(isset($_POST['submit'])){
		pg_query($db_connection, 'UPDATE "Bookings_Rentings" SET "isActive"=false WHERE "bookingID"='.$array[$_POST['bookingID']][0].';');
		pg_query($db_connection, 'UPDATE "Bookings_Rentings" SET "checkout"=\''.$_POST['checkout'].'\' WHERE "bookingID"='.$array[$_POST['bookingID']][0].';');
		print($_POST['bookingID']);



	}

?>