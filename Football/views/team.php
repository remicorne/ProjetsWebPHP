<h3><a href="/index.php/Soccer/ranking">Classement</a></h3><br>
<table class="table">
 <tr>
  <th>N°</th>
  <th>Équipe</th>
  <th>MJ</th>
  <th>G</th>
  <th>N</th>
  <th>P</th>
  <th>BP</th>
  <th>BC</th>
  <th>DB</th>
  <th>PTS</th>
 </tr>
 <tr class="active">
  <td><?=$team['ranking']?></td>
  <td><b><?=$title?></b></td>
  <td><?=$team['played']?></td>
  <td><?=$team['won']?></td>
  <td><?=$team['drawn']?></td>
  <td><?=$team['lost']?></td>
  <td><?=$team['goals_for']?></td>
  <td><?=$team['goals_against']?></td>
  <td><?=$team['goal_difference']?></td>
  <td><?=$team['points']?></td>
 </tr>
</table>

<h3>Matchs</h3><br>

<?php function team_order($gameInfo, $whichTeam, $id, $team_names, $gameNum) {
    if ($whichTeam == 0) $otherTeam = 1;
    if ($whichTeam == 1) $otherTeam = 0;
    $isWinner = $gameInfo['goal_counts'][$whichTeam] > $gameInfo['goal_counts'][$otherTeam];
    if ($whichTeam == 0) { ?>
        <td> 
        <?php if ($gameInfo['teams'][$whichTeam] != $id) { ?>
        <a href="/index.php/Soccer/team/<?=$gameInfo['teams'][$whichTeam]?>">
        <?php } if ($isWinner) { ?>
        <b>
        <?php } ?>
        <?=$team_names[$gameInfo['teams'][$whichTeam]]?>
        <?php if ($isWinner) ?>
        </b>
        <?php if ($gameInfo['teams'][$whichTeam] != $id) ?>
        </a>
        </td>
        <td><a href="/index.php/Soccer/game/<?=$gameNum?>">
        <?php if ($isWinner) ?>
        <b>
        <?=$gameInfo['goal_counts'][$whichTeam]?> -   
        <?php if ($isWinner) ?>
        </b>
    <?php } 
    else if ($whichTeam == 1){ ?>
        <?php if ($isWinner) ?>
        <b>
        <?=$gameInfo['goal_counts'][$whichTeam]?>   
        <?php if ($isWinner) ?>
        </b>
        </a>
        </td>
        <td> 
        <?php if ($gameInfo['teams'][$whichTeam] != $id) { ?>
        <a href="/index.php/Soccer/team/<?=$gameInfo['teams'][$whichTeam]?>">
        <?php } if ($isWinner) { ?>
        <b>
        <?php } ?>
        <?=$team_names[$gameInfo['teams'][$whichTeam]]?>
        <?php if ($isWinner) ?>
        </b>
        <?php if ($gameInfo['teams'][$whichTeam] != $id) ?>
        </a>
        </td>

    <?php } ?>

 <?php } ?>

<table class="table table-hover">
<?php foreach ($team['games'] as $gameNum=>$gameInfo) {  ?>
<tr>
<td><?=$gameInfo['date']?></td>
<?php for ($whichTeam = 0; $whichTeam < 2; $whichTeam++) { 
    team_order($gameInfo, $whichTeam, $id, $team_names, $gameNum); } ?>
</tr>



<?php } ?>

