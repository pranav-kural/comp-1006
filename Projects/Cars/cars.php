<?php

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
$db_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// build the SQL statement
$sql = 'SELECT * FROM tblcars';

// Preparing the SQL code, and fetching all the data.
$results = $db_connect->query($sql);

// count the number of rows in the tblcars table
$row_count = $results->rowCount();

// closing the connection with the database
$db_connect = null;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-aNUYGqSUL9wG/vP7+cWZ5QOM4gsQou3sBfWRr/8S3R1Lv0rysEmnwsRKMbhiQX/O" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Lobster|Rock+Salt|Philosopher|Playfair+Display' rel='stylesheet'
          type='text/css'>
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <title>Show Cars</title>
    <style>
        /* setting the background */
        body {
            background: url("backgroundss2.jpg") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
</head>
<body>
<div class="container" style="background-color: rgba(128, 0, 0, 0.61); color: #eee;">
    <header>
        <h1 class="page-header">List of Cars</h1>
    </header>

    <section>
        <!--   Checking if the table is empty with no records, following coding will work only is data is present -->
        <?php if ($row_count > 0): ?>
            <table class="table table-striped responsive-table jumbotron" style="color: #000000;">
                <thead>
                <tr>
                    <th>Car Name</th>
                    <th>Car Company</th>
                    <th>Car Make</th>
                    <th>Car Color</th>
                    <th>Car Model</th>
                    <th>Car Price</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($results as $result): ?>
                    <tr>
                        <td><?= $result['carName'] ?></td>
                        <td><?= ($result['carCompany'] == "" ? "N.A." : $result['carCompany']) ?></td>
                        <td><?= ($result['carMake'] == "" ? "N.A." : $result['carMake']) ?> </td>
                        <td><?= ($result['carColor'] == "" ? "N.A." : $result['carColor']) ?></td>
                        <td><?= $result['carModel'] ?></td>
                        <td><?= ($result['carPrice'] == 0 ? "N.A." : "$" . $result['carPrice']) ?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info">
                There's no cars available.
            </div>
        <?php endif ?>
    </section>
    <footer class="page-footer teal">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text" style="font-family: 'Lobster'">Interactive Lists</h5>
                    <p style="font-family: 'rock Salt'; font-size: 25px; color: #fff;">Go To <a
                        class="btn-floating btn-large waves-effect waves-light red" href="new_car.php"><span
                            class="fa fa-home"></span></a></p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <p style="font-family: 'philosopher'; font-size: 25px; color: #fff;">
                    <a class="btn-floating btn-large waves-effect waves-light red" href="new_car.php#carForm"><span
                            class="fa fa-plus" title="Add a new Car"></span></a>  New Car</p>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <span style="font-family: 'Playfair Display'"> Made with <span class="fa fa-heart"></span> by </span><a
                    class="brown-text text-lighten-3"
                    href="https://github.com/pranav-kural/comp-1006"
                    style="font-family: 'Rock Salt'">Pranav
                    Kural </a><span class="fa fa-gitlab"></span>
            </div>
        </div>
    </footer>
</div>

<script src="../../shared/Assets/jquery-2.2.3.min.js"></script>
<script src="js/materialize.js"></script>
<script src="../../shared/Assets/bootstrap.min.js"></script>
</body>
