<?php
include_once('include/header.php');
include('include/lib.php');
include('include/lib2.php');
?>

<div class="scores">

<div class="spoil">
</div><!-- .spoil -->

<div class="unspoil">
<?php
$self = preg_replace('#&week=[^&]+#','',$_SERVER['REQUEST_URI']);
$self = preg_replace('#&season=[^&]+#','',$self);
if(stripos($self,'?') === false){
   $self .= '?';
}
?>

<?php
$week=@$_GET['week'];
if(empty($week)){$week=3;}
$season=@$_GET['season'];
if(empty($_GET['season'])){$season='PST';}

?>

<a id="change" href="javascript:void(0);">Change Week</a>

<div id="week">
Regular Season - Week: <br>
<?php
$i = 17;
while ($i > 0) {
	echo '<a href="' . $self . '&season=REG&week=' . $i .'"';
	if ($i == $week && $season == 'REG') {
		echo ' class="selected">' . $i . '</a>';
	} else {
		echo '>' . $i . '</a>';
	};
	$i--;
};
?>

<br>
Post Season - Week:<br> 
<?php
$i = 3;
while ($i > 0) {
	echo '<a href="' . $self . '&season=PST&week=' . $i .'"';
	if ($i == $week && $season == 'PST') {
		echo ' class="selected">' . $i . '</a>';
	} else {
		echo '>' . $i . '</a>';
	};
	$i--;
};
?>
</div>

<?php
if ($season == 'REG') {
	echo '<h2>Regular Season - Week ' . $week . '</h2>';
} else {
	echo '<h2>Post Season - Week ' . $week . '</h2>';
};
?>	

<?php
displayGames(getGames(@$_GET['nfl'], $week, $season));
?>

</div><!-- .scores -->

</div><!-- .unspoil -->



<div class="news">

<?php
displayNews(@$_GET['nfl']);
?>

</div><!-- .news -->


<div class="data">

</div><!-- .data -->

<?php
include_once('include/footer.php');
?>
