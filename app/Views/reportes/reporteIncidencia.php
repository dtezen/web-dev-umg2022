
<?php
    use App\Models\Gol;
    use App\Models\Jugador;
    $db = \Config\Database::connect();
    $query = $db->query('SELECT i.incidence_id,i.id_player,p.name,i.card_type,i.incidence_date,i.suspension_date,i.description,p.photo
    FROM incidence i 
    INNER JOIN player p ON (p.player_id = i.id_player)
     ORDER BY 1 DESC;');
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

 <h1>reporte de Incidencias</h1>

<table id="customers">
  <tr>
  <th>#</th>
                            <th>Jugador</th>
                            <th>Tipo de tarjeta</th>
                            <th>Fecha de incidencia</th>
                            <th>fecha de suspencion</th>
                            <th>descripción</th>
                            <th>Fotografia</th>
                           
  </tr>
  <?php foreach($query->getResultArray() as $row): ?>
    <tr>
    <td><?=$row['incidence_id'] ?></td>
                            <td><?=$row['name'] ?></td>
                            <td><?=$row['card_type'] ?></td>
                            <td><?=$row['incidence_date'] ?> </td>
                            <td><?=$row['suspension_date'] ? $row['suspension_date'] : 'No suspendido';?></td>
                            <td><?=$row['description']?></td>
                            <td>
                             <img src="<?=base_url()?>/uploads/<?=$row['photo']?>" width="100" class="img-thumbnail">
                            </td>
    </tr>
        <?php endforeach; ?>
</table>

      

