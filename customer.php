<?php

	$db_connection = pg_connect("host=ec2-107-20-177-161.compute-1.amazonaws.com dbname=dolhm4vbocfne user=hsfaekqhyucjbw password=8f044502346b09fa315753963d40c52902498d96f74c4c9b61ce5c3f0f627c22");

	$result = pg_query($db_connection, 'SELECT * FROM "HotelChains"');
	$columns = pg_fetch_row($result);

	//echo $columns[0];
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Customer Portal</title>
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
		        <a class="nav-link disabled" href="">Customer SSN: <?php session_start(); echo $_SESSION['user_SSN'];?></a>
		      </li>
		    </ul>
		    <form action="index.php?signout=true" method="post">
		    	<button name="signoutbtn" class="btn btn-outline-success my-2 my-sm-0">Sign Out</button>
		    </form>
		  </div>
		</nav>

		<div class="container">
			<br>
			<h1>Room Search</h1>
			<br>
		  	<h3>Search Criteria</h3>
		  	<form>
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="checkin">Check in Date</label>
			      <input type="date" class="form-control" id="checkin">
			    </div>
			    <div class="form-group col-md-6">
			      <label for="checkout">Check out Date</label>
			      <input type="date" class="form-control" id="checkout">
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-4">
			      <label for="hotelChain">Hotel Chain</label>
			      <select name="hotelChain" class="form-control" id="hotelChain">
			      	<option value="">Select...</option>
			      </select>
			    </div>
			    <div class="form-group col-md-4">
			      <label for="rating">Rating</label>
			      <select name="rating" class="form-control" id="rating">
			      	<option value="">5</option>
			      	<option value="">4</option>
			      	<option value="">3</option>
			      	<option value="">2</option>
			      	<option value="">1</option>
			      </select>
			    </div>
			    <div class="form-group col-md-4">
			      <label for="roomCapacity">Room Capacity</label>
			      <input type="number" min="0" class="form-control" id="roomCapacity" placeholder="4">
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="totalRooms">Total Rooms in Hotel</label>
			      <input type="number" min="0" class="form-control" id="totalRooms">
			    </div>
			    <div class="form-group col-md-6">
			      <label for="inputState">Price of Room</label>
			      <input type="text" class="form-control" id="inputCity">
			    </div>
			  </div>
			  <button type="submit" class="btn btn-primary">Search</button>
			</form>
		</div>

		<br>
		<hr>
		<br>
		<div class="container">
			<table class="table table-dark">
			  <thead>
			    <tr>
			      <th scope="col">Hotel</th>
			      <th scope="col">Rating</th>
			      <th scope="col">Room Cap.</th>
			      <th scope="col">Price</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope="row">1</th>
			      <td>Mark</td>
			      <td>Otto</td>
			      <td>@mdo</td>
			    </tr>
			    
			  </tbody>
			</table>
		</div>

	</body>


</html>