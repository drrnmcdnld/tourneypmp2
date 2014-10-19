<?php
/* @var $this GameController */
/* @var $game Game */
?>

<h1>Update Game <?php echo $game->id; ?></h1>

<?php $this->renderPartial('_form', array('game'=>$game, 'tournament'=>$tournament, 'fields'=>$fields)); ?>