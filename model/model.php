<?php

/**
 * Récupérer les messages dans la base de données
 */
function findAll(): array
{
    $db = getDBConnection();

    // Coder ici
    try {
        $requete = 'SELECT chat_date
                         , chat_pseudo
                         , chat_message
                      FROM chat
                 ORDER BY chat_date DESC';

        $stmt = $db->query($requete);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $result = $stmt->fetchAll();
        $stmt->closeCursor();
        $db = null;

        return $result;
    } catch (PDOException $e) {
        print "Erreur sur Select : " . $e->getMessage() . "<br/>";
        die();
    }
}

/**
 * Ajouter un message dans la base de données
 */
function create(array $post): void
{
    $db = getDBConnection();

    // $chat_pseudo = $post["chat_pseudo"];
    // $chat_message = $post["chat_message"];

    // Coder ici
    try {
        $requete = "INSERT INTO chat (chat_pseudo, chat_message) VALUES (:chat_pseudo, :chat_message)";

        $stmt = $db->prepare($requete);
        $stmt->bindParam(':chat_pseudo', $post["chat_pseudo"], PDO::PARAM_STR);
        $stmt->bindParam(':chat_message', $post["chat_message"], PDO::PARAM_STR);

        // insertion d'une ligne
        $stmt->execute();

        // $stmt->closeCursor(); // J'ai un doute...
        $db = null;
    } catch (PDOException $e) {
        print "Erreur sur Insertion : " . $e->getMessage() . "<br/>";
        die();
    }
}

/**
 * Connection à la base de donnéess
 */
function getDBConnection(): PDO
{
    // Coder ici
    $host = "localhost";
    $dbname = "amazin";
    $user = "root";
    $pass = "";

    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    try {
        $dbh = new PDO($dsn, $user, $pass, $options);
        return $dbh;
    } catch (PDOException $e) {
        print "Erreur de connexion : " . $e->getMessage() . "<br/>";
        die();
    }
}
