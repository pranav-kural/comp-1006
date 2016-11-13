<!-- 
  * COMP 1006 - Intro to Web Programming
  * ------------------------------------
  * Pranav Kural
  * 200333253
  * Assignment Lesson 1 - lab 1
 -->
<?php
  // Step 1 - Create the following PHP variables: Band Name, Band Founded Date (using the PHP date function).
  // creating the variables
  $band_name = "Magic!";
  $band_founded_date = "2012";
  $band_origin = "Toronto";


  // Step 2 - Create the following PHP array: Band Members
  // creating the $band_members array
  $band_members = array("Nasri", "Mark Pellizzer", "Alex Tanas", "Ben Spivak");

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <title>Lesson 01 - Lab</title>
  </head>

  <body role="document">
    <div class="container">

      <header role="banner">
        <h1 class="page-header">Lesson 01 Lab<small>&nbsp;&mdash;&nbsp;Dynamic Pages -  Favourite Band</small></h1>
      </header>

      <main role="main">
        <section>
          <!-- Step 3 - Fill in the placeholders -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                <!-- Output PHP variable for Band Name (double check the data exists so the page doesn't throw an error) -->
                  <?= $band_name ?>
              </h3>
            </div>

            <div class="panel-body">
              <div>
                <h3>Band Members</h3>
                <p>
                <ul>
                  <!-- Output PHP array for Band Members using a foreach loop -->
                  <!-- interates through the loop and add a li tag with a band member's name as it's content -->
                  <?php foreach ($band_members as $member): ?>
                    <li><?= $member ?></li>
                  <?php endforeach; ?>
                  </ul>
                </p>
                <h3>Band Founded Date</h3>
                <p>
                  <!-- Output PHP variable for Band Founded Date -->
                  <?= $band_founded_date ?>
                </p>
              </div>
            </div>
          </div>
        </section>
      </main>

      <!-- Step 4 - Upload to your web server and submit your link on Blackboard for 5 marks -->
      <!-- link:  -->
      
      <!-- Following not a requirement or part of assignment, footer start -->
    <footer class="panel-footer" role="contentinfo">
      <h4 class="text-center text-primary">Pranav Kural</h4>
      <h4 class="text-center text-primary">200333253</h4>
      <ul class="list-unstyled list-inline list-group text-center">
        <li class="list-group-item"><a class="github-button" href="https://github.com/pranav-kural/comp-1006" data-style="mega" aria-label="Follow @pranav-kural on GitHub">Follow</a></li>
        <li class="list-group-item"><a class="github-button" href="https://github.com/pranav-kural/comp-1006" data-icon="octicon-star" data-style="mega" aria-label="Star pranav-kural/comp-1006 on GitHub">Star</a></li>
        <li class="list-group-item"><a class="github-button" href="https://github.com/pranav-kural/comp-1006/fork" data-icon="octicon-repo-forked" data-style="mega" aria-label="Fork pranav-kural/comp-1006 on GitHub">Fork</a></li>
    </ul>
      <h3 class="text-center text-success"><a href="index.html">Go Back</a></h3>
    </footer>
    <!-- footer end. -->

    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
  
</html>