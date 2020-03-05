<?php

/*
*@File: createUser.php
*@Description: This PHP file will be responsible for handling POST request
*to insert a new user to the database. It will show the status of INSERT 
*query at the end.
*@Developer: Karim Saleh
*@Date: 20/07/2019
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
$userDOB = $userJson['userDOB'];
$passwordHash = password_hash($userJson['password'], PASSWORD_DEFAULT);
//Constructing insert user query
$query = "INSERT INTO tblUsers(userId, userName, userMail, userDOB, passwordHash)
         VALUES('$userId','$userName', '$userMail', '$userDOB', '$passwordHash')";
//Executing insert query
$status = mysqli_query($conn, $query);
//Writing query result as status
SerializeOut($status);
//Closing connection
Close($conn);