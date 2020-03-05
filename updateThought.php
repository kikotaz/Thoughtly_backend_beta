<?php

/*
*@File: updateThought.php
*@Description: This PHP file will be responsible for handling POST request
*to edit a speicif Thought in the database. It will show the status of UPDATE 
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
//Reading content from POST request
$thoughtId = $_POST['thoughtId'];
$thoughtTitle = $_POST['thoughtTitle'];
$thoughtDetails = $_POST['thoughtDetails'];
//Constructing and executing query
$query = "UPDATE tblThoughts SET thoughtTitle='$thoughtTitle', thoughtDetails= '$thoughtDetails' 
            WHERE thoughtId = '$thoughtId'";
$status = mysqli_query($conn, $query);
//Writing query result as status
SerializeOut($status);
//Closing connection
Close($conn);