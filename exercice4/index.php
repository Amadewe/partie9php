<?php include ('../header.php') ?>
<h2>Exercice 4</h2>
<p>Afficher le timestamp du jour.</p>
<p>Afficher le timestamp du mardi 2 août 2016 à 15h00.</p>
<?php /* Pour obtenir le timestamp actuel, il faut utiliser la fonction time().
La fonction time() ne prend aucun argument et retourne la date courante en secondes depuis le 1er janvier 1970. */?>
<p>Aujourd'hui : <?= time();  ?></p>
<?php /* La fonction mktime retourne, pour une date donnée, le timestamp lui correspondant.
int mktime ( int hour, int minute, int second, int month, int day, int year) */?>
<p>timestamp du mardi 2 août 2016 à 15h : <?= mktime(15, 0, 0, 8, 2, 2016)?></p>
</body>
</html>