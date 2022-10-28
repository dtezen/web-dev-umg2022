<?=$cabecera?>
<h1>Jugadores</h1>
<a href="<?=base_url('crearJugador')?>" class="btn btn-info mb-2" type="button">Agregar un jugador</a> 

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Direccion</th>
      <th scope="col">Telefono</th>
      <th scope="col">Fecha de Nacimiento</th>
      <th scope="col">Equipo</th>
      <th scope="col">Fotografia</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($jugadores as $jugador):?>
    <tr>
      <th scope="row"><?=$jugador['player_id']?></th>
      <td><?=$jugador['name']?></td>
      <td><?=$jugador['surname']?></td>
      <td><?=$jugador['address']?></td>
      <td><?=$jugador['telphone']?></td>
      <td><?=$jugador['born_date']?></td>  
      <td><?=$jugador['team_name']?></td>    
      <td> 
        <img src="<?=base_url()?>/uploads/<?=$jugador['photo']?>" width="100" class="img-thumbnail">        
    </td>
    <td>
      <a href="<?=base_url("borrarJugador/".$jugador['player_id'])?>" type="button" class="btn btn-danger">Eliminar</a>
      <a href="<?=base_url("editarJugador/".$jugador['player_id'])?>" type="button" class="btn btn-info">Editar</a>
      </td>
    </tr>
   <?php endforeach;?>
  </tbody>
</table>
<?=$footer?>