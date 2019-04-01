<?php
	session_start();
	$db_connection = pg_connect("host=ec2-107-20-177-161.compute-1.amazonaws.com dbname=dolhm4vbocfne user=hsfaekqhyucjbw password=8f044502346b09fa315753963d40c52902498d96f74c4c9b61ce5c3f0f627c22");
	
	
		//$myPDO = new PDO('ec2-107-20-177-161.compute-1.amazonaws.com;port=5432;dbname=dolhm4vbocfne', 'hsfaekqhyucjbw', '8f044502346b09fa315753963d40c52902498d96f74c4c9b61ce5c3f0f627c22');
		//$myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	

	$result = pg_query($db_connection, 'SELECT * FROM "HotelChains"');
	$columns = pg_fetch_row($result);
	//$result = $myPDO->query('SELECT *');

	echo $columns[0];
?>