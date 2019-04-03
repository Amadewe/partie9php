<?php include ('../header.php');
// cal_days_in_month — Retourne le nombre de jours dans un mois, pour une année et un calendrier donné attention en france nous utilisons le calendrier GREGORIAN
$day = cal_days_in_month(CAL_GREGORIAN, 2, 2016);
?>
<h2>Exercice 6</h2>
<p>Afficher le nombre de jour dans le mois de février de l'année 2016.</p>
<p>Nombre de jour dans le mois de février : <?= $day ?>;</p>
</body>
</html>