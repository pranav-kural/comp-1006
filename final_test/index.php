<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/final_test/classes/employee.php';

$employee1 = new Employee("Pranav", "Kural", "1996-05-28", "60000");

$employee = $employee1->getEmployeeDetails();

?>

<!--  Website URL: http://gc200333253.computerstudi.es/final_test/  -->

<!DOCTYPE html>
<html>
<head>
    <link crossorigin='anonymous' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'
          integrity='sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7' rel='stylesheet'>
    <link crossorigin='anonymous' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css'
          integrity='sha384-aNUYGqSUL9wG/vP7+cWZ5QOM4gsQou3sBfWRr/8S3R1Lv0rysEmnwsRKMbhiQX/O' rel='stylesheet'>
    <link rel="stylesheet" href="assests/css/semantic.min.css">
    <title>Employee Information</title>
</head>
<body style="background-color: #000000">
<div class='container'>
    <section class="jumbotron center" style="margin-top: 7%">
        <?php if (!empty($employee)): ?>
            <div class="ui link cards">
                <div class="card" style="margin-left: 3%">
                    <div class="image">
                        <img src="assests/images/employee_potrait.png">
                    </div>
                    <div class="content">
                        <div class="header"><?= $employee['fullName']; ?></div>
                        <div class="meta">
                            <span>Age: <?= $employee['age']; ?></span>
                        </div>
                        <div class="description">
                            <h3 class="text-primary" style="margin-bottom: 0">Income Info</h3>
                            <div>
                                <h4>Gross Income: $<?= $employee['grossIncome']; ?></h4>
                            </div>
                            <div>
                                <h4>Net Income: $<?= $employee['netIncome']; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <header style="margin-top: 15%; margin-left: 15%">
                    <h1>Employee<br> Information</h1>
                    <h3>Intro to Web Programming - Final Term</h3>
                </header>
            </div>
        <?php else: ?>
            <div class="alert alert-warning">
                No employee information available at the moment.
            </div>
        <?php endif ?>
    </section>
</div>
<script src="assests/css/semantic.min.js"></script>
</body>
</html>

