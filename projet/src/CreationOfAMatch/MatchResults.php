<?php
include('../overwatch/Player.php');
include('../overwatch/Match.php');
 session_start();

$dsn = 'mysql:dbname=overwatch;host=127.0.0.1';
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

    foreach($_SESSION as $player)
    {
        if($player->_getTeam()==$_POST['WinnerTeam'])
        {
            $statement = $connection->prepare("
                UPDATE player
                SET number_of_Victory = number_of_Victory+1,
                    Points= Points+5
                WHERE player_Name=:name;
            ");
            $statement->bindValue(':name', $player->_getName());
            $statement->execute();
        }
        else
        {
            $statement = $connection->prepare("
                SELECT Points
                FROM Player
                WHERE player_Name=:name;
            ");
            $statement->bindValue(':name', $player->_getName());
            $statement->execute();
            $playerPoints=$statement->fetchAll();
            if($playerPoints["Points"]>=2){
                $statement = $connection->prepare("
                    UPDATE player
                    SET Points= Points-2
                    WHERE player_Name=:name;
                ");
                $statement->bindValue(':name', $player->_getName());
                $statement->execute();
            }
        }
        $statement = $connection->prepare("
            UPDATE player
            SET number_of_Match=number_of_Match+1
            WHERE player_Name=:name;
        ");
        $statement->bindValue(':name', $player->_getName());
        $statement->execute();
    }
session_destroy();
header('Location: ../rating.php');
exit();
}

?>
