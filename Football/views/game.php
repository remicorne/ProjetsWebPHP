<table class="table">
 <tr>
  <th></th>
  <th>Équipe à domicile</th>
  <th>Résultat</th>
  <th>Équipe à l'extérieur</th>
 </tr>
 <tr class="active">
  <td><?=$game['date']?></td>
  <td><a href="/index.php/Soccer/team/<?=$game['teams'][0]?>"><?=$team_names[$game['teams'][0]]?></a></td>
  <td><?=$goalsCounts[0]?> - <?=$goalsCounts[1]?></td>
  <td><a href="/index.php/Soccer/team/<?=$game['teams'][1]?>"><?=$team_names[$game['teams'][1]]?></a></td>
 </tr>

 <?php foreach ($game['goals'] as $goal) { ?>
 <tr>
 <?php if ($goal['team'] == 0) { ?> 
    <td><?=$goal['time']?>'</td><td><?=$goal['player']?></td><td></td><td></td>
 <?php } elseif ($goal['team'] == 1) { ?> 
    <td><?=$goal['time']?>'</td><td></td><td></td><td><?=$goal['player']?></td>
 <?php } ?>
 </tr>
 
 <?php } ?>