<?php include "header.php"; ?>
<?php include "configuration.php"; ?>

<h1>🍭 Bienvenue sur SweetShop 🍭</h1>


<div class="slider">
  <div class="slides">
     <img src="images/image_slide1.webp" class="slide active">
     <img src="images/image_slide2.jpg" class="slide">
     <img src="images/image_slide3.webp" class="slide">
  </div>
</div>

<?php

if (isset($_SESSION["user_name"])) {
     echo "<p>Bonjour, <strong>" . $_SESSION["user_name"] . "</strong> !</p>";
     echo "<a href='logout.php'>Se déconnecter</a><br><br>";
} else {
     echo "<a href='login.php'>Se connecter</a> | <a href='register.php'>Créer un compte</a><br><br>";
} 


$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<div style='display:flex; flex-wrap:wrap; gap:20px; justify-content:center;'>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div style='border:1px solid #ccc; padding:10px; width:200px; text-align:center; border-radius:10px;'>";
        echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
        echo "<p>" . htmlspecialchars($row['description']) . "</p>";
        echo "<p><strong>" . number_format($row['price'], 2) . " €</strong></p>";
        echo "<a href='panier.php?action=add&id=" . $row['id'] . "'><button>Ajouter au panier</button></a>";
        echo "</div>";
    }

    echo "</div>";
} else {
    echo "<p>Aucun bonbon disponible pour le moment 🍬</p>";
}
?>


<script>
let slides = document.querySelectorAll('.slide');
let index = 0;

function showNextSlide() {
  slides[index].classList.remove('active');
  index = (index + 1) % slides.length;
  slides[index].classList.add('active');
}

setInterval(showNextSlide, 3000); // Change toutes les 3 secondes
</script>

