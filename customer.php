<? php

	if(isset($_POST['signoutbtn'])){
		$_SESSION['user_SSN'] = '';
		$_SESSION['isSignedOut'] = 'true';
		header( 'Location: index.php');
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
		        <a class="nav-link disabled" href="">Customer SSN: <?php session_start(); echo $_SESSION['user_SSN'];?></a>
		      </li>
		    </ul>
		    <button name="signoutbtn" class="btn btn-outline-success my-2 my-sm-0">Sign Out</button>
		  </div>
		</nav>


	</body>


</html>