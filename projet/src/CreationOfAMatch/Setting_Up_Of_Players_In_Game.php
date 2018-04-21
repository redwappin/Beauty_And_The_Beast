
<?php
require_once(__DIR__.'/../../overwatch/Player.php');
require_once(__DIR__.'/../../overwatch/Match.php');
session_start();

$json=file_get_contents(__DIR__.'/../../data/Characters.json');
$Characters=json_decode($json, true);
$Match=new Match();
$isCharacterAvailable=true;
// création de la connexion
$dsn = 'mysql:dbname=overtwatch;host=127.0.0.1';
$user = 'root';
$password = '';
$connection = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
// ajout d'un produit
if (isset($_POST['name']) && $_POST['name']!="" )
{
    $statement = $connection->prepare("
        SELECT Count(nom_joueur) AS numberOfPlayerWithSameName
        FROM joueur
        Where nom_joueur= :nom;
    ");
    $statement->bindValue(':nom', $_POST['name']);
    $statement->execute();
    $result=$statement->fetchAll();

    if (!isset($_SESSION))
    {
        $_SESSION[$_POST['name']]=new Player($_POST['name'],$_POST['character'], $_POST['Team']);
        $Match->_setNewPlayerInMatch($_SESSION[$_POST['name']]);
    }

    else{
            foreach ($_SESSION as $player)
            {
                 $Match->_setNewPlayerInMatch($player);
            }
            foreach($_SESSION as $players)
            {
                if ($players->_getTeam()==$_POST['Team'] && $players->_getCharacterName()==$_POST['character'] || $player->_getName()==$_POST['name'])
                {
                     $isCharacterAvailable=false;
                     break;
                }
            }
        }
    if ($isCharacterAvailable&&($_POST['Team']=="Blue" && $Match->_getNbOfPlayersInBlueTeam()<3 ||$_POST['Team']=="Red" && $Match->_getNbOfPlayersInRedTeam()<3))
    {
        $_SESSION[$_POST['name']]=new Player($_POST['name'],$_POST['character'], $_POST['Team']);
        $Match->_setNewPlayerInMatch($_SESSION[$_POST['name']]);

        if ($result[0]["numberOfPlayerWithSameName"]==0)
        {
            $statement = $connection->prepare("
                INSERT INTO `joueur` (`nom_joueur`,`nom_perso`,`Equipe`)
                VALUES
                    (:nom_joueur,:nom_perso,:Equipe);
                ");
            $statement->bindValue(':nom_joueur', $_POST['name']);
            $statement->bindValue(':nom_perso', $_POST['character']);
            $statement->bindValue(':Equipe', $_POST['Team']);
            $statement->execute();
        }
    }
    if ($Match->_getNbPlayersInMatch()==6)
    {
            header("Location: End_Match_Form/EndMatchForm.php");
            exit();
    }

}
    ?>
