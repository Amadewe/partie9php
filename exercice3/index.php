<?php include ('../header.php');
$today = date('F j  Y');
?>
<h2>Exercice 3</h2>
<p>Afficher la date courante avec le jour de la semaine et le mois en toutes lettres (ex : mardi 2 août 2016)</p>
<p>Bonus : Le faire en français.</p>
<p>Nous sommes le : <?= $today ?> (version en anglais)</p>
<p>Nous somme le : <?php
/* setlocale — Modifie les informations de localisation */
setlocale(LC_TIME, 'fr_FR.utf8','fra');
/*strftime — Formate une date/heure locale avec la configuration locale */
echo strftime("%A %e %B %Y"); ?> (version en francais)</p>
    </body>
</html>