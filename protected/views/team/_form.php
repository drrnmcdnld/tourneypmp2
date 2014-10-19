<?php
/* @var $this TeamController */
/* @var $team Team */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'team-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($team); ?>

	<div class="row"><div class="col-lg-6">
		<?php echo $form->labelEx($team,'name'); ?>
		<?php echo $form->textField($team,'name',array('size'=>60,'maxlength'=>255, 'block'=>true)); ?>
		<?php echo $form->error($team,'name'); ?>
            </div></div>

	<div class="row buttons">
		<?php echo TbHtml::submitButton($team->isNewRecord ? 'Create' : 'Save', array('color'=>TbHtml::BUTTON_COLOR_SUCCESS)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->