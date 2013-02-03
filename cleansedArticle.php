<?php

echo $_SERVER['SERVER_NAME'];
echo "<BR>";
echo $_SERVER['REQUEST_URI'];
echo "<hr><br>";
$link = htmlspecialchars($_GET["link"]);
//echo 'You want to view: ' . $link .'<br>';

$html = file_get_contents($link);
echo htmlspecialchars($html);
echo $html;




$dom= new DOMDocument(); 
$dom->load($html); 
$dom->preserveWhiteSpace = false; 

$finder = new DomXPath($dom);
$classname="col sidebar-dbl";
//$nodes = $finder->query("//*[contains(@class, '$classname')]");
$nodes = $finder->query('//*[@class="col"]');
var_dump($nodes);

//echo $domTable = $dom->getElementById("col"); 

?>

