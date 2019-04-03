<?php include ('../header.php') ?>
<h2>Exercice 8</h2>
<p>Afficher la date du jour -22 jours.</p>
<?php //strtotime — Transforme un texte anglais en timestamp ?>
<p>la date - 22 jours : <?= date('d/m/Y', strtotime('-22 day')); ?></p>
</body>
</html>