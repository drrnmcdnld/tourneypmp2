<?php
/* @var $this SiteController */

$this->pageTitle="TourneyPimp, pimp my tournament!";
?>

<h2>Pimp my Tournament!</h2>

<?php if (Yii::app()->user->isGuest) { ?>
<p>Welcome to tourneypimp, your online stop for sports tournaments!  Please log in or create an account to add or manage a tournament, or select a tournament from the listing below.</p>
<?php } else { ?>
<p> Logged in!</p>
<?php } ?>
