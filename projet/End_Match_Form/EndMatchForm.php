<?php
require_once(__DIR__.'/../src/Wallpapers/RandomWallpaper.php');
require_once(__DIR__.'/../src/CreationOfAMatch/MatchResults.php');
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Résultat du Match</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../css/cover.css" rel="stylesheet">
  </head>

  <body class="text-center" style="background-image: url(<?= RandomWallpaper()?>)">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column" >
      <header class="masthead mb-auto">

      </header>

      <main role="main" class="inner cover">
        <h1 class="cover-heading">Résultat du Match</h1>
        <p class="lead">Equipe gagnante</p>
        <form action="EndMatchForm.php" method="POST">
            <div class="form-group">
                <select class="form-control" name="WinnerTeam">
                    <option value="Rouge">Rouge</option>
                    <option value="Bleue">Bleue</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-secondary">Soumettre</button>
            </div>
        </form>
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        </div>
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
