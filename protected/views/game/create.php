<?php
/* @var $this GameController */
/* @var $model Game */
?>

<h1>Create Game</h1>

<?php $this->renderPartial('_form', array('game'=>$game, 'tournament'=>$tournament, 'fields'=>$fields)); ?>