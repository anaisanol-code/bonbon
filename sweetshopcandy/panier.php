<?php
include "configuration.php";


if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}


if (isset($_GET['action']) && $_GET['action'] == 'add') {
    $id = intval($_GET['id']);

    // Vérifier si le produit existe
    $check = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
    if (mysqli_num_rows($check) > 0) {
        if (isset($_SESSION['panier'][$id])) {
            $_SESSION['panier'][$id]++; 
        } else {
            $_SESSION['panier'][$id] = 1; 
        }
    }
    header("Location: panier.php");
    exit;
}
if (isset($_GET['action']) && $_GET['action'] == 'remove') {
    $id = intval($_GET['id']);
    unset($_SESSION['panier'][$id]);
    header("Location: panier.php");
    exit;
}

echo "<h1>🛒 Votre panier</h1>";


if (empty($_SESSION['panier'])) {
    echo "<p>Votre panier est vide.</p>";
    echo "<a href='index.php'>← Retour à la boutique</a>";
} else {
    $total = 0;
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>Produit</th><th>Quantité</th><th>Prix unitaire</th><th>Total</th><th>Action</th></tr>";

    foreach ($_SESSION['panier'] as $id => $quantite) {
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $prod = mysqli_fetch_assoc($result);

        $prix = $prod['price'];
        $total_article = $prix * $quantite;
        $total += $total_article;

        echo "<tr>";
        echo "<td>" . htmlspecialchars($prod['name']) . "</td>";
        echo "<td>" . $quantite . "</td>";
        echo "<td>" . number_format($prix, 2) . " €</td>";
        echo "<td>" . number_format($total_article, 2) . " €</td>";
        echo "<td><a href='panier.php?action=remove&id=$id'>Supprimer</a></td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<h3>Total : " . number_format($total, 2) . " €</h3>";
    echo "<a href='index.php'>← Continuer mes achats</a> | ";
    echo "<a href='valider.php'>Valider ma commande</a>";
}
?>
<link rel="stylesheet" href="style.css">
