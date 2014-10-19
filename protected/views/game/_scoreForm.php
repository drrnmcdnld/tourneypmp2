<?php
/* @var $this GameController */
/* @var $game Game */
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

	<?php echo $form->errorSummary($game); ?>
        
        <div class="row">
            <?php echo $form->labelEx($game, $game->awayTeam->name.":"); ?>
            <?php echo $form->textField($game,'away_team_score'); ?>
            <?php echo $form->error($game,'away_team_score'); ?>
	</div>

	<div class="row">
            <?php echo $form->labelEx($game, $game->homeTeam->name.":"); ?>
            <?php echo $form->textField($game,'home_team_score'); ?>
            <?php echo $form->error($game,'home_team_score'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Enter Score'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->