<?php
/* @var $this TournamentController */
/* @var $tournament Tournament */
?>

<h1>Standings: <?php echo $tournament->name; ?></h1>

<?php
    foreach($tournament->getStandings() as $team) {
?>

<?php
    }
?>