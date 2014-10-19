<?php
/* @var $this TeamController */
/* @var $model Team */
?>

<h1>Add Teams to <?php echo $tournament->name; ?></h1>

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'add-teams-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    ));
?>
<div class="row-fluid row-add-teams">
<?php
    for ($i = 0; $i < 10; $i++) {
        $counter = $i+1;
?>
<div class="col-lg-3">
<?php
        echo TbHtml::label('Team '.$counter.':', '');
        echo TbHtml::textField('new_teams[]', '', array('block'=>true));
?>
</div>
<?php
    }
?>
</div>
<?php
    echo TbHtml::submitButton('Add Teams', array('color'=>TbHtml::BUTTON_COLOR_SUCCESS));
?>

<?php $this->endWidget(); ?>

<?php //$this->renderPartial('_form', array('model'=>$model)); ?>