<?php

// Select sur la table "chat"
function findAll(): array
{
    $db = getDBConnection();

    try {
        $requete = 'SELECT chat_date
                         , chat_pseudo
                         , chat_message
                         , id
                      FROM chat
                 ORDER BY chat_date limit 5';

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

// Ajout d'un message
function create(array $post): void
{
    $db = getDBConnection();

    try {
        $requete = "INSERT INTO chat (chat_pseudo, chat_message) VALUES (:chat_pseudo, :chat_message)";

        $stmt = $db->prepare($requete);
        $stmt->bindParam(':chat_pseudo', $post["chat_pseudo"], PDO::PARAM_STR);
        $stmt->bindParam(':chat_message', $post["chat_message"], PDO::PARAM_STR);

        $stmt->execute();

        $db = null;
    } catch (PDOException $e) {
        print "Erreur sur Insertion : " . $e->getMessage() . "<br/>";
        die();
    }
}

// Delete un message
function delete(string $id): void
{
    $db = getDBConnection();

    try {
        $requete = "DELETE FROM chat WHERE ID = :id";

        $stmt = $db->prepare($requete);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $db = null;
    } catch (PDOException $e) {
        print "Erreur sur Insertion : " . $e->getMessage() . "<br/>";
        die();
    }
}

// Update un message. PAS ENCORE UTILISEE
function upadate(array $post): void
{
    $db = getDBConnection();

    try {
        $requete = "UPADTE chat SET 
                           chat_pseudo = :chat_pseudo
                         , chat_message = :chat_message
                     WHERE ID = :id";

        $stmt = $db->prepare($requete);
        $stmt->bindParam(':chat_pseudo', $post["chat_pseudo"], PDO::PARAM_STR);
        $stmt->bindParam(':chat_message', $post["chat_message"], PDO::PARAM_STR);
        $stmt->bindParam(':id', $post["id"], PDO::PARAM_INT);

        $stmt->execute();

        $db = null;
    } catch (PDOException $e) {
        print "Erreur sur Insertion : " . $e->getMessage() . "<br/>";
        die();
    }
}

// Connection à la base
function getDBConnection(): PDO
{
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
