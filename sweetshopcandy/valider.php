<?php
include "configuration.php";

if (!isset($_SESSION["user_id"])) {
    echo "⚠️ Vous devez être connecté pour valider votre commande.<br>";
    echo "<a href='login.php'>Se connecter</a>";
    exit;
}

if (empty($_SESSION["panier"])) {
    echo "🛒 Votre panier est vide.<br>";
    echo "<a href='index.php'>Retour à la boutique</a>";
    exit;
}


$total = 0;
foreach ($_SESSION["panier"] as $id => $qte) {
    $result = mysqli_query($conn, "SELECT price FROM products WHERE id=$id");
    $prod = mysqli_fetch_assoc($result);
    $total += $prod["price"] * $qte;
}


$user_id = $_SESSION["user_id"];
$sql = "INSERT INTO orders (user_id, total) VALUES ($user_id, $total)";
if (mysqli_query($conn, $sql)) {
    $order_id = mysqli_insert_id($conn);

   
    foreach ($_SESSION["panier"] as $id => $qte) {
        $result = mysqli_query($conn, "SELECT price FROM products WHERE id=$id");
        $prod = mysqli_fetch_assoc($result);
        $price = $prod["price"];
        mysqli_query($conn, "INSERT INTO order_items (order_id, product_id, quantity, price)
                             VALUES ($order_id, $id, $qte, $price)");
    }

   
    unset($_SESSION["panier"]);

    echo "<h2>✅ Commande validée avec succès !</h2>";
    echo "<p>Merci pour votre achat 🍬</p>";
    echo "<a href='index.php'>Retour à la boutique</a>";
} else {
    echo "Erreur lors de la validation : " . mysqli_error($conn);
}
?>
<link rel="stylesheet" href="style.css">
