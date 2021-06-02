<?php

/**
 * Récupérer les messages dans la base de données
 */
function findAll(): array
{
    $db = getDBConnection();

    // Coder ici
    try {
        $requete = 'SELECT wp_posts.id as id
                     , post_title
                     , post_content
                     , post_date
                     , wp_users.display_name
                  from wp_posts, wp_users
                 where post_author = wp_users.id
                   and post_type = "post"
                   and post_status = "publish"
                 order by post_date DESC
                 ';
        $req = $db->query($requete);
        $req->setFetchMode(PDO::FETCH_ASSOC);

        $tab = $req->fetchAll();
        $req->closeCursor();
        $db = null;
        return $tab;
    } catch (PDOException $e) {
        print "Erreur sur la requete : " . $e->getMessage() . "<br/>";
        die();
    }
}

/**
 * Ajouter un message dans la base de données
 */
function create(array $post): void
{
    $db = getDBConnection();

    // Coder ici
}

/**
 * Connection à la base de donnéess
 */
function getDBConnection(): PDO
{
    // Coder ici
    $host = "localhost";
    $dbname = "db_wordpress";
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
