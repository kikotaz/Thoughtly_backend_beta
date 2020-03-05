<?php

/*
*@File: getThoughts.php
*@Description: This PHP file will be responsible for handling POST request
*to get all the thoughts created by  speicific user from the database using 
*his userId. It will show the status of SELECT query at the end.
*@Developer: Karim Saleh
*@Date: 21/07/2019
*/

//Show the errors on page
ini_set('display_errors', 1);
//Adding connect as dependency
require 'connect.php';
//Opening conenction
$conn = Open();
//Reading parameters from request
$userId = $_POST['userId'];
//Constructing and executing query
$query = "SELECT thoughtId, imagePath, recordingPath, thoughtTitle, thoughtDetails FROM tblThoughts
            WHERE userId = '$userId' ORDER BY imagePath DESC";
$result = mysqli_query($conn, $query);
//Check if query returns any fields or not
if(mysqli_num_rows($result) == 0){
    SerializeOut("false");
}
else{
    $thoughts = array();
    while($row = mysqli_fetch_assoc($result)){
        $thoughts[] = $row;
    }
    echo json_encode(array('thoughts' => $thoughts));
}