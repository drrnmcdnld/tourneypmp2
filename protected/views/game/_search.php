<?php
/* @var $this GameController */
/* @var $model Game */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'home_team_id'); ?>
		<?php echo $form->textField($model,'home_team_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'away_team_id'); ?>
		<?php echo $form->textField($model,'away_team_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'field_id'); ?>
		<?php echo $form->textField($model,'field_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'home_team_score'); ?>
		<?php echo $form->textField($model,'home_team_score'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'away_team_score'); ?>
		<?php echo $form->textField($model,'away_team_score'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'game_played'); ?>
		<?php echo $form->textField($model,'game_played'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'game_time'); ?>
		<?php echo $form->textField($model,'game_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->