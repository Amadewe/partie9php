<?php
include ('../header.php');
$formErrors = array();
$monthListing = array(1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril', 5 => 'Mai', 6 => 'Juin', 7 => 'Juillet', 8 => 'Août', 9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre');
$yearListing = array(1 => 2019, 2 => 2020, 3 => 2021);
$dayListing = array(1 => 'lundi', 2 => 'mardi', 3 => 'mercredi', 4 => 'jeudi', 5 => 'vendredi', 6 => 'samedi', 7 => 'dimanche');

?>

<h2>tp</h2>
<p>Faire un formulaire avec deux listes déroulantes. La première sert à choisir le mois, et le deuxième permet d'avoir l'année.</p>
<p>En fonction des choix, afficher un calendrier comme celui ci :</p>
<?php
// si les imputs sont vide et qu'il n'y a pas d'erreur détectée alors on affiche le formulaire
if (count($_POST) == 0 || count($formErrors) > 0) {
    ?>
    <form method="POST" action="index.php">
        <div class="form-group">
            <label for="month">Mois</label>
            <select name="month" class="form-control" id="month" required>
                <option disabled selected>Veuillez choisir un mois</option>  
                <!-- choix déroulant pour le mois avec la boucle ça nous permet de récuperer tous les mois de notre tableau -->
                <?php foreach ($monthListing as $monthNumber => $month) { ?>
                    <option value="<?= $monthNumber ?>" <?= isset($_POST['month']) && $_POST['month'] == $month ? 'selected' : '' ?>> <?= $month ?></option>;
                <?php }
                ?>
            </select>
            <?php
            // si il y a une erreur on affiche un message d'erreur
            if (isset($formErrors['month'])) {
                ?>
                <div class="alert-danger">
                    <p><?= $formErrors['month'] ?></p>
                </div>
            <?php } ?>
        </div>

        <div class="form-group">   
            <label for="year">Années</label>
            <select name="year" class="form-control" id="year" required>
                <option disabled selected>Veuillez choisir une année</option>  
                <!-- choix déroulant pour les années avec la boucle ça nous permet de récuperer tous les années de notre tableau -->
                <?php foreach ($yearListing as $yearNumber => $year) { ?>
                    <option value="<?= $yearNumber ?>" <?= isset($_POST['year']) && $_POST['year'] == $year ? 'selected' : '' ?>> <?= $year ?></option>;
                <?php }
                ?>
            </select>
            <?php
            // si il y a une erreur on affiche un message d'erreur
            if (isset($formErrors['year'])) {
                ?>
                <div class="alert-danger">
                    <p><?= $formErrors['year'] ?></p>
                </div>
            <?php } ?>
        </div>

        <input type="submit" name="submit" value="Envoyer" class="btn btn-primary" />
    </form>
    <?php
//Si les imputs sont ok et qu'il n'y a pas d'erreur alors on affiche le message : 
} else {
    ?> 
    <div class="alert-success">
        <p>Calendrier : </p>
    </div>
    <div class="well jumbotron">
        <?php //AFFICHER LE MOIS ET L'ANNÉE AU LIEU DES VALEURS ?>
        <p><?= $_POST['month'] ?> <?= $_POST['year'] ?></p>
<?php $dateTest = cal_days_in_month(CAL_GREGORIAN, $_POST['month'], $_POST['year']); ?>
        
        <p>Nombre de jour dans le mois choisi et l'année : </p>
        <?php 
        
        for ($dayNumber = 1; $dayNumber <= $dateTest; $dayNumber++) {
                        ?>
                        <td><?= $dayNumber ?> </td>  
                    <?php } ?>

        
    <?php } ?>
</div>
</body>
</html>
