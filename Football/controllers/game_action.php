<?php
 $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
 if ($id===null || $id === false || !file_exists("models/game_$id.php")) {
   exit();
 }
 include "models/game_$id.php";
 include "models/team_names.php";
 $view = "game";

function goal_count($game, $teamPosition){
    $count = 0;
    foreach ($game['goals'] as $goal)
        if ($goal['team'] == $teamPosition)
            $count++;
    return $count;
}

$goalsCounts = [goal_count($game, 0), goal_count($game, 1)];

$title = $team_names[$game['teams'][0]] ." - " .$team_names[$game['teams'][1]];
 include "views/page.php";

 ?>

