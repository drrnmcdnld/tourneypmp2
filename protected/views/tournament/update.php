<?php
/* @var $this TournamentController */
/* @var $model Tournament */

$this->breadcrumbs=array(
	'Tournaments'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tournament', 'url'=>array('index')),
	array('label'=>'Create Tournament', 'url'=>array('create')),
	array('label'=>'View Tournament', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tournament', 'url'=>array('admin')),
);
?>

<h1>Update Tournament <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>