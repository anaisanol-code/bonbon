<?php
include "configuration.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $name = $_POST["name"];
    $password = $_POST["password"];

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email, password, name) VALUES ('$email', '$hash', '$name')";
    if (mysqli_query($conn, $sql)) {
        echo "Félicitation votre compte est créer! <a href='login.php'>Se connecter</a>";
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
}
?>
<link rel="stylesheet" href="style.css">


<h2>Créer un compte</h2>
<form method="post">
    <label>Email :</label><br>
    <input type="email" name="email" required><br><br>

    <label>Nom :</label><br>
    <input type="text" name="name" required><br><br>

    <label>Mot de passe :</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">S'inscrire</button>
</form>
