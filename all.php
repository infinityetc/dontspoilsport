<?php
include_once('include/header.php');
include('include/lib.php');
?>

<div class="scores">

<div class="spoil">
</div><!-- .spoil -->

<div class="unspoil">
<?php
$self = preg_replace('#&week=[^&]+#','',$_SERVER['REQUEST_URI']);
$self = preg_replace('#&season=[^&]+#','',$self);
?>

<div id="week">Regular Season - Week: 
<a href="<?php echo $self ?>&season=REG&week=17">17</a>
<a href="<?php echo $self ?>&season=REG&week=16">16</a>
<a href="<?php echo $self ?>&season=REG&week=15">15</a>
<a href="<?php echo $self ?>&season=REG&week=14">14</a>
<a href="<?php echo $self ?>&season=REG&week=13">13</a>
<a href="<?php echo $self ?>&season=REG&week=12">12</a>
<a href="<?php echo $self ?>&season=REG&week=11">11</a>
<a href="<?php echo $self ?>&season=REG&week=10">10</a>
<a href="<?php echo $self ?>&season=REG&week=9">9</a>
<a href="<?php echo $self ?>&season=REG&week=8">8</a>
<a href="<?php echo $self ?>&season=REG&week=7">7</a>
<a href="<?php echo $self ?>&season=REG&week=6">6</a>
<a href="<?php echo $self ?>&season=REG&week=5">5</a>
<a href="<?php echo $self ?>&season=REG&week=4">4</a>
<a href="<?php echo $self ?>&season=REG&week=3">3</a>
<a href="<?php echo $self ?>&season=REG&week=2">2</a>
<a href="<?php echo $self ?>&season=REG&week=1">1</a>
<br />
Post Season - Week: 
<a href="<?php echo $self ?>&season=PST&&week=3">3</a>
<a href="<?php echo $self ?>&season=PST&&week=2">2</a>
<a href="<?php echo $self ?>&season=PST&&week=1">1</a>
</div>

<?php
$week=@$_GET['week'];
if(empty($week)){$week=3;}
$season=@$_GET['season'];
if(empty($_GET['season'])){$season='PST';}
?>

<h3>Week <?php echo $week; ?></h3>
<div id="scores">

<?php
displayGames(getGames(@$_GET['nfl'], $week, $season));
?>

</div><!-- .unspoil -->

</div><!-- .scores -->


<div class="news">

</div><!-- .news -->


<div class="data">

</div><!-- .data -->

<?php
include_once('include/footer.php');
?>
