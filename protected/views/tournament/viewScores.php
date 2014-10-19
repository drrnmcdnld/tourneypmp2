<?php
/* @var $this TournamentController */
/* @var $tournament Tournament */
?>
<h1>Scores: <?php echo $tournament->name; ?></h1>

<?php
    if (count($tournament->games) > 0) {
?>
<div class='list-group'>
<?php
        foreach($tournament->games as $game) {
?>
<div class='list-group-item clearfix'>
    <div class='col-sm-1'>
        <?php if ($game->game_played == 1) { ?>
            <?php echo $game->away_team_score; ?> - <?php echo $game->home_team_score; ?>
        <?php } ?>
    </div>
    <div class='col-sm-6'>
        <?php echo $game->awayTeam->name; ?> @ <?php echo $game->homeTeam->name; ?>
    </div>
    <div class='col-sm-2'>
        <?php echo date('M j, Y g:ia', strtotime($game->game_time)); ?>
    </div>
    <div class='col-sm-3'>
        <?php echo $game->field->name; ?>
    </div>
</div>
<?php
        }
?>
</div>
<?php
    }
?>