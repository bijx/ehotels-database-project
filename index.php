<?php
	session_start();

	if(isset($_SESSION['isSignedOut']) && $_SESSION['isSignedOut']=='true'){
		$_SESSION['isSignedOut'] = 'false';

	}

	
	if(isset($_POST['r1'])){
		$_SESSION['user_SSN'] = $_POST['SSN'];
		header( 'Location: customer.php');
	}
	if(isset($_POST['r2'])){
		$_SESSION['user_SSN'] = $_POST['SSN'];
		header( 'Location: employee.php');	
	}



?>

<!DOCTYPE html>

<html>
	<head>
		<title>Hotel Management System</title>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="main.css">
		<link href="https://fonts.googleapis.com/css?family=Acme|Ubuntu" rel="stylesheet">
	</head>

	<body>

		<section class="content">
            <div class="logo">
                <h1>Hotel Database System</h1>	
            </div>

            <div class="authfield">
            	<form action="" method="post">
            	<br>
            		<h2>Sign in</h2>
					<input type="text" name="SSN" placeholder="SSN"><br><br>
					<input id="r1" type="radio" name="r1" value="customer">Customer
					<input id="r2" type="radio" name="r2" value="employer">Employee<br><br>
					<input type="submit" name="submit" value="Login" class="splashButton">

				</form>
			</div>
		</section>

	</body>

	<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
	  <div class="toast-header">
	    <img src="..." class="rounded mr-2" alt="...">
	    <strong class="mr-auto">HotelDb</strong>
	    <small>Right now</small>
	    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
	      <span aria-hidden="true">&times;</span>
	    </button>
	  </div>
	  <div class="toast-body">
	    Hello, world! This is a toast message.
	  </div>
	</div>

	<script>
		/*function checkField(){
			if(document.getElementById("r1").checked==true){
				window.location.href = "customer.html";
			}else{
				window.location.href = "employee.html";
			}
		}*/
		
	</script>


</html>
