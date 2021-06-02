<?php

require 'model/model.php';

if (isset($_POST["chat_pseudo"]) && isset($_POST["chat_message"])) {
    echo "<br>" . "Je suis dans Index.php " . "<br>";
    var_dump($_POST);
    // $messages = $_POST;
    create($_POST);
}

//Récupérer dans une variable $messages tous les messages en base de données
$messages = findAll();

// inclure la vue souhaitée
require "view/default.php";
