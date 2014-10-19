<?php
/* @var $this TournamentController */
/* @var $tournament Tournament */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tournament-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($tournament); ?>

	<div class="row">
		<?php echo $form->labelEx($tournament,'name'); ?>
		<?php echo $form->textField($tournament,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($tournament,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($tournament,'start_date'); ?>
		<?php echo $form->textField($tournament,'start_date'); ?>
		<?php echo $form->error($tournament,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($tournament,'end_date'); ?>
		<?php echo $form->textField($tournament,'end_date'); ?>
		<?php echo $form->error($tournament,'end_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($tournament->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->