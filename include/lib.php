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

    echo '<tr>';

    echo '<td class="name">';
    echo $game->team[0]->attributes()->market.' '.$game->team[0]->attributes()->name;
    echo '</td>';

    if($score1 > $score2){
        echo '<td class="win">';
    }else{
        echo '<td class="lose">';
    }
    echo ' '.$score1.'';
    echo '</td>';

    echo '<td class="name">';
    echo $game->team[1]->attributes()->market.' '.$game->team[1]->attributes()->name;
    echo '</td>';
    
    if($score1 < $score2){
        echo '<td class="win">';
    }else{
        echo '<td class="lose">';
    }
    echo ' '.$score2.'';
    echo '</td>';

  }

  echo '</table>';

}
?>
