<?php
/* @var $this TournamentController */
/* @var $tournament Tournament */
?>

<h1><?php echo $tournament->name; ?></h1>

<?php echo TbHtml::linkButton('Update Information', array('url'=>array('update', 'id'=>$tournament->id))); ?>

<h2>Teams</h2>


<?php
    if (count($tournament->teams) > 0) {
?>
<div class="list-group">
<?php
        foreach($tournament->teams as $team) {
?>
    <div class="list-group-item">
        <p>
            <?php echo $team->name; ?>&nbsp;&nbsp;
            <?php echo TbHtml::linkButton('Edit Team', array('url'=>array('Team/update', 'id'=>$team->id, 'tid'=>$tournament->id))); ?>&nbsp;&nbsp;
            <?php //echo TbHtml::linkButton('<i class="fa fa-times"></i>', array('url'=>'#', 'confirm'=>'Are you sure you want to delete this team?', 'linkOptions'=>array('submit'=>array('delete','id'=>$team->id)), 'color'=>TbHtml::BUTTON_COLOR_DANGER));//,' ?>
        </p>
    </div>
<?php
        }
?>
</div>
<?php
    }
    else {
?>
<p>You currently have no teams in your tournament.</p>
<?php
    }
?>
<?php echo TbHtml::linkButton('Add Teams', array('url'=>array('Team/create', 'tid'=>$tournament->id))); ?>

<h2>Games</h2>

<?php
    if (count($tournament->games) > 0) {
?>
<div class="list-group">
<?php
        foreach($tournament->games as $game) {
?>
    <div class="list-group-item">
        <p>
            <?php echo $game->awayTeam->name; ?> @ <?php echo $game->homeTeam->name; ?> - <?php echo date('F d, Y g:ia', strtotime($game->game_time)); ?>&nbsp;&nbsp;
            <?php echo TbHtml::linkButton('Edit Game', array('url'=>array('Game/update', 'id'=>$game->id, 'tid'=>$tournament->id))); ?>&nbsp;&nbsp;
            <?php //echo TbHtml::linkButton('<i class="fa fa-times"></i>', array('url'=>'#', 'confirm'=>'Are you sure you want to delete this game?', 'linkOptions'=>array('submit'=>array('delete','id'=>$game->id)), 'color'=>TbHtml::BUTTON_COLOR_DANGER));//,' ?>
        </p>
    </div>
<?php
        }
?>
</div>
<?php echo TbHtml::linkButton('Add Games', array('url'=>array('Game/create', 'tid'=>$tournament->id))); ?>
<?php
    }
    elseif (count($tournament->teams) < 2) {
?>
<p>Please enter at least 2 teams before adding any games.</p>
<?php
    }
    else {
?>
<p>You currently have no games in your tournament.</p>
<?php echo TbHtml::linkButton('Add Games', array('url'=>array('Game/create', 'tid'=>$tournament->id))); ?>
<?php
    }
?>