<?php

include('cors.php');
//Include connection file
include('database_connection.php');
$query = "SELECT * FROM profile ORDER BY id";

$statement = $connect->prepare($query);
if($statement->execute()){
	while($row = $statement->fetch(PDO::FETCH_ASSOC)){
		$data[] = $row;
	}
	echo json_encode($data);
}
?>