<?php
/* @var $this GameController */
/* @var $game Game */

$this->breadcrumbs=array(
	'Games'=>array('index'),
	$game->id=>array('view','id'=>$game->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Game', 'url'=>array('index')),
	array('label'=>'Create Game', 'url'=>array('create')),
	array('label'=>'View Game', 'url'=>array('view', 'id'=>$game->id)),
	array('label'=>'Manage Game', 'url'=>array('admin')),
);
?>

<h1>Update Game <?php echo $game->id; ?></h1>

<?php $this->renderPartial('_form', array('game'=>$game)); ?>