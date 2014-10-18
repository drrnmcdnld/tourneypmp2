<?php
/* @var $this TournamentController */
/* @var $dataProvider CActiveDataProvider */
?>

<h1>Tournaments</h1>

<?php
    if (count($tournaments) > 0) {
        foreach($tournaments as $tourney) {            
?>
<p><a href="/Tournament/view/id/<?php echo $tourney->id; ?>/"><?php echo $tourney->name; ?></a></p>
<?php
        }
    }
    else {
?>
<p>No tournaments found.</p>
<?php
    }
?>
<a href="/Tournament/create">Add Tournament</a>
