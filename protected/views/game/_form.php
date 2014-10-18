<?php
/* @var $this GameController */
/* @var $model Game */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'game-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'home_team_id'); ?>
		<?php echo $form->textField($model,'home_team_id'); ?>
		<?php echo $form->error($model,'home_team_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'away_team_id'); ?>
		<?php echo $form->textField($model,'away_team_id'); ?>
		<?php echo $form->error($model,'away_team_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'field_id'); ?>
		<?php echo $form->textField($model,'field_id'); ?>
		<?php echo $form->error($model,'field_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'home_team_score'); ?>
		<?php echo $form->textField($model,'home_team_score'); ?>
		<?php echo $form->error($model,'home_team_score'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'away_team_score'); ?>
		<?php echo $form->textField($model,'away_team_score'); ?>
		<?php echo $form->error($model,'away_team_score'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'game_played'); ?>
		<?php echo $form->textField($model,'game_played'); ?>
		<?php echo $form->error($model,'game_played'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'game_time'); ?>
		<?php echo $form->textField($model,'game_time'); ?>
		<?php echo $form->error($model,'game_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->