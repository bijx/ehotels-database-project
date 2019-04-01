<?php
	session_start();

	$db_connection = pg_connect("host=ec2-107-20-177-161.compute-1.amazonaws.com dbname=dolhm4vbocfne user=hsfaekqhyucjbw password=8f044502346b09fa315753963d40c52902498d96f74c4c9b61ce5c3f0f627c22"); //Access Database

	if(isset($_POST['r1'])){	//Do when the submit button is clicked.
		
		if($_POST['r1'] == "customer"){ 
			$_SESSION['user_SSN'] = $_POST['SSN']; //Set global ssn variable to the one in the field.

			$result = pg_query($db_connection, 'SELECT "cSSN" FROM "Customer" WHERE "cSSN"='.$_SESSION['user_SSN']); //Find existing SSN in database.
			$columns = pg_fetch_row($result);

			if($columns == ""){ //If there are no matches, create a new customer with placeholder values.
				 pg_query($db_connection, 'INSERT INTO "Customer" VALUES ('.$_SESSION['user_SSN'].', \'Address\', \'Name\', \'2018-01-01\');');
			}

			header( 'Location: customer.php'); //Go to customer portal.
		}else{
			$_SESSION['user_SSN'] = $_POST['SSN'];

			$result = pg_query($db_connection, 'SELECT "eSSN" FROM "Employee" WHERE "eSSN"='.$_SESSION['user_SSN']);
			$columns = pg_fetch_row($result);

			if($columns == ""){
				pg_query($db_connection, 'INSERT INTO "Customer" VALUES ('.$_SESSION['user_SSN'].', \'Address\', \'Name\', \'Role\');');
			}

			header( 'Location: employee.php');	
		}
	}

?>

<!DOCTYPE html>

<html>
	<head>
		<title>Hotel Management System</title>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="main.css">
		<link href="https://fonts.googleapis.com/css?family=Acme|Ubuntu" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>

	<body>
		<div id="signoutAlert" class="alert alert-success" role="alert">
			  Successfully signed out!
		</div>

		<section class="content">
            <div class="logo">
                <h1>Hotel Database System</h1>	
            </div>

            <div class="authfield">
            	<form action="" method="post">
            	<br>
            		<h2>Sign in</h2>
					<input type="text" name="SSN" placeholder="SSN"><br><br>
					<input id="r1" type="radio" name="r1" value="customer" checked>Customer
					<input id="r2" type="radio" name="r1" value="employer">Employee<br><br>
					<input type="submit" name="submit" value="Login" class="splashButton">

				</form>
			</div>

			
		</section>

	</body>

	<script>
		document.getElementById('signoutAlert').style.display='none';
	
		if(window.location.href.split("?")[1] == "signout=true"){
			document.getElementById('signoutAlert').style.display='block';
		}

	</script>


</html>
