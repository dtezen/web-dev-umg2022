
<?php
    use App\Models\Gol;
    use App\Models\Jugador;
    $db = \Config\Database::connect();
    $query = $db->query('SELECT g.id_goal,g.player_id,p.name,p.photo,g.goals_number,g.date_goal
    FROM `goal_score` g
    INNER JOIN player p ON (p.player_id = g.player_id)
    ORDER BY g.goals_number DESC;');
?>
<style>
      #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
    </style>

 <h1>reporte de Goleadores</h1>

<table id="customers">
  <tr>
  <th>#</th>
    <th>Nombre</th>
    <th>No. Goles</th>
    <th>Fecha Gol</th>
    <th>Foto</th>
  </tr>
  <?php foreach($query->getResultArray() as $row): ?>
    <tr>
        <td><?=$row['id_goal'] ?></td>
        <td><?=$row['name'] ?></td>
        <td><?=$row['goals_number'] ?></td>
        <td><?=$row['date_goal']?></td>
        <td>
        <img src="<?=base_url()?>/uploads/<?=$row['photo']?>" width="100" class="img-thumbnail">
        </td>
    </tr>
        <?php endforeach; ?>
</table>

      

