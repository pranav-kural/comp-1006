<?php

  if ( session_status() == PHP_SESSION_NONE ) session_start();

  $messages = [
    'success' => isset( $_SESSION['success'] ) ? $_SESSION['success'] : null,
    'fail' => isset( $_SESSION['fail'] ) ? $_SESSION['fail'] : null
  ];

  unset( $_SESSION['success'] );
  unset( $_SESSION['fail'] );

?>

<!DOCTYPE HTML>
<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-aNUYGqSUL9wG/vP7+cWZ5QOM4gsQou3sBfWRr/8S3R1Lv0rysEmnwsRKMbhiQX/O" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/semantic.min.css">
    <title><?= isset( $page_title ) ? $page_title : 'COMP-1006 - Project 02' ?></title>
    <?php if ( $_SERVER['REQUEST_URI'] == '/Project/MovieArena/movies/index.php?action=index' ) { ?>
      <title>Parallax Grid component</title>
      <link id="data-uikit-theme" rel="stylesheet" href="../../assets/movies_view/uikit.docs.min.css">
      <link rel="stylesheet" href="../../assets/movies_view/styles.css">
      <script async="" src="../../assets/movies_view/analytics.js"></script><script src="../../assets/movies_view/jquery.js"></script>
      <script src="../../assets/movies_view/uikit.min.js"></script>
      <script src="../../assets/movies_view/docs.js"></script>
      <script src="../../assets/movies_view/grid-parallax.js"></script>
    <?php } ?>
    <style>
      body {
        margin-top: 7%;
        background-color: #0BA1D8;
      }
      fieldset {
        border: none;
      }
    </style>
  </head>

  <body>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/MovieArena/includes/notify.php' ?>

    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">The Movie Arena</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="<?php echo ($_SERVER['REQUEST_URI'] == "/Project/MovieArena/movies/?action=index") ? "active" : ""; ?>"><a href="/Project/MovieArena/movies/?action=index">Home <span class="sr-only">(current)</span></a></li>
            <?php if ( is_authenticated() ): ?>
              <li class="<?php echo ($_SERVER['REQUEST_URI'] == "/Project/MovieArena/movies/?action=create") ? "active" : ""; ?>"><a href="/Project/MovieArena/movies/?action=create">New Movie</a></li>
              <li class="<?php echo ($_SERVER['REQUEST_URI'] == "/Project/MovieArena/actors/?action=create") ? "active" : ""; ?>"><a href="/Project/MovieArena/actors/?action=create">New Actor</a></li>
              <li class="<?php echo ($_SERVER['REQUEST_URI'] == "/Project/MovieArena/utilities/?action=product_seeder") ? "active" : ""; ?>"><a href="/Project/MovieArena/utilities/?action=product_seeder">Actors Seeder</a></li>
              <li class="<?php echo ($_SERVER['REQUEST_URI'] == "/Project/MovieArena/users/?action=index") ? "active" : ""; ?>"><a href="/Project/MovieArena/users/?action=index">Users</a></li>
              <li class="<?php echo ($_SERVER['REQUEST_URI'] == "/Project/MovieArena/authentication/?action=logout") ? "active" : ""; ?>"><a href="/Project/MovieArena/authentication/?action=logout"><i class="fa fa-sign-out">&nbsp;</i>Sign Out</a></li>
            <?php else: ?>
              <li class="<?php echo ($_SERVER['REQUEST_URI'] == "/Project/MovieArena/authentication/?action=login") ? "active" : ""; ?>"><a href="/Project/MovieArena/authentication/?action=login"><i class="fa fa-sign-in">&nbsp;</i>Sign In</a></li>
            <?php endif ?>
            <li class="<?php echo ($_SERVER['REQUEST_URI'] == "/Project/MovieArena/users/?action=create") ? "active" : ""; ?>"><a href="/Project/MovieArena/users/?action=create">New User</a></li>
          </ul>
          <form action="../authentication/controller.php" method="post" class="navbar-form navbar-right">
            <div class="form-group">
              <label for="email"></label>
              <input class="form-control" type="email" name="email" required maxlength="100" placeholder="Enter Email">
            </div>

            <div class="form-group">
              <label for="password"></label>
              <input class="form-control" type="password" name="password" required maxlength="100" minlength="8" placeholder="Enter password">
            </div>

            <div class="form-group">
              <input type="hidden" name="action" value="authenticate">
              <button type="submit" class="btn btn-danger"><i class="fa fa-sign-in">&nbsp;</i>Login</button>
            </div>
          </form>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>