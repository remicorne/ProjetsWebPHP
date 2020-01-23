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
<?php $rank = 0; foreach ($ranking as $teamNum=>$teamStats) { $rank++ ?>
<tr>
 <td><?=$rank?></td>
 <td><a href="/Football/index.php/Soccer/team/<?=$teamNum?>"><?=$team_names[$teamNum]?></a></td>
 <?php foreach ($teamStats as $result) { ?>
 <td><?=$result?></td>
 <?php } ?>
</tr>
<?php } ?>
