<?php
$json=file_get_contents(__DIR__.'/data/Characters.json');
$Characters=json_decode($json, true);
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Classement OverWatch</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/brands.js" integrity="sha384-sCI3dTBIJuqT6AwL++zH7qL8ZdKaHpxU43dDt9SyOzimtQ9eyRhkG3B7KMl6AO19" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>

      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
          <a class="navbar-brand" href="index.php">OverWatch</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Menu principal -->
          <div class="collapse navbar-collapse" id="navbar-menu">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                      <a class="nav-link" href="index.php">
                          <i class="fas fa-home"></i> Accueil
                      </a>
                  </li>
                  <li class="nav-item ">
                      <a class="nav-link" href="rating.php?page=1">
                          <i class="fas fa-trophy"></i> Classement
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="Insert_Players_In_Game.php">
                          <span class="fi-star"></span> Création d'une Partie
                      </a>
                  </li>
              </ul>
          </div>
      </nav>

    <main role="main">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="https://www.gamersnine.com/file_g9/2018/02/overwatch-08022018-image1.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Welcome in our world !</h1>
                <p>Sur ce site, vous pourrez faire une partie, voir votre équipe et le classement. N'attendez pas et foncez ! </p>
                <p><a class="btn btn-lg btn-primary" href="Insert_Players_In_Game.php" role="button">Création d'une partie</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
            <?php
            $i=0;
            foreach ($Characters as $key => $value) {
                if($i<3){
                    print('<div class="col-lg-4">');
                    print(' <img class="rounded-circle" src="'.$Characters[$key]['images']['icon'].'" alt="Generic placeholder image" width="140" height="140">
                     <h2>'.$Characters[$key]['name'].'</h2>
                     <p>'.$Characters[$key]['description'].'</p>
                     <p><a class="btn btn-secondary" href="'.$Characters[$key]['images']['fiche'].'" role="button">Voir la fiche du perso &raquo;</a></p>
                   </div>');
                }
            $i++;
            }
          ?>
        </div><!-- /.row -->
        <div class="row">
            <?php
            $i=0;
            foreach ($Characters as $key => $value) {
                if($i>=3){
                    print('<div class="col-lg-4">');
                    print(' <img class="rounded-circle" src="'.$Characters[$key]['images']['icon'].'" alt="Generic placeholder image" width="140" height="140">
                     <h2>'.$Characters[$key]['name'].'</h2>
                     <p>'.$Characters[$key]['description'].'</p>
                     <p><a class="btn btn-secondary" href="'.$Characters[$key]['images']['fiche'].'" role="button">Voir la fiche du perso &raquo;</a></p>
                   </div>');
                }
            $i++;
            }

          ?>
        </div><!-- /.row -->

      </div><!-- /.container -->


      <!-- FOOTER -->
      <footer class="container">
        <p class="float-right"><a href="presentation.php">Back to top</a></p>
        <p>&copy; 2017-2018 La Belle et la Bête Company, Inc. &middot; <a href="#">Copyright</a> &middot; <a href="#">Terms</a></p>
      </footer>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../../../assets/js/vendor/holder.min.js"></script>
  </body>
</html>
