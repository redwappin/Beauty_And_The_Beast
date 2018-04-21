<?php
require_once(__DIR__.'/src/CreationOfAMatch/Setting_Up_Of_Players_In_Game.php');
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ajout de joueurs</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="background-image: url('http://kb4images.com/images/grey-wallpaper/35888812-grey-wallpaper.jpg');">
    <main role="main">
        <div class="jumbotron-background">
            <div class="jumbotron jumbotron-fluid" style="background-image: url('http://game4u.co.za/wp-content/uploads/OWBAner.jpg'); width:100% ; height:100%">
             <div class="container">
                 <h1 class="display-3" style="color: white">Ajout de Joueurs</h1>
             </div>
             </div>
        </div>

        <div class="container" style="color: grey">
            <?php
                if (isset($_POST['Team'])&& ($_POST['Team']=="Red" && $Match->_getNbOfPlayersInRedTeam()==3 || $_POST['Team']=="Blue" && $Match->_getNbOfPlayersInBlueTeam()==3)){
                    print('<div class="alert alert-success" role="alert">
                    L\'équipe '.$_POST['Team'].' est pleine! Il n\'est plus possible de rajouter de joueurs dans cette équipe! ⛔
                    </div>');
                }
                else if ($isCharacterAvailable==false)
                {
                    print('<div class="alert alert-success" role="alert">
                    Ce personnage est déjà présent dans l\'équipe que tu as choisis ou le nom que tu as choisis est déjà utilisé par quelqu\'un d\'autre dans la partie , choisis-en un autre !⛔
                    </div>');
                }
            ?>
            <h2>Joueurs dans la partie</h2>
            <?php if ($Match->_getNbPlayersInMatch()==0) {
                print('<div class="alert alert-success" role="alert">
                    La liste de joueurs est vide. 👌
                </div>');
             }
            else { ?>
                <table class="table">
                    <div class="row">
                    <?php $Match->DisplayOfPlayersInMatch("Blue");?>
                    </div>
                    <div class="row">
                        <?php $Match->DisplayOfPlayersInMatch("Red");?>
                    </div>
                </table>
            <?php } ?>
            <hr/>
            <h2>Ajout d'un Joueur</h2>
            <form action="Insert_Players_In_Game.php" method="POST">
                <div class="form-group">
                    <label for="name">Nom du Joueur</label>
                    <input name="name" type="name" class="form-control" id="name" aria-describedby="name" placeholder="Nom du Joueur">
                </div>
                <div class="form-group">
                    <label for="character">Personnage choisi</label>
                    <select class="form-control" name="character">
                        <?php
                        foreach ($Characters as $key => $value) {
                            print('<option value="'.$Characters[$key]["name"].'">'.$Characters[$key]["name"].'</option>');
                        }
                         ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Team">Equipe</label>
                    <select class="form-control" name="Team">
                        <option value="Red">Rouge</option>
                        <option value="Blue">Bleue</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-lg btn-block">Ajouter un joueur</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
