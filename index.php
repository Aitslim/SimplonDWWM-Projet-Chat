<?php

require 'model/model.php';

$messages = [];
$messages = findAll();
//Récupérer dans une variable $messages tous les messages en base de données

// inclure la vue souhaitée
require "view/default.php";
