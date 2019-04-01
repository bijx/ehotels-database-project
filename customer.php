<?php
	session_start();
	if(isset($_POST['submit'])){
		$_SESSION['search'] = [$_POST['checkin'],$_POST['checkout'],$_POST['hotelChain'],$_POST['rating'],$_POST['roomCapacity'],$_POST['totalRooms'],$_POST['price']];
		header("Location: customer-search.php");
	}
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
			<h1>Room Search</h1>
			<br>
		  	<h3>Search Criteria</h3>
		  	<form method="post">
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="checkin">Check in Date</label>
			      <input type="date" value="2019-01-01" name="checkin" class="form-control" id="checkin">
			    </div>
			    <div class="form-group col-md-6">
			      <label for="checkout">Check out Date</label>
			      <input type="date" value="2019-01-02" name="checkout" class="form-control" id="checkout">
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-4">
			      <label for="hotelChain">Hotel Chain</label>
			      <select name="hotelChain" class="form-control" id="hotelChain">
			      	<option value="Best Western">Best Western</option>
			      	<option value="Delta">Delta</option>
			      	<option value="Holiday Inn">Holiday Inn</option>
			      	<option value="Mariott">Mariott</option>
			      	<option value="Quality Inn">Quality Inn</option>
			      </select>
			    </div>
			    <div class="form-group col-md-4">
			      <label for="rating">Rating</label>
			      <select name="rating" class="form-control" id="rating">
			      	<option value="5">5</option>
			      	<option value="4">4</option>
			      	<option value="3">3</option>
			      	<option value="2">2</option>
			      	<option value="1">1</option>
			      </select>
			    </div>
			    <div class="form-group col-md-4">
			      <label for="roomCapacity">Room Capacity</label>
			      <input type="number" name="roomCapacity" min="0" class="form-control" id="roomCapacity" value="4">
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="totalRooms">Total Rooms in Hotel</label>
			      <input type="number" value="5" name="totalRooms" min="0" class="form-control" id="totalRooms">
			    </div>
			    <div class="form-group col-md-6">
			      <label for="price">Price of Room</label>
			      <input type="text" value="500" name="price" class="form-control" id="price">
			    </div>
			  </div>
			  <button name="submit" class="btn btn-primary">Search</button>
			</form>
		</div>

	</body>

</html>