<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Interactive List of Cars</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-aNUYGqSUL9wG/vP7+cWZ5QOM4gsQou3sBfWRr/8S3R1Lv0rysEmnwsRKMbhiQX/O" crossorigin="anonymous">
    <link rel="stylesheet" href="../../shared/Assets/bootstrap.min.css">
    <link rel="stylesheet" href="../../shared/Assets/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Lobster|Rock+Salt|Philosopher|Playfair+Display' rel='stylesheet'
          type='text/css'>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    <style>
        .mySelect {
            min-height: 35px;
        }
    </style>
</head>
<body>
<nav class="white" role="navigation">
    <div class="nav-wrapper container">
        <a id="logo-container" href="new_car.php" class="brand-logo"
           style="font-family: 'Philosopher';text-shadow: 2px 2px 5px #eee; font-size: 29px">Interactive Lists <img
                src="images/new/Car-icon.png" width="10%"></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="https://github.com/pranav-kural/comp-1006"><h2><span class="fa fa-github-alt"></span></h2></a>
            </li>
        </ul>
    </div>
</nav>

<div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
        <div class="container">
            <br><br>
            <h1 class="header center black-text text-lighten-2" style="font-family: 'Lobster'">CARS</h1>
            <div class="row center">
                <h3 class="header col s12 yellow-text light"
                    style="font-family: 'Rock Salt'; text-shadow: 1px 1px 0 #000;">The most amazing cars in the whole
                    world. Add your favourite cars below.</h3>
            </div>
            <div class="row center">
                <a href="#carForm" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Let's
                    Do It <span class="fa fa-chevron-down"></span></a>
            </div>
            <br><br>

        </div>
    </div>
    <div class="parallax"><img src="background1.jpg" alt="Unsplashed background img 1"></div>
</div>


