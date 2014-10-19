<?php
/* @var $this TournamentController */
/* @var $tournament Tournament */
?>

<div class="row-fluid">
    <h1><?php echo $tournament->name; ?></h1>
</div>

<div class="row-fluid">
    <?php echo TbHtml::linkButton('Update Information', array('url'=>array('update', 'id'=>$tournament->id), 'color'=>TbHtml::BUTTON_COLOR_PRIMARY)); ?>
</div>

<div class="row-fluid">
<div class="col-lg-4">
<h2>Teams</h2>

<?php echo TbHtml::linkButton('Add Teams', array('url'=>array('Team/create', 'tid'=>$tournament->id), 'color'=>TbHtml::BUTTON_COLOR_SUCCESS, 'class'=>'button-add-tourney')); ?>

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
            <?php echo TbHtml::linkButton('<i class="fa fa-edit"></i>', array('url'=>array('Team/update', 'id'=>$team->id, 'tid'=>$tournament->id), 'color'=>TbHtml::BUTTON_COLOR_PRIMARY)); ?>&nbsp;&nbsp;
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
</div>
<div class="col-lg-8">
<h2>Games</h2>

<?php
    if (count($tournament->games) > 0) {
?>
<?php echo TbHtml::linkButton('Add Games', array('url'=>array('Game/create', 'tid'=>$tournament->id), 'color'=>TbHtml::BUTTON_COLOR_SUCCESS, 'class'=>'button-add-tourney')); ?>
<div class="list-group">
<?php
        foreach($tournament->games as $game) {
?>
    <div class="list-group-item">
        <p>
            <?php echo $game->awayTeam->name; ?><?php if ($game->game_played == 1) { ?> (<?php echo $game->away_team_score; ?>)<?php } ?> @ <?php if ($game->game_played == 1) { ?>(<?php echo $game->home_team_score; ?>) <?php } ?><?php echo $game->homeTeam->name; ?> - <?php echo date('F j, Y g:ia', strtotime($game->game_time)); ?>&nbsp;&nbsp;
            <?php echo TbHtml::linkButton('<i class="fa fa-edit"></i>', array('url'=>array('Game/update', 'id'=>$game->id, 'tid'=>$tournament->id), 'color'=>TbHtml::BUTTON_COLOR_PRIMARY)); ?>&nbsp;&nbsp;
            <?php echo TbHtml::linkButton('Enter Final Score', array('url'=>array('Game/enterScore', 'id'=>$game->id, 'tid'=>$tournament->id), 'color'=>TbHtml::BUTTON_COLOR_PRIMARY)); ?>&nbsp;&nbsp;
            <?php //echo TbHtml::linkButton('<i class="fa fa-times"></i>', array('url'=>'#', 'confirm'=>'Are you sure you want to delete this game?', 'linkOptions'=>array('submit'=>array('delete','id'=>$game->id)), 'color'=>TbHtml::BUTTON_COLOR_DANGER));//,' ?>
        </p>
    </div>
<?php
        }
?>
</div>
<?php
    }
    elseif (count($tournament->teams) < 2) {
?>
<p>Please enter at least 2 teams before adding any games.</p>
<?php
    }
    else {
?>
<?php echo TbHtml::linkButton('Add Games', array('url'=>array('Game/create', 'tid'=>$tournament->id), 'color'=>TbHtml::BUTTON_COLOR_SUCCESS, 'class'=>'button-add-tourney')); ?>
<p>You currently have no games in your tournament.</p>
<?php
    }
?>
</div>
</div>