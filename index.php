<?php

require 'model/model.php';


if ($_POST) {
    create($_POST);
} elseif (isset($_GET["delete"])) {
    delete($_GET["delete"]);
}
// Récupérer tous les messages en base de données
$messages = findAll();

// inclure la vue souhaitée
require "view/default.php";
