<?php

echo $_SERVER['SERVER_NAME'];
echo "<BR>";
echo $_SERVER['REQUEST_URI'];
echo "<hr><br>";
$link = htmlspecialchars($_GET["link"]);
echo 'You want to view: ' . $link .'<br>';

$html = file_get_contents($link);

echo "$html";

?>

