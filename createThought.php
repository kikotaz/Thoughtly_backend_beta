<?php

/*
*@File: createThought.php
*@Description: This PHP file will be responsible for handling POST request
*to insert a new Thought to the database. It will show the status of INSERT 
*query at the end.
*@Developer: Karim Saleh
*@Date: 21/07/2019
*/

//Show the errors on page
ini_set('display_errors', 1);
//Adding connect as dependency
require 'connect.php';
//Opening conenction
$conn = Open();
//Getting User details from POST request
$thoughtId = $_POST['thoughtId'];
$imagePath = $_POST['imagePath'];
$recordingPath = $_POST['recordingPath'];
$thoughtTitle = $_POST['thoughtTitle'];
$thoughtDetails = $_POST['thoughtDetails'];
$userId = $_POST['userId'];
//Constructing insert user query
$query = "INSERT INTO tblThoughts(thoughtId, imagePath, recordingPath, thoughtTitle, thoughtDetails,
            userId) VALUES('$thoughtId','$imagePath', '$recordingPath', '$thoughtTitle',
             '$thoughtDetails', '$userId')";
//Executing insert query
$status = mysqli_query($conn, $query);
//Writing query result as status
SerializeOut($status);
//Closing connection
Close($conn);