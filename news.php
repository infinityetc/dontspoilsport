<?php

include('include/header.php');
include('include/lib2.php');

echo '<h3>News</h3>';
echo '<div id="news">';
displayNews(@$_GET['nfl']);
echo '</div><br />';
include('include/footer.php');

?>

