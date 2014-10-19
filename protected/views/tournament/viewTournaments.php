<?php
/* @var $this TournamentController */
/* @var $tournament Tournament */
?>
<h1>Active Tournaments</h1>

<?php
    if (count($tournaments) > 0) {
?>
<div class='list-group'>
<?php
        foreach($tournaments as $tournament) {
?>
    <a href="/Tournament/viewStandings/<?php echo $tournament->id; ?>/" class='list-group-item clearfix'><?php echo $tournament->name; ?></a>
<?php
        }
?>
</div>
<?php
    }
    else {
?>
<p>No Tournaments.</p>
<?php
    }
?>