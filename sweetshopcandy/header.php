<?php
include "configuration.php";
?>
<link rel="stylesheet" href="style.css">

<header>
    <div class="header-container">
        <h2 class="logo">🍭 SweetShop</h2>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="panier.php">Panier</a>

            <?php if (isset($_SESSION["user_id"])): ?>
                <?php if ($_SESSION["is_admin"] == 1): ?>
                    <a href="admin.php">Admin</a>
                <?php endif; ?>
                <a href="logout.php">Déconnexion</a>
            <?php else: ?>
                <a href="login.php">Connexion</a>
                <a href="register.php">Créer un compte</a>
            <?php endif; ?>
        </nav>
    </div>
</header>
