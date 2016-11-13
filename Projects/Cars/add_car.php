<?php

// Assigning the values received through POST object to new variables
$carName = $_POST['carName'];
$carCompany = $_POST['carCompany'];
$carMake = $_POST['carMake'];
$carColor = $_POST['carColor'];
$carModel = $_POST['carModel'];
$carPrice = $_POST['carPrice'];

// Connection properties stored in variables

// Localhost connection
//$host_name = "127.0.0.1";
//$database_name = "dbcars";
//$username = "root";
//$password = "";

//Dream host connection
$host_name = "sql.computerstudi.es";
$database_name = "gc200333253";
$username = "gc200333253";
$password = "3C^TL5rT";

// Setting up the connection & connecting to the database
$db_connect = new PDO("mysql:host={$host_name}; dbname={$database_name}", $username, $password);
$db_connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*
    Tried to stop prevent the injection of duplicate entries into the Table using the following code,
    but it didn't worked. Shows error: function query() called on null

    $checkRecord = $check->query("select * from tblcars where carName = '$carName'");

    if($checkRecord != null) {

    //    If the query already exists

    } else {

    //    If the query doesn't exists, therefore add the new car successfully.

    }
*/

// build the SQL
    $sql_code = 'INSERT INTO tblcars (carName, carCompany, carMake, carColor, carModel, carPrice) VALUES (:carName, :carCompany, :carMake, :carColor, :carModel, :carPrice)';

// prepare the SQL code to be executed
    $sql = $db_connect->prepare($sql_code);
    $sql->bindParam(':carName', $carName, PDO::PARAM_STR);
    $sql->bindParam(':carCompany', $carCompany, PDO::PARAM_STR);
    $sql->bindParam(':carMake', $carMake, PDO::PARAM_INT);
    $sql->bindParam(':carColor', $carColor, PDO::PARAM_STR);
    $sql->bindParam(':carModel', $carModel, PDO::PARAM_STR);
    $sql->bindParam(':carPrice', $carPrice, PDO::PARAM_INT);

// execute the SQL
    $sql->execute();

// close the connection with the database
    $db_connect = null;

    /* In case of showing a confirmation Message, following will be the code:

    $html = '<h1>The Car was successfully added. Go to the list: <a href="cars.php">Cars</a></h1>';
    echo $html;

*/

// Redirecting to the List of cars (results/records from the table)- to the cars.php
    header("Location: cars.php");

?>