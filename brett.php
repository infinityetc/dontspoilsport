<?php
displayGames(getGames());

function getGames($hideFilter=null){
    $xml = simplexml_load_file('http://api.sportsdatallc.org/nfl-t1/2012/REG/1/boxscore.xml?api_key=tm78nsysz4vyf9dg9vapkdnp');
    foreach($xml->game as $game){
        if(is_array($hideFilter)){

        }
        if($game->team['id'] == $hideFilter){continue;}
        
    }
}

function displayGames($games){
  foreach($games as $game){
     var_dump($game);
  }
}
?>
