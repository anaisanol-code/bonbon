<?php
include "configuration.php";

session_unset();
session_destroy();

echo "Vous êtes maintenant déconnecté. <a href='index.php'>Retour à l'accueil</a>";
