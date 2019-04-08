<?php
include ('../header.php');
//Numéro du mois sélectionné. Exemple : si janvier => 1
$monthSelected = (isset($_POST['month']) ? $_POST['month'] : date('m', time()));
//Année sélectionnée sur 4 chiffres. Exemple : si 2019 => 2019
$yearSelected = (isset($_POST['year']) ? $_POST['year'] : date('Y', time()));
//Nombre de jour dans le mois. Exemple : si janvier => 31
$numberOfDaysInMonth = cal_days_in_month(CAL_GREGORIAN,$monthSelected,$yearSelected);
/*
* Le premier jour de la semaine du mois en numérique (Lundi = 1, Mardi = 2, Mercredi =3, ...).
* Exemple : janvier 2019 commence un mardi, $numberedFirstWeekDayOfMonth = 2 car mardi est le deuxième jour de la semaine
*/
$numberedFirstWeekDayOfMonth = date('N',mktime(0,0,0,$monthSelected,1,$yearSelected));
/*
* Le dernier jour de la semaine du mois en numérique (Lundi = 1, Mardi = 2, Mercredi =3, ...).
* Exemple : janvier 2019 finit un jeudi, $numberedLastWeekDayOfMonth = 4 car jeudi est le quatrième jour de la semaine
*/
$numberedLastWeekDayOfMonth = date('N', mktime(0,0,0,$monthSelected,$numberOfDaysInMonth,$yearSelected));
/*
* Nombre total de cases à afficher dans le calendrier. Exemple : pour janvier 2019 => 35
* On calcule ce nombre comme suit :
* Le nombre total de jour dans le mois + le nombre de case à passer avant le mois (premier jour de la semaine - 1) + 7 - dernier jour de la semaine
* Exemple : janvier 2019 => a 31 jours, commence un mardi (deuxième jour de la semaine) => 2 - 1 parce que le mardi est déja compté avec le nombre total de jour + 7 (nombre de jours dans la semaine) - numero du dernier jour de la semaine => 4 car finit un Jeudi
* 31 + (2 - 1) + (7 - 4) => 31 + 1 + 3 => 35
*/
$numberOfTds = $numberOfDaysInMonth + ($numberedFirstWeekDayOfMonth - 1) + (7 - $numberedLastWeekDayOfMonth);

//Variable à incrémenter pour permettre l'affichage des jours de janvier
$numberOfTheDay = 1;

//Je crée un tableau pour afficher les jours de la semaine
$daysOfWeek = array(
  'Lundi',
  'Mardi',
  'Mercredi',
  'Jeudi',
  'Vendredi',
  'Samedi',
  'Dimanche'
);

//On crée un tableau pour afficher les mois dans la liste déroulante
$months = array(
  1 => 'Janvier',
  2 => 'Février',
  3 => 'Mars',
  4 => 'Avril',
  5 => 'Mai',
  6 => 'Juin',
  7 => 'Juillet',
  8 => 'Août',
  9 => 'Septembre',
  10 => 'Octobre',
  11 => 'Novembre',
  12 => 'Décembre'
);
?>
  <div class="container">
    <form class="form" action="index.php" method="POST">
      <div class="form-group">
        <label for="month">Mois</label>
        <select name="month" id="month">
          <?php
          //J'affiche les mois grâce à une boucle foreach
          foreach($months as $monthNumber=>$month) {
            //Je donne en value à mon option le mois en chiffres car toutes les fonctions de php prennent en paramètre des chiffres
            ?>
            <option value="<?= $monthNumber ?>" <?= $monthSelected == $monthNumber ? 'selected' : '' ?>><?= $month ?></option>
            <?php } ?>
          </select>
          <label for="year">Année</label>
          <select name="year" id="year">
            <?php
            //J'utilise une boucle for pour créer mes options et afficher mes années
            for($year = 2019; $year >= 1950; $year--){
              ?>
              <option value="<?= $year ?>" <?= $yearSelected == $year ? 'selected' : '' ?>><?= $year ?></option>
            <?php } ?>
          </select>
          <input type="submit" value="Afficher" class="btn btn-success" />
        </div>
      </form>
      <table class="table table-bordered text-center">
        <thead>
          <tr class="table-success">
            <?php foreach ($daysOfWeek as $day) { ?>
              <th scope="col"><?= $day ?></th>
            <?php } ?>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            //On a défini plus haut que le nombre de cases était de 35 (jours du mois + cases vides)
            for ($td = 1; $td <= $numberOfTds; $td++) {
              /*
              * Janvier commence un mardi, le 2ème jour de la semaine $numberedFirstWeekDayOfMonth est donc égal à 2
              * Les 7 premières $td seront affichées sous les jours de la semaine
              * Exemple : si $td = 1 -> la boucle créera une case sous lundi, si $td = 2 -> la boucle créera une case sous mardi
              * On va donc vérifier le contenu de $td : s'il est plus grand ou égal à 2 on affiche le numéro des jours
              * => A partir de la deuxième case, on commence à afficher les jours de janvier
              * => Cela permet de passer le lundi, qui n'est pas en janvier
              * On vérifie également que la variable permettant d'afficher les jours est inférieure ou égale au nombre de jour dans le mois
              * Dès qu'on a affiché le 31 ème jour (pour janvier), on ne veut plus afficher de jour le mois est terminé
              */
              if($td >= $numberedFirstWeekDayOfMonth && $numberOfTheDay <= $numberOfDaysInMonth){
                /*
                * Si $td est divisible par 7, cela veut dire que je suis en train de créer la case pour le dimanche
                * Si $td + 1 est divisible par 7, cela veut dire que je vais créer le dimanche et que je suis en train de créer le samedi
                * On écrit une classe pour changer la couleur de la case du samedi et du dimanche
                * On crée une case et on y écrit le numéro du jour
                */
                ?>
                <td <?= $td % 7 == 0 || ($td + 1) % 7 == 0 ? 'class="table-secondary"' : '' ?>><?= $numberOfTheDay ?></td>
                <?php
                //On incrémente le numéro du jour pour ne pas rester à 1
                $numberOfTheDay++;
              } else {
                //Si la condition n'est pas remplie (que le numéro de la case est inférieur à 2 ou que le nombre de jour à atteint 32), on affiche une case d'une couleur différente pour signaler qu'elle ne fait pas partie du mois
                ?>
                <td class="table-warning"></td>
                <?php
              }
              /*
              * Si le numéro de ma case $td est divisible par 7, cela veut dire que je viens de créer mon dimanche grâce aux td plus haut
              * Je dois donc fermer ma ligne et en ouvrir une nouvelle qui sera fermée la prochaine fois que j'aurais créé 7 cases ou après la boucle
              */
              if($td % 7 == 0){
                ?>
                <tr></tr>
                <?php
              }
             }
             ?>
          </tr>
        </tbody>
      </table>
    </div>
</body>
</html>
