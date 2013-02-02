<?php

echo $_SERVER['SERVER_NAME'];
echo "<BR>";
echo $_SERVER['REQUEST_URI'];

$z=getEspnTeamId("den");
echo "ID=$z";

$url =  "http://api.espn.com/v1/sports/football/nfl/news?apikey=bgusssdyxp7kkha7wfqrvzd5";
$json = file_get_contents($url); 
$data = json_decode($json, TRUE);
//var_dump($data);
$a = $data["headlines"];
echo "<hr>Here is a list of headlines<br>";
foreach($a as $f){
    $head = $f["headline"];
    $type = $f["type"];
    $link = $f["links"]["web"]["href"];

    $pullMe = 0;
    $cats = $f["categories"];
    foreach($cats as $cat){
//        var_dump($cat);
        if( array_key_exists("teamId",$cat) && $cat["teamId"] == 33 ){
            $pullMe = 1;
        }
    }
    echo "PULLME $pullMe";

    echo "Type $type: <a href=\"index3.php?link=$link\" >$head</a>";

    if($type == "BlogEntry" ){
        echo "BlogEntries are not filtered. ENTER AT YOUR OWN RISK.";
    }

    echo "<br>";
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


function getEspnTeamId($teamCode){
    $teamIdArray = array(
        "atl" => 1,
        "ari" => 22, 
        "BAL" => 33,
        "BUF" => 2,
        "car" => 29,
        "chi" => 3,
        "CIN" => 4,
        "CLE" => 5,
        "dal" => 6,
        "DEN" => 7,
        "det" => 8,
        "gbp" => 9,
        "HOU" => 34,
        "IND" => 11,
        "JAC" => 30,
        "KC" => 12,
        "MIA" => 15,
        "min" => 16,
        "NE" => 17,
        "nos" => 18,
        "nyg" => 19,
        "NYJ" => 20,
        "OAK" => 13,
        "phl" => 21,
        "PIT" => 23,
        "SD" => 24,
        "sff" => 25,
        "sea" => 26,
        "stl" => 14,
        "tam" => 27,
        "TEN" => 10,
        "wsh" => 28,
    );
    return "$teamIdArray[$teamCode]";
}

?>

