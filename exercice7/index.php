<?php include ('../header.php') ?>
<h2>Exercice 7</h2>
<p>Afficher la date du jour + 20 jours.</p>
<?php //strtotime — Transforme un texte anglais en timestamp ?>
<p>la date + 20 jours : <?= date('d/m/Y', strtotime('+20 day')); ?></p>
</body>
</html>