<?php
include('../overwatch/Player.php');
include('../overwatch/Match.php');
 session_start();

$dsn = 'mysql:dbname=overtwatch;host=127.0.0.1';
$user = 'root';
$password = '';
$connection = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
if (isset($_POST['WinnerTeam']))
 {
    $statement = $connection->prepare("
        SELECT * FROM `match`;
        INSERT INTO `match` (`WinnerTeam`)
        VALUES
            (:winner)
            ;
            ");

   $statement->bindValue(':winner', $_POST['WinnerTeam']);
   $statement->execute();

    foreach($_SESSION as $joueur)
    {
        if($joueur->_getTeam()==$_POST['WinnerTeam'])
        {
            $statement = $connection->prepare("
                UPDATE joueur
                SET nb_Victory = nb_Victory+1
                WHERE nom_joueur=:nom;
            ");
            $statement->bindValue(':nom', $joueur->_getName());
            $statement->execute();
        }
        else
        {
            $statement = $connection->prepare("
                UPDATE joueur
                SET nb_Defeat = nb_Defeat+1
                WHERE nom_joueur=:nom;
            ");
            $statement->bindValue(':nom', $joueur->_getName());
            $statement->execute();
        }
        $statement = $connection->prepare("
            UPDATE joueur
            SET pourcentOfVictory =100*(nb_Victory/(nb_Victory+nb_Defeat))
            WHERE nom_joueur=:nom;
        ");
        $statement->bindValue(':nom', $joueur->_getName());
        $statement->execute();
    }
session_destroy();
header('Location: ../rating.php');
exit();
}

?>
