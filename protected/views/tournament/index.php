<?php
/* @var $this TournamentController */
/* @var $dataProvider CActiveDataProvider */
?>

<h1>Tournaments</h1>

<?php
    if (count($tournaments) > 0) {
        foreach($tournaments as $tourney) {            
?>
<?php echo TbHtml::linkButton($tourney->name, array('url'=>array('Tournament/view', 'id'=>$tourney->id)));  ?><br />
<?php
        }
    }
    else {
?>
<p>No tournaments found.</p>
<?php
    }
?>
<?php echo TbHtml::linkButton('Add Tournament', array('url'=>array('Tournament/create')));  ?>
