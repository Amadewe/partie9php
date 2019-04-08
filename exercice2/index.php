<?php
include ('../header.php');
// avec la fonction date 
$todaySimple = date('d-m-y');
// on instencie un nouvel objet dateTime
$today = new DateTime()
?>
<h2>Exercice 2</h2>
<p>Afficher la date courante en respectant la forme jj-mm-aa (ex : 16-05-16)</p>
<p>Nous sommes le : <?= $todaySimple ?></p>
<?php // on appel la méthode format et on affiche son retour  ?>
<p>Méthode objet : <?= $today->format('d-m-y') ?></p>
</body>
</html>