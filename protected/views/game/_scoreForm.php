<?php
/* @var $this GameController */
/* @var $game Game */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'game-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($game); ?>
        
        <div class="row">
            <div class='col-lg-3'>
            <?php echo $form->labelEx($game, $game->awayTeam->name.":"); ?>
            <?php echo $form->textField($game,'away_team_score', array('block'=>true)); ?>
            <?php echo $form->error($game,'away_team_score'); ?>
            </div></div>

	<div class="row">
            <div class='col-lg-3'>
            <?php echo $form->labelEx($game, $game->homeTeam->name.":"); ?>
            <?php echo $form->textField($game,'home_team_score', array('block'=>true)); ?>
            <?php echo $form->error($game,'home_team_score'); ?>
            </div>
	</div>

	<div class="row buttons">
            <div class='col-lg-3'>
		<?php echo TbHtml::submitButton('Enter Score', array('color'=>TbHtml::BUTTON_COLOR_SUCCESS)); ?>
            </div></div>

<?php $this->endWidget(); ?>

</div><!-- form -->