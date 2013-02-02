<?php

include('include/header.php');
echo '<h3>News</h3>';
echo '<div id="news">';
displayNews(@$_GET['nfl']);
echo '</div><br />';
include('include/footer.php');

$filteredCount = 0;

function displayNews($filters){
    $espnFilters = array( );
    if( sizeof($filters) > 0 ){
        foreach($filters as $filter){
    	    array_push($espnFilters, getEspnTeamId($filter));
        }
    }

    $itemsToDisplay = getItemsToDisplay($espnFilters,10);
    $itemsToDisplay = moveItemsWithImagesToTop($itemsToDisplay);
    displayItems($itemsToDisplay);
    global $filteredCount;
    echo "<BR>";
    echo "Filtered $filteredCount headlines";
}

function moveItemsWithImagesToTop($itemsToDisplay){
    $itemsWithImagesOnTop = array();
    $itemsWithoutImages = array();

    foreach($itemsToDisplay as $item){
        $images = $item["images"];
        if( sizeof($images) > 0 ){
            array_push($itemsWithImagesOnTop,$item);
        }else{
            array_push($itemsWithoutImages,$item);
        }
    }

//    $itemsWithImagesOnTop = array_merge($itemsWithoutImages,$itemsWithImagesOnTop);

    return $itemsWithImagesOnTop;
}

function displayItems($itemsToDisplay){
    $c = sizeof($itemsToDisplay);

    // display an image from the first article
    $firstItem = array_pop($itemsToDisplay);
//    $firstItem = $itemsToDisplay[0];

    $firstImages = $firstItem["images"];
    if(sizeof($firstImages) > 0 ){
        $firstImage = array_pop($firstImages);
        $caption = $firstImage["caption"]; 
        $url = extractImageUrl($firstItem);
        echo "<img src=\"$url\"/><br>$caption<br>";
    }
    displayItem($firstItem);
    echo "<br>";

    $secondItem = array_pop($itemsToDisplay);
    $secondImages = $secondItem["images"];
    if(sizeof($secondImages) >0 ){
        $secondImage = array_pop($secondImages);
        $secondUrl = extractImageUrl($secondItem);
        $secondCaption = $secondImage["caption"];
        echo "<img src=\"$secondUrl\"/><br>$secondCaption<br>";
    }
    displayItem($secondItem);
    echo "<br>";

    foreach($itemsToDisplay as $item){
        displayItem($item);
    }
}

function extractImageUrl($item){
    $i = array_pop($item["images"]);
    return $i["url"];
}

function displayItem($item){
    $head = $item["headline"];
    $link = $item["links"]["web"]["href"];
    echo "<a href=\"cleansedArticle.php?link=$link\" >$head</a>";
    echo "<br>";
}

function loadBatch(&$itemsToDisplay,$espnFilters,$offset,$increments){
    global $filteredCount;
    $url =  "http://api.espn.com/v1/sports/football/nfl/news?apikey=bgusssdyxp7kkha7wfqrvzd5&limit=$increments&offset=$offset";
    $json;
    $a = array();
    try{
        $json = file_get_contents($url);
        $data = json_decode($json, TRUE);
        $a = $data["headlines"];
    }catch(Exception $e){
    }

    if( sizeof($a) > 0 ){
    foreach($a as $f){
        $type = $f["type"];

        $pullMe = 0;
        if( array_key_exists("categories",$f)) {
            $cats = $f["categories"];
            foreach($cats as $cat){
                if( array_key_exists("teamId",$cat) && in_array($cat["teamId"], $espnFilters) ){
                    $pullMe = 1;
                }else if($type == "BlogEntry"){
                    $pullMe = 1;
                }
            }
        }else{
            $pullMe = 1;
        }
        if( $pullMe == 0 ){
            array_push($itemsToDisplay,$f);
        }else{
            $filteredCount++;
        }
    }
    }
}

function getItemsToDisplay($espnFilters,$count){
    global $filteredCount;
    $itemsToDisplay = array();

    $tryLimit = 2;
    $increments=20;
    $offset=0;
    while(sizeof($itemsToDisplay < $count) && $tryLimit > 0){

        loadBatch($itemsToDisplay,$espnFilters,$offset,$increments);

        $offset+=$increments;
        $tryLimit--;
    }

    return $itemsToDisplay;
}

function displayBatch($espnFilters,$limit,$offset){
    $url =  "http://api.espn.com/v1/sports/football/nfl/news?apikey=bgusssdyxp7kkha7wfqrvzd5&limit=20";
//    $url = "http://api.espn.com/v1/now?leagues=nfl&limit=5&offset=$offset&apikey=bgusssdyxp7kkha7wfqrvzd5";

    $json = file_get_contents($url); 
    $data = json_decode($json, TRUE);
  $a = $data["headlines"];
//    $a = $data["feed"];

    global $filteredCount;
    $displayedCount = 0;

    foreach($a as $f){
        $head = $f["headline"];
        $type = $f["type"];
        $link = $f["links"]["web"]["href"];

        $imageExists = 0;
        $images = $f["images"];
        if( sizeof($images) > 0 ){
            $imageExists = 1;
        } 
       
        $pullMe = 0;
        if( array_key_exists("categories",$f)) {
            $cats = $f["categories"];
            foreach($cats as $cat){
                if( array_key_exists("teamId",$cat) && in_array($cat["teamId"], $espnFilters) ){
                    $pullMe = 1;
                }else if($type == "BlogEntry"){
                    $pullMe = 1;
                }
            }
        }else{
            $pullMe = 1;
        }

        if( $pullMe == 0 ){
            echo "<a href=\"cleansedArticle.php?link=$link\" >$head</a>";
            echo "<br>";
            $displayedCount++;
        }else{
            $filteredCount++;
        }
    }

    return $displayedCount;

//    echo "<BR>";
//    echo "Filtered $filteredCount headlines";
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

