<?php 
    session_start(); // demarrage de la session
    session_destroy(); // détruit la session
    header('Location:index.php'); // On redirige
    die();

