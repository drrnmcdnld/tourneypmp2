<?php
/* @var $this GameController */
/* @var $data Game */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('home_team_id')); ?>:</b>
	<?php echo CHtml::encode($data->home_team_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('away_team_id')); ?>:</b>
	<?php echo CHtml::encode($data->away_team_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('field_id')); ?>:</b>
	<?php echo CHtml::encode($data->field_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('home_team_score')); ?>:</b>
	<?php echo CHtml::encode($data->home_team_score); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('away_team_score')); ?>:</b>
	<?php echo CHtml::encode($data->away_team_score); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('game_played')); ?>:</b>
	<?php echo CHtml::encode($data->game_played); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('game_time')); ?>:</b>
	<?php echo CHtml::encode($data->game_time); ?>
	<br />

	*/ ?>

</div>