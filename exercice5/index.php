<?php include ('../header.php');
$dayMay = '16-05-2016';
$today = date('d-m-Y');
//strtotime — Transforme un texte anglais en timestamp
$difference = ((strtotime($today)) - strtotime($dayMay));
//round — Arrondit un nombre à virgule flottante
$result = round($difference / (60*60*24));
?>
<h2>Exercice 5</h2>
<p>Afficher le nombre de jour qui sépare la date du jour avec le 16 mai 2016.</p>
<p>Nombre de jour qui sépare la date d'aujourd'hui avec le 16 mai 2016 : <?= $result ?> jours</p>
</body>
</html>