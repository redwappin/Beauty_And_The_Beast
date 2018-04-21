<?php

$dsn = 'mysql:dbname=overwatch;host=127.0.0.1';
$user = 'root';
$password = '';

$connection = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$statement = $connection->prepare("
    SELECT player_Name, Points, number_of_Victory
    FROM player
    ORDER BY Points DESC;
");
$statement->execute();
$rating=$statement->fetchAll();

$countPerPage = 10;
$pageCount = ceil(count($rating) / $countPerPage);

$page = 1;
if (isset($_GET['page'])) {
    $page = (int)$_GET['page'];
}

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
                    <a class="nav-link" href="rating.php?page=1">
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
                    <?php if ($rating==[]) {
                        for ($j=0; $j<5; $j++) {
                            print("<br></br>");
                        }
                        ?>
                            <center><h1>Il n'y a eu aucun match de joué pour l'instant!<h1></center>
                    <?php }

                     else { ?>
                            <br><p>
                                Meilleurs Joueurs :
                                <!-- OU Séries les mieux notées : -->
                            </p></br>

                            <!-- Tableau des résultats du classement -->

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Joueurs</th>
                                        <th scope="col">
                                            Nombre de Points
                                        </th>
                                        <th scope="col">
                                            Nombre de victoire
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                     for ($i=($_GET['page']*$countPerPage)-$countPerPage;$i<($_GET['page']*$countPerPage);$i++){
                                         $number=$i+1;
                                        if(isset($rating[$i][0])){
                                            print( '<tr> <th scope="row">'.$number.'</th>
                                                        <td><a >'.$rating[$i][0].'</a></td>
                                                        <td><a >'.$rating[$i][1].'</a></td>
                                                        <td><a >'.$rating[$i][2].'</a></td>
                                                    </tr>');
                                        }
                                    } ?>
                                </tbody>
                            </table>

                    <!-- BONUS Pagination -->
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <?php if ($page > 1) {  ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="rating.php?page=<?= $page - 1 ?>">
                                                            &laquo;
                                                    </a>
                                                </li>
                                    <?php } ?>

                                    <?php for ($i = $page - 2; $i <= $page + 2; $i++) { ?>
                                            <?php if ($i > 0 && $i <= $pageCount) { ?>
                                                <li class="page-item <?php if ($i === $page) { print 'active'; } ?>">
                                                    <a class="page-link" href="rating.php?page=<?= $i ?>">
                                                        <?= $i ?>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                    <?php } ?>

                                    <?php if ($page < $pageCount) { ?>
                                        <li class="page-item">
                                            <a class="page-link" href="rating.php?page=<?= $page + 1 ?>">
                                                &raquo;
                                            </a>
                                        </li>
                                    <?php } ?>

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
        <?php }?>

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
