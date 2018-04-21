<?php

$dsn = 'mysql:dbname=overtwatch;host=127.0.0.1';
$user = 'root';
$password = '';

$connection = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$statement = $connection->prepare("
    SELECT nom_joueur, pourcentOfVictory
    FROM joueur
    ORDER BY pourcentOfVictory DESC;
");
$statement->execute();
$rating=$statement->fetchAll();
 ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Classement</title>

    <!-- CSS Bootstrap 4 : https://getbootstrap.com/docs/4.0/getting-started/introduction/ -->
    <link defer rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- CSS Font Awesome 5 : https://fontawesome.com/get-started -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/brands.js" integrity="sha384-sCI3dTBIJuqT6AwL++zH7qL8ZdKaHpxU43dDt9SyOzimtQ9eyRhkG3B7KMl6AO19" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <link href="css/alphaseries.css" rel="stylesheet">
</head>
<body>
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="index.php">OverWatch</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu principal -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-home"></i> Accueil
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="rating.php">
                        <i class="fas fa-trophy"></i> Classement
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Insert_Players_In_Game.php">
                        <i class="icon-leaf"></i> Création d'une Partie 
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main role="main">

        <!-- Contenu -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="page-title">
                        <i class="fa fa-trophy"></i> Classement
                    </h2>
                    <p>
                        Meilleurs Joueurs :
                        <!-- OU Séries les mieux notées : -->
                    </p>

                    <!-- Tableau des résultats du classement -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Joueurs</th>
                                <th scope="col">
                                    Pourcentage de victoire
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=1;
                             foreach ($rating as $players){
                                 print( '<tr> <th scope="row">'.$i.'</th>
                                             <td><a >'.$players[0].'</a></td>
                                             <td><div class="progress">
                                                 <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width:'.$players[1].'%" aria-valuenow="'.$players[1].'" aria-valuemin="0" aria-valuemax="100"></div>
                                                 </div>
                                             </td>
                                         </tr>');
                                        $i++;
                            } ?>




                        </tbody>
                    </table>

                    <!-- BONUS Pagination -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">



                        </ul>
                    </nav>
                </div>
            </div>

            <hr>
        </main>

        <!-- Footer -->
        <footer class="container">
          <p class="float-right"><a href="rating.php">Back to top</a></p>
          <p>&copy; 2017-2018 La Belle et la Bête Company, Inc. &middot; <a href="#">Copyright</a> &middot; <a href="#">Terms</a></p>
        </footer>

        <!-- JavaScript Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript">
        // activation des tooltips bootstrap de partout
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        </script>
    </body>
    </html>
