<?php
class Soccer extends Controller {
  public function index() {
    $this->ranking();
  }
  
  public function ranking() {
    $team_names = $this->soccer->team_names(); 
    $ranking = $this->soccer->ranking(); 
    $title = 'Classement de la ligue de football';
    $view = 'ranking';
    $this->loader->load('ranking', ['title'=>$title, 'team_names'=>$team_names, 'ranking'=>$ranking]);


  }

  public function team($id) {
    $id = filter_var($id, FILTER_VALIDATE_INT); 
    if ($id===null || $id === false) {
      throw new Exception('need team number');
    }
    $team_names = $this->soccer->team_names(); 
    $team = $this->soccer->team($id); 
    $title = $team_names[$id];
    $view = "team";
    $this->loader->load('team', ['title'=>$title, 'team_names'=>$team_names, 'team'=>$team, 'id'=>$id]);
  }

  public function game($id) {
    $id = filter_var($id, FILTER_VALIDATE_INT); 
    if ($id===null || $id === false ) {
      throw new Exception('need game number');
    }
    $game = $this->soccer->game($id); 
    $team_names = $this->soccer->team_names(); 
    
   function goal_count($game, $teamPosition){
       $count = 0;
       foreach ($game['goals'] as $goal)
           if ($goal['team'] == $teamPosition)
               $count++;
       return $count;
   }
   
   $goalsCounts = [goal_count($game, 0), goal_count($game, 1)];
   
   $title = $team_names[$game['teams'][0]] ." - " .$team_names[$game['teams'][1]];
   $this->loader->load('game', ['title'=>$title, 'team_names'=>$team_names, 'goalsCounts'=>$goalsCounts, 'game'=>$game, 'id'=>$id]);
  }
  
  private function goal_count($game, $position) {
    //a coder
  }
}
?>