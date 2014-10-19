<?php
/* @var $this TournamentController */
/* @var $dataProvider CActiveDataProvider */
?>

    <div class="row-fluid">
        <div class="span12">
            <h1>My Tournaments</h1>
        </div>
    </div>

    <div class="row-fluid">
        <div class="col-lg-12"><?php echo TbHtml::linkButton('Add Tournament', array('url'=>array('Tournament/create'), 'color'=>TbHtml::BUTTON_COLOR_SUCCESS, 'class'=>'button-add-tourney'));  ?></div>
    </div>

<?php
    if (count($tournaments) > 0) {
?>
    <div class="list-group">
<?php
        foreach($tournaments as $tourney) {            
?>
        <a class="list-group-item" href="/Tournament/<?php echo $tourney->id; ?>/"><?php echo $tourney->name; ?></a>
<?php
        }
?>
    </div>
<?php
    }
    else {
?>
<p>No tournaments found.</p>
<?php
    }
?>
