<?php
function displayContent($filterIgnore, $type='recaps'){
    $xml = simplexml_load_file('http://api.sportsdatallc.org/content-nfl-t1/'.$type.'?api_key=y8vaxqmuatj64dyjt2qfzppx','SimpleXMLElement',LIBXML_NOCDATA|LIBXML_DTDLOAD |LIBXML_PARSEHUGE );
    $i = 1;
    foreach($xml->channel->item as $item){
        //echo $item->category;die;

    if ($i>10) {
	return;
    };

        foreach($item->category as $cat){
            foreach($filterIgnore as $filter){
                if(stripos($cat,$filter) !== FALSE){
                    continue 3;die;
                }
            }
        }
        echo '<h3><a href="javascript:void(0)" onclick="$(this).parent().next().toggle(\'slow\');$(this).parent().next().next().toggle(\'slow\');">'.$item->title.'</a></h3>';
        echo '<div>'.str_replace('[...]','[ <a href="javascript:void(0)" onclick="$(this).parent().toggle(\'slow\');$(this).parent().next().toggle(\'slow\');">read more</a> ]', strip_tags($item->description)).'</div>';
        echo '<div style="display:none;">'.$item->children('content', true).'</div>';
    $i++;
    };
};
?>
