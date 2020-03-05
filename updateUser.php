<?php

/*
*@File: updateUser.php
*@Description: This PHP file will be responsible for handling POST request
*to edit a speicif user in the database. It will show the status of UPDATE 
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
//Reading JSON content from request
$requestBody = file_get_contents('php://input');
$userJson = json_decode($requestBody, true);
//Getting User details from JSON
$userId = $userJson['userId'];
$userName = $userJson['userName'];
$userMail = $userJson['userMail'];
$query = "";
if(strlen($userJson['password']) > 0){
    $passwordHash = password_hash($userJson['password'], PASSWORD_DEFAULT);
    $query = "UPDATE tblUsers SET userName='$userName', userMail= '$userMail', 
            passwordHash = '$passwordHash' WHERE userId = '$userId'";
}
else {
    $query = "UPDATE tblUsers SET userName='$userName', userMail= '$userMail' WHERE userId = '$userId'";
}
//Executing insert query
$status = mysqli_query($conn, $query);
//Writing query result as status
SerializeOut($status);
//Closing connection
Close($conn);
