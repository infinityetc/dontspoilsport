<?php
$head = htmlspecialchars($_GET["head"]);
$link = htmlspecialchars($_GET["link"]);
$html = file_get_contents($link);

$insiderCheck = strstr($link,"insider.espn.go.com");
 
if( $insiderCheck == FALSE ){
    $head = str_replace("'","\'",$head);
    $pattern='/(<h2>'.$head.'.*)/s';
   
    $html = str_replace("<span class=\"type\">Commentary</span>","",$html);

 
    $matches;
    preg_match($pattern, $html, $matches);
    if( sizeof($matches) < 1 ){
        $pattern='/(<div class="mod-article-title\">.*)/s';
        preg_match($pattern, $html, $matches);
    }
    $bodyA=$matches[1];
   

    // try to remove some social headers
    $patternSoc = '/(.*)<div id="page-actions-top">/s';
    preg_match($patternSoc, $bodyA, $matches);
    if( sizeof($matches) > 0 ){
        $patternSoc2 = '/<div id="page-actions-top">(.*)/s';
        preg_match($patternSoc2, $bodyA, $matches2);

        if( sizeof($matches2) >0 ){        
            $patternSoc3 = '/<\/div>(.*)/s';
            preg_match($patternSoc3, $matches2[1], $matches3);
            if( sizeof($matches3) > 0 ){
                $bodyA = $matches[1].$matches3[1];
            }
        }

    }

    $pattern2 = '/(.*)<div class="content-social cf">/s';
    preg_match($pattern2,$bodyA,$matches);
    if( sizeof($matches) < 1  ){
        //echo "ALT TRY";
	$pattern2 = '/(.*)<ul id="page-actions-bottom" class="mod-page-actions">/s';
        preg_match($pattern2,$bodyA,$matches);  
        if( sizeof($matches) < 1 ){
            $pattern2 = '/(.*)<!-- end story body -->/s';
            preg_match($pattern2,$bodyA,$matches);
        }  
    }
    echo "$matches[1]";

}else if( sizeof($insiderCheck) > 0){
    $val = parseInsiderArticle($html);
    echo "$val";
    $displayed=1;
}


echo "<BR><br>";

function parseInsiderArticle($html){
    $pattern='/(<div class="mod-article-title\">.*)/s';
    $matches;
    preg_match($pattern, $html, $matches);
    $bodyA=$matches[1];

    $pattern2='/(.*)Already an Insider/s';
    preg_match($pattern2,$bodyA,$matches);
    return $matches[1];
}


/*
$dom= new DOMDocument(); 
$dom->load($html); 
$dom->preserveWhiteSpace = false; 

$finder = new DomXPath($dom);
$classname="col sidebar-dbl";
//$nodes = $finder->query("//*[contains(@class, '$classname')]");
$nodes = $finder->query('//*[@class="col"]');
var_dump($nodes);

//echo $domTable = $dom->getElementById("col"); 
*/
?>

