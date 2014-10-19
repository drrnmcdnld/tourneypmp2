<?php
/* @var $this TournamentController */
/* @var $model Tournament */
?>

<h1>Update <?php echo $tournament->name; ?></h1>

<?php $this->renderPartial('_form', array('tournament'=>$tournament)); ?>