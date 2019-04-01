<?php

	$db_connection = pg_connect("host=ec2-107-20-177-161.compute-1.amazonaws.com dbname=dolhm4vbocfne user=hsfaekqhyucjbw password=8f044502346b09fa315753963d40c52902498d96f74c4c9b61ce5c3f0f627c22");
	$i=0;
	while($i<226){
		pg_query($db_connection, 'INSERT INTO "Part_Of" SELECT "hotelAddress" FROM "Hotel" LIMIT 40, SELECT "RoomID" FROM "Room" LIMIT 40');
		$i++;
	}

?>