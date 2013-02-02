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
?>

<div id="week">Week: 
<a href="<?php echo $self ?>&week=17">17</a>
<a href="<?php echo $self ?>&week=16">16</a>
<a href="<?php echo $self ?>&week=15">15</a>
<a href="<?php echo $self ?>&week=14">14</a>
<a href="<?php echo $self ?>&week=13">13</a>
<a href="<?php echo $self ?>&week=12">12</a>
<a href="<?php echo $self ?>&week=11">11</a>
<a href="<?php echo $self ?>&week=10">10</a>
<a href="<?php echo $self ?>&week=9">9</a>
<a href="<?php echo $self ?>&week=8">8</a>
<a href="<?php echo $self ?>&week=7">7</a>
<a href="<?php echo $self ?>&week=6">6</a>
<a href="<?php echo $self ?>&week=5">5</a>
<a href="<?php echo $self ?>&week=4">4</a>
<a href="<?php echo $self ?>&week=3">3</a>
<a href="<?php echo $self ?>&week=2">2</a>
<a href="<?php echo $self ?>&week=1">1</a>
</div>

<?php
$week=@$_GET['week'];
if(empty($week)){$week=17;}

displayGames(getGames(@$_GET['nfl'], $week));
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
