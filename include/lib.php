<?php

function getGames($hideFilter=null, $week=17, $season='REG'){
    $xml = simplexml_load_file('http://api.sportsdatallc.org/nfl-t1/2012/'.$season.'/'.$week.'/boxscore.xml?api_key=tm78nsysz4vyf9dg9vapkdnp');
    foreach($xml->game as $game){
        // if the hideFilter is the current team, skip it. If the hide filter is an array check if the current team is in the array
        $team1 = $game->team->attributes()->id;
        $team2 = $game->team[1]->attributes()->id;
        
        if($team1 == $hideFilter || is_array($hideFilter) && array_search($team1, $hideFilter) !== FALSE){
            continue;
        }elseif($team2 == $hideFilter || is_array($hideFilter) && array_search($team2, $hideFilter) !== FALSE){
            continue;
        }

        $games[] = $game;

    }
    return $games;
}

function displayGames($games){
//var_dump($games);

  echo '<table>';

  foreach($games as $game){
      
    $score1 = (int)$game->team[0]->scoring->attributes()->points;
    $score2 = (int)$game->team[1]->scoring->attributes()->points;

    echo '<tr class="home"><td class="name">';
    echo $game->team[0]->attributes()->market.' '.$game->team[0]->attributes()->name;
    echo '</td>';

    if($score1 > $score2){
        echo '<td class="win">';
    }else{
        echo '<td class="lose">';
    };
    echo ' '.$score1.'';
    echo '</td></tr>';

    
    echo '<tr class="away"><td class="name">';
    echo $game->team[1]->attributes()->market.' '.$game->team[1]->attributes()->name;
    echo '</td>';
    
    if($score1 < $score2){
        echo '<td class="win">';
    }else{
        echo '<td class="lose">';
    };
    echo ' '.$score2.'';

    echo '</td></tr>';
          
  };

  echo '</table>';

};

function getNamesToIgnore($hideFilter){
    $ignore = array();
    $games = getGames(null, 17, 'REG');
    foreach($games as $game){
        $team1 = $game->team->attributes()->id;
        $team2 = $game->team[1]->attributes()->id;
        
        
        if($team1 == $hideFilter || is_array($hideFilter) && array_search($team1, $hideFilter) !== FALSE){
            $ignore[] = (string)$game->team[0]->attributes()->market;
            $ignore[] = (string)$game->team[0]->attributes()->name;
        }
        
        if($team2 == $hideFilter || is_array($hideFilter) && array_search($team2, $hideFilter) !== FALSE){
            $ignore[] = (string)$game->team[1]->attributes()->market;
            $ignore[] = (string)$game->team[1]->attributes()->name;
        }
    }
    return $ignore;
}

function displayRecaps($filterIgnore){
    $xml = simplexml_load_file('http://api.sportsdatallc.org/content-nfl-t1/recaps?api_key=y8vaxqmuatj64dyjt2qfzppx','SimpleXMLElement',LIBXML_NOCDATA|LIBXML_DTDLOAD |LIBXML_PARSEHUGE );
    foreach($xml->channel->item as $item){
        //echo $item->category;die;

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
    }
    
}
?>
