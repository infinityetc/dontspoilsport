<?php
include_once('include/header.php');
include('include/lib.php');
include('include/lib2.php');
include('include/lib3.php');
?>

<div class="scores">

<div class="spoil">

<?php

if(!empty($_GET['nfl'])){
    foreach($_GET['nfl'] as $nfl){
     echo '<a class="unfilter" href="'.str_replace('all.php&','all.php?',preg_replace('#[&?]nfl[^=]+='.$nfl.'#','',$_SERVER['REQUEST_URI'])).'">&#216; Show '.$nfl.'</a> ';
    }
}
?>

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

<h2 class="nomargin">ESPN Top Headlines</h2>

<?php
displayNews(@$_GET['nfl']);
?>

<h2>Other News</h2>

<ul class="tabs">
	<li><a href="javascript:void(0);" class="selected" onclick="$('.tabs').children().children().removeClass('selected');$(this).addClass('selected');$('.other').hide();$('#previews').show();$(this).addClass('selected');">Previews</a></li>
	<li><a href="javascript:void(0);" onclick="$('.tabs').children().children().removeClass('selected');$(this).addClass('selected');$('.other').hide();$('#recaps').show();">Recaps</a></li>
	<li><a href="javascript:void(0);" onclick="$('.tabs').children().children().removeClass('selected');$(this).addClass('selected');$('.other').hide();$('#news').show();">News</a></li>
	<li><a href="javascript:void(0);" onclick="$('.tabs').children().children().removeClass('selected');$(this).addClass('selected');$('.other').hide();$('#bullets').show();">Bullets</a></li>
	<li><a href="javascript:void(0);" onclick="$('.tabs').children().children().removeClass('selected');$(this).addClass('selected');$('.other').hide();$('#notes').show();">Notes</a></li>
	<li><a href="javascript:void(0);" onclick="$('.tabs').children().children().removeClass('selected');$(this).addClass('selected');$('.other').hide();$('#rumors').show();">Rumors</a></li>
	<li><a href="javascript:void(0);" onclick="$('.tabs').children().children().removeClass('selected');$(this).addClass('selected');$('.other').hide();$('#injury').show();">Injury</a></li>
	<li><a href="javascript:void(0);" onclick="$('.tabs').children().children().removeClass('selected');$(this).addClass('selected');$('.other').hide();$('#transactions').show();">Transactions</a></li>
</ul>

<?php
echo '<div class="other" id="previews">';
displayContent(getNamesToIgnore(@$_GET['nfl']), 'previews');
echo '</div>';
echo '<div class="other" id="recaps">';
displayContent(getNamesToIgnore(@$_GET['nfl']), 'recaps');
echo '</div>';
echo '<div class="other" id="news">';
displayContent(getNamesToIgnore(@$_GET['nfl']), 'news');
echo '</div>';
echo '<div class="other" id="bullets">';
displayContent(getNamesToIgnore(@$_GET['nfl']), 'bullets');
echo '</div>';
echo '<div class="other" id="notes">';
displayContent(getNamesToIgnore(@$_GET['nfl']), 'notes');
echo '</div>';
echo '<div class="other" id="rumors">';
displayContent(getNamesToIgnore(@$_GET['nfl']), 'rumors');
echo '</div>';
echo '<div class="other" id="injury">';
displayContent(getNamesToIgnore(@$_GET['nfl']), 'injury');
echo '</div>';
echo '<div class="other" id="transactions">';
displayContent(getNamesToIgnore(@$_GET['nfl']), 'transactions');
echo '</div>';
?>

</div><!-- .news -->


<div class="data">

</div><!-- .data -->

<?php
include_once('include/footer.php');
?>
