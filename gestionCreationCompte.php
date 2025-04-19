<?php

require_once __DIR__."/repository/Insert.classe.php";

$pseudo = filter_input(INPUT_POST,"pseudo", FILTER_DEFAULT);
$email = filter_input(INPUT_POST,"email", FILTER_VALIDATE_EMAIL); 
$mdp = filter_input(INPUT_POST,"mdp", FILTER_DEFAULT);


$insertion = new Insert();

$insertion->InsererUtilisateur($pseudo, $email, $mdp);

header("Location: ./login.php");