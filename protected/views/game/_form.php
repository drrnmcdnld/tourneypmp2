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

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($game); ?>
        
        <div class="row">
		<?php echo $form->labelEx($game,'game_time'); ?>
                <?php $this->widget(
                    'yiiwheels.widgets.datetimepicker.WhDateTimePicker',
                    array(
                        'name' => 'Game[game_time]',
                        'pluginOptions' => array(
                           'format' => 'yyyy-MM-dd hh:mm:ss'
                           )
                    )
                    );
                ?>
		<?php //echo $form->textField($game,'game_time'); ?>
		<?php echo $form->error($game,'game_time'); ?>
	</div>

	<div class="row">
            <?php echo $form->labelEx($game,'home_team_id'); ?>
            <select name="Game[home_team_id]">
                <?php foreach($tournament->teams as $team) { ?>
                <option value="<?php echo $team->id; ?>"><?php echo $team->name; ?></option>
                <?php } ?>
            </select>
            <?php echo $form->error($game,'home_team_id'); ?>
	</div>

	<div class="row">
            <?php echo $form->labelEx($game,'away_team_id'); ?>
            <select name="Game[away_team_id]">
                <?php foreach($tournament->teams as $team) { ?>
                <option value="<?php echo $team->id; ?>"><?php echo $team->name; ?></option>
                <?php } ?>
            </select>
            <?php echo $form->error($game,'away_team_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($game,'field_id'); ?>
		<select name="Game[field_id]">
                <?php foreach($fields as $field) { ?>
                <option value="<?php echo $field->id; ?>"><?php echo $field->name; ?></option>
                <?php } ?>
            </select>
		<?php echo $form->error($game,'field_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($game->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->