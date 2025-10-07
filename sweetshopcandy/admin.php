<?php
include "configuration.php";


if (!isset($_SESSION["user_id"]) || $_SESSION["is_admin"] != 1) {
    echo "⛔ Accès refusé. Vous devez être administrateur.";
    exit;
}

echo "<h1>🧠 Espace Administration - SweetShop</h1>";
echo "<a href='index.php'>Retour à la boutique</a> | <a href='logout.php'>Se déconnecter</a><hr>";


echo "<h2>👥 Liste des utilisateurs</h2>";
$result = mysqli_query($conn, "SELECT id, name, email, is_admin FROM users");
echo "<table border='1' cellpadding='6'><tr><th>ID</th><th>Nom</th><th>Email</th><th>Admin ?</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['is_admin']."</td></tr>";
}
echo "</table><hr>";


echo "<h2>🍬 Liste des produits</h2>";
$result = mysqli_query($conn, "SELECT * FROM products");
echo "<table border='1' cellpadding='6'><tr><th>ID</th><th>Nom</th><th>Prix (€)</th><th>Action</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['name']."</td>
            <td>".$row['price']."</td>
            <td>
                <a href='edit_product.php?id=".$row['id']."'>Modifier</a> |
                <a href='delete_product.php?id=".$row['id']."'>Supprimer</a>
            </td>
          </tr>";
}
echo "</table>";
echo "<p><a href='add_product.php'>➕ Ajouter un produit</a></p><hr>";


echo "<h2>🧾 Liste des commandes</h2>";
$sql = "SELECT o.id, o.date_order, o.total, u.name AS user_name
        FROM orders o
        JOIN users u ON o.user_id = u.id
        ORDER BY o.date_order DESC";
$result = mysqli_query($conn, $sql);

echo "<table border='1' cellpadding='6'><tr><th>ID</th><th>Client</th><th>Date</th><th>Total (€)</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['user_name']."</td>
            <td>".$row['date_order']."</td>
            <td>".$row['total']."</td>
          </tr>";
}
echo "</table>";
?>
