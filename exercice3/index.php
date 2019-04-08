<?php
include ('../header.php');
// version anglaise : 
$today = date('l d F Y');
//version française : 
/* setlocale — Modifie les informations de localisation */
setlocale(LC_TIME, 'fr_FR.UTF8');
/* strftime — Formate une date/heure locale avec la configuration locale */
$todayFr = strftime("%A %d %B %Y");
?>
<h2>Exercice 3</h2>
<p>Afficher la date courante avec le jour de la semaine et le mois en toutes lettres (ex : mardi 2 août 2016)</p>
<p>Bonus : Le faire en français.</p>
<p>Nous sommes le : <?= $today ?> (version en anglais)</p>
<p>Nous somme le : <?= $todayFr ?> (version en francais)</p>
</body>
</html>