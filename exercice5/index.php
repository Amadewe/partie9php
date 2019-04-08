<?php
include ('../header.php');
$dayMay = '16-05-2016';
$today = date('d-m-Y');
//strtotime — Transforme un texte anglais en timestamp
$differenceMe = ((strtotime($today)) - strtotime($dayMay));
//round — Arrondit un nombre à virgule flottante
$result = round($differenceMe / (60 * 60 * 24));

//CORRECTION
// Je convertis la date de string à timestamp ce qui permet d'obtenir le nombre de secondes écoulées du 01/01/1970 au 16/05/2016 
$dateBefore = strtotime('2016-05-16');
// j'obtiens le timestamp de la date actuelle auquel j'enlève $dateBefore.Je divise par 86400 qui est le nombre de secondes dans une journée et j'arrondi au nombre supérieur.
$difference = ceil((time() - $dateBefore) / 86400);

// J'instancie un nouvel objet dateTime avec en paramètre la date du 16 mai 2016
$firstDate = new DateTime('16-05-2016');
// J'instancie un nouvel objet dateTime qui aura par défaut la date du jour 
$secondDate = new DateTime();
// J'appelle la méthode diff qui renvoie un objet dateTime qui est la différence entre les deux dates. 
$interval = $firstDate->diff($secondDate);
?>
<h2>Exercice 5</h2>
<p>Afficher le nombre de jour qui sépare la date du jour avec le 16 mai 2016.</p>
<p>Nombre de jour qui sépare la date d'aujourd'hui avec le 16 mai 2016 : <?= $result ?> jours</p>

<!-- CORRECTION -->
<p>Correction</p>
<p><?= $difference; ?> jours</p>
<?php //On formate ma différence avec le %a pour obtenir le nombre de jours  ?>
<p><?= $interval->format('%a') ?> jours</p>
</body>
</html>