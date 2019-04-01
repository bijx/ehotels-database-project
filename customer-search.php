
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
			<h1>Search Results</h1>
			<button class="btn btn-secondary" onClick="window.location.href='customer.php'">Back to Search</button>
			<br>
			<br>
			<div class="container">
				<table class="table table-dark">
				  <thead>
				    <tr>
				    	<th scope="col">Hotel</th>	
						<th scope="col">Room Number</th>
						<th scope="col">Price ($)</th>
						<th scope="col">Room Capacity</th>
						<th scope="col">View Type</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php
					  	$db_connection = pg_connect("host=ec2-107-20-177-161.compute-1.amazonaws.com dbname=dolhm4vbocfne user=hsfaekqhyucjbw password=8f044502346b09fa315753963d40c52902498d96f74c4c9b61ce5c3f0f627c22");

						$result = pg_query($db_connection, 'select distinct "hotelName","roomCapacity","price","rating","RoomID","viewType" from "public"."Room", "public"."Hotel", "public"."HotelChains" where "hotelName" = \''.$_SESSION['search'][2].'\' and "roomCapacity" = '.$_SESSION['search'][4].' and "price" > '.$_SESSION['search'][6].' and "rating" = '.$_SESSION['search'][3].' order by "price" asc');
			            
			            while($row = pg_fetch_array($result)) {
			            ?>
			                <tr>
			                	<td><?php echo $row['hotelName']?></td>
			                    <td><?php echo $row['RoomID']?></td>
			                    <td><?php echo $row['price']?></td>
			                    <td><?php echo $row['roomCapacity']?></td>
			                    <td><?php echo $row['viewType']?></td>
			                </tr>

			            <?php
			            }
			            ?>
				  </tbody>
				</table>
			</div>
		</div>
	</body>

</html>