<?php
/* @var $this GameController */
/* @var $game Game */
?>

<h1>Enter Game Score</h1>

<?php $this->renderPartial('_scoreForm', array('game'=>$game)); ?>