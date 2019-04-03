<?php include ('../header.php');
//1er version dite "simple"
$todaySimple = date('d/m/Y');
// Méthode objet : pour obtenir la date du jour: (l'objet à des attributs et des méthodes)
$today = new DateTime()
?>
<h2>Exercice 1</h2>
<p>Afficher la date courante en respectant la forme jj/mm/aaaa (ex : 16/05/2016)</p>
<p>Nous sommes le : <?= $todaySimple ?></p>
<p>Méthode objet : <?= $today->format('d/m/Y')?></p>
    </body>
</html>