<?php

function Open(){
	
	$host = "35.197.187.209";
	$user = "thoughtly-db-admin";
	$pass = "KarimSaleh@AIS12";
	$db = "thoughtly_dev_db";
	
	$connection = mysqli_connect($host, $user, $pass, $db, '3306');
	
	if(!$connection){
		echo 'Cannot connect to DB';
	}
	return $connection;
}

function Close($connection){
	$connection -> close();
}

function SerializeOut($raw_data){
	
    echo json_encode($raw_data);
    
    exit;
}