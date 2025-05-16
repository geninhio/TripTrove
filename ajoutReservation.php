<?php
require_once __DIR__."/repository/Insert.classe.php";

$insertion = new Insert();

$idSite = (int)filter_var($_GET["idSite"],FILTER_DEFAULT);
$temps = filter_input(INPUT_POST,"heure",FILTER_DEFAULT);
$date = filter_var($_GET["date"],FILTER_DEFAULT);
$date = $date." ".$temps;

var_dump($date);

$insertion->InsererReservation($idSite, 13, $date);

header("Location: ./historique.php");

