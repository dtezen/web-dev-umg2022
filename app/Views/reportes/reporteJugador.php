
<?php
    use App\Models\Gol;
    use App\Models\Jugador;
    $db = \Config\Database::connect();
    $query = $db->query('SELECT p.player_id,p.name,p.surname,p.address,p.telphone,p.photo,
    e.team_id,e.team_name AS team_name,p.born_date,i.suspension_date
  FROM `player` p
  INNER JOIN equipo e ON (e.team_id = p.team_id)
  INNER JOIN incidence i ON (i.id_player = p.player_id)
  ORDER BY 1 ASC;');
?>
<style>
      #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-left:0px;
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

    <h1 class="text-center">reporte de Jugadores</h1>

       
        
<table id="customers">
  <tr>
  <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Direccion</th>
      <th scope="col">Telefono</th>
      <th scope="col">Fecha de Nacimiento</th>
      <th scope="col">Equipo</th>
      <th scope="col">Suspension</th>
      <th scope="col">Fotografia</th>
  </tr>
  <?php foreach($query->getResultArray() as $row): ?>
    <tr>
    <th scope="row"><?=$row['player_id']?></th>
      <td><?=$row['name']?></td>
      <td><?=$row['surname']?></td>
      <td><?=$row['address']?></td>
      <td><?=$row['telphone']?></td>
      <td><?=$row['born_date']?></td>  
      <td><?=$row['team_name']?></td>  
      <td><?=$row['suspension_date']?></td>  
      <td> 
        <img src="<?=base_url()?>/uploads/<?=$row['photo']?>" width="100" class="img-thumbnail">        
    </td>
    </tr>
        <?php endforeach; ?>
</table>

      

