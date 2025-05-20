<?php

    require_once __DIR__."/Controller/SessionFinale.php";

    $session = new SessionFinale();
    session_start();
    $session->validerSession();
    $session->supprimer();

    header("Location: ./index.php");