<div class="container">
    <div id="carForm">
        <section class="jumbotron row">
            <form action="add_car.php" method="post" class="section" id="carForm">
                <fieldset>
                    <legend class="h1">
                        Add an Amazing Car <span class="fa fa-car"></span>
                    </legend>
                    <br>
                    <div class="row">
                        <div class="input-field col s6">
                            <label for="carName">Car Name</label>
                            <input type="text" id="carName" name="carName" class="validate" required>
                        </div>

                        <div class="input-field col s6">
                            <label for="carCompany">Company</label>
                            <input type="text" id="carCompany" name="carCompany" class="validate">
                        </div>
                    </div>

                    <div class="row">

                    </div>

                    <div class="row">
                        <div class="col s4">
                            <label for="carMake" class="small">Make</label>
                            <select id="carMake" name="carMake" class="browser-default mySelect">
                                <option disabled selected>Select an Year</option>
                                <?php for ($makeYear = 1980; $makeYear <= 2016; $makeYear++) { ?>
                                    <option value="<?= $makeYear ?>"><?= $makeYear ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col s4"></div>
                        <div class="col s4">
                            <label for="carColor" class="small">Color</label>
                            <select id="carColor" name="carColor" class="browser-default mySelect">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="Red">Red</option>
                                <option value="Orange">Orange</option>
                                <option value="Blue">Blue</option>
                                <option value="Black">Black</option>
                                <option value="White">White</option>
                                <option value="Brown">Brown</option>
                                <option value="Brown">Yellow</option>
                                <option value="Brown">Green</option>
                                <option value="Brown">Pink</option>
                                <option value="Brown">Maroon</option>
                                <option value="Brown">Grey</option>
                                <option value="Brown">Sky Blue</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                                <p class="col s12">
                                    <span class="small grey-text">Select the Model Type</span>
                                </p>
                                    <div class="col s2">
                                        <input name="carModel" type="radio" id="carModel1" value="Classic" checked required/>
                                        <label for="carModel1">Classic</label>
                                    </div>

                                    <div class="col s2">
                                        <input name="carModel" type="radio" id="carModel2" value="Sports" required/>
                                        <label for="carModel2">Sports</label>
                                    </div>

                                    <div class="col s2">
                                        <input name="carModel" type="radio" id="carModel3" value="Coupe" required/>
                                        <label for="carModel3">Coupe</label>
                                    </div>

                                    <div class="col s2">
                                        <input name="carModel" type="radio" id="carModel4" value="Sedan" required/>
                                        <label for="carModel4">Sedan</label>
                                    </div>

                                    <div class="col s2">
                                        <input name="carModel" type="radio" id="carModel5" value="SUV/MUV" required/>
                                        <label for="carModel5">SUV/MUV</label>
                                    </div>

                                    <div class="col s2">
                                        <input name="carModel" type="radio" id="carModel6" value="Other" required/>
                                        <label for="carModel6">Other</label>
                                    </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <label for="carPrice">Price</label>
                            <input type="number" id="carPrice" name="carPrice" class="validate">
                        </div>
                    </div>


                    <div class="row">
                        <button class="btn btn-success waves-effect waves-light col-lg-5">Add Car <i
                                class="material-icons">send</i></button>
                        <span class="col-lg-2"></span>
                        <button type="reset" class="btn btn-danger waves-effect waves-light col-lg-5">Reset
                            details
                        </button>
                    </div>
                </fieldset>
            </form>
        </section>
    </div>
</div>


<div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
        <div class="container">
            <div class="row center">
                <h5 class="header col s12 light" style="font-family: 'Lobster'; font-size: 25px;">A collection of the
                    most amazing cars in the world, represented in an interactive way.</h5>
            </div>
        </div>
    </div>
    <div class="parallax"><img src="background2.jpg" alt="Unsplashed background img 2"></div>
</div>

<div class="container">
    <div class="section">

        <div class="row">
            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
                    <h5 class="center" style="font-family: 'Lobster';font-size: 18px">Fastest Cars in the world</h5>

                    <p class="light" style="font-family: 'Lobster'">Some of the world's most fastest cars available in
                        just one list collection. Interactive list of cars is a comprehensive list of the most amazing
                        cars which includes car that are faster than the speed of light.</p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center brown-text"><i class="material-icons">group</i></h2>
                    <h5 class="center" style="font-family: 'Lobster';font-size: 18px">User Experience Focused</h5>

                    <p class="light" style="font-family: 'Lobster'">Interactive list has been mae with the user
                        experience in focus. It presents the information in the most clearest way while adding on the
                        most amazing interactive features into the list.</p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center brown-text"><i class="material-icons">view_list</i></h2>
                    <h5 class="center" style="font-family: 'Lobster';font-size: 18px">List of Amazing Cars</h5>

                    <p class="light" style="font-family: 'Lobster'">Check out the list of all the awesome cars. See the
                        collection of all the most amazing cars in this world. You see cars here than you can't see
                        anywhere else in the world. Check out the luxury madness with the Interactive List: <a
                            href="cars.php">List of Cars</a></p>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
        <div class="container">
            <div class="row center">
                <h5 class="header col s12 light" style="font-family: 'Lobster';font-size: 23px">Website based on a
                    modern responsive front-end framework based on Material Design, and powered by PHP.</h5>
            </div>
        </div>
    </div>
    <div class="parallax"><img src="background3.jpg" alt="Unsplashed background img 3"></div>
</div>

<footer class="page-footer teal">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text" style="font-family: 'Playfair Display'">Website Details</h5>
                <p class="grey-text text-lighten-4" style="font-family: 'Playfair Display'">This is a php based webpage
                    made for the Lab 01. This Lab basically includes the performance of task which include creation of
                    databases, adding data to them using the web page. And then showing the data in the database
                    interactively.</p>


            </div>
            <div class="col l3 s12">
            </div>
            <div class="col l3 s12">
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <span style="font-family: 'Playfair Display'"> Made by </span><a class="brown-text text-lighten-3"
                                                                             href="https://github.com/pranav-kural/comp-1006"
                                                                             style="font-family: 'Rock Salt'">Pranav
                Kural </a><span class="fa fa-gitlab"></span>
        </div>
    </div>
</footer>


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
<script src="../../shared/Assets/bootstrap.min.js"></script>
</body>
</html>
