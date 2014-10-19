<?php
/* @var $this TournamentController */
/* @var $tournament Tournament */
?>

<div class="btn-group league-display-buttons">
    <?php echo TbHtml::linkButton('Scores', array('url'=>array('viewScores', 'id'=>$tournament->id), 'class'=>'btn-default')); ?>
    <button class="btn btn-default btn-current" type="button">Standings</button>
</div>

<h1>Standings: <?php echo $tournament->name; ?></h1>

<?php
    $standings = $tournament->getStandings($tournament->id);
    if (count($standings) > 0) {
?>
<div class="list-group">
    <div class="list-group-item clearfix">
        <div class="col-md-9">
            <strong>Team</strong>
        </div>
        <div class="col-md-1">
            <strong>Wins</strong>
        </div>
        <div class="col-md-1">
            <strong>Losses</strong>
        </div>
        <div class="col-md-1">
            <strong>Ties</strong>
        </div>
    </div>
<?php
        foreach($standings as $team) {
?>
    <div class="list-group-item clearfix">
        <div class="col-md-9">
            <?php echo $team->name; ?>
        </div>
        <div class="col-md-1">
            <?php echo $team->getWins(); ?>
        </div>
        <div class="col-md-1">
            <?php echo $team->getLosses(); ?>
        </div>
        <div class="col-md-1">
            <?php echo $team->getTies(); ?>
        </div>
    </div>
<?php
        }
?>
</div>
<?php
    }
?>