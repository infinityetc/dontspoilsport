<?php

echo $_SERVER['SERVER_NAME'];
echo "<BR>";
echo $_SERVER['REQUEST_URI'];

$url = "http://api.espn.com/v1/now?apikey=bgusssdyxp7kkha7wfqrvzd5";
//$url =  "http://api.espn.com/v1/sports/basketball/nba/news?apikey=bgusssdyxp7kkha7wfqrvzd5";
$json = file_get_contents($url); 
$data = json_decode($json, TRUE);
// var_dump($data);
$a = $data["feed"];
echo "<hr>Here is a list of headlines<br>";
foreach($a as $f){
    $head = $f["headline"];
    if( $f["type"] == "BlogEntry" ){
        $link = $f["links"]["web"]["href"];
        echo "<a href=\"index3.php?link=$link\" >$head</a><br>";
    }else{
        echo "Headline = $head<br>";
    }
}
echo "<hr>";

//var_dump($a);
echo "<br><hr><br>";
var_dump($data);

//$simpleXml = simplexml_load_file("");


$xml = file_get_contents("http://api.sportsdatallc.org/nfl-t1/2012/REG/1/boxscore.xml?api_key=tm78nsysz4vyf9dg9vapkdnp");

$simpleXml = new SimpleXMLElement($xml);
$result = $simpleXml->xpath('//@points');
//var_dump($result);
foreach ($result as $value){
   echo "points $value<br>";
}
?>

