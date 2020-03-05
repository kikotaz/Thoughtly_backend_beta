<?php

/*
*@File: getUser.php
*@Description: This PHP file will be responsible for handling POST request
*to get a speicific user from the database using his e-mail. It will show the status of SELECT
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
//Reading parameters from request
$userMail = $_POST['userMail'];
$password = $_POST['password'];

//Constructing and executing query
$query = "SELECT userId, userName, userMail, userDOB, passwordHash FROM tblUsers
            WHERE userMail = '$userMail' LIMIT 1";
$result = mysqli_query($conn, $query);
//Check if query returns any fields or not
if(mysqli_num_rows($result) == 0){
    SerializeOut("false");
}
else {
    $user = [];
    while($row = mysqli_fetch_assoc($result)){
        $user = $row;
        //Authenticating user password against DB
        if(password_verify($password, $user['passwordHash'])){
            unset($user['passwordHash']);
            $user['password'] = "";
            SerializeOut($user);
        }
        //If not authenticated show Unauthorized
        else{
            SerializeOut("Unauthorized");
        }
    }
}

