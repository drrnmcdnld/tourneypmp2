<?php
/* @var $this TeamController */
/* @var $model Team */
?>

<h1>Update Team: <?php echo $team->name; ?></h1>

<?php $this->renderPartial('_form', array('team'=>$team)); ?>