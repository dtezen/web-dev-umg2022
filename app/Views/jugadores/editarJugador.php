<?=$cabecera?>

<h1>Editar Jugador</h1>

<div class="card mb-5" style="width: 100;" >
  <div class="card-body">
    <form action="<?=site_url('/actualizarJugador')?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idEditar" value="<?=$jugador['player_id']?>">
    <div class="form-group">
        <label for="nombreJugador">Nombre </label>
        <input type="text" class="form-control" value="<?=$jugador['name']?>" id="nombreJugador" name="nombreJugador" aria-describedby="nombreHelp" placeholder="Darwin">
        <small id="nombreHelp" class="form-text text-muted">Ingresa el nombre del Jugador.</small>
    </div>
    <div class="form-group">
        <label for="apellidoJugador">Apellido</label>
        <input type="text" class="form-control" value="<?=$jugador['surname']?>" id="apellidoJugador" name="apellidoJugador" aria-describedby="nombreHelp" placeholder="Ejemplo... Pep Ñuñez Perez">
        <small id="nombreHelp" class="form-text text-muted">Ingresa el apellido del jugaror.</small>
    </div>
    <div class="form-group">
        <label for="direccion">Direccion</label>
        <input type="text" class="form-control" value="<?=$jugador['address']?>" id="direccion" name="direccion" aria-describedby="nombreHelp" placeholder="Guatemala ">
    </div>
    <div class="form-group">
        <label for="entrenadorAux">Telefono</label>
        <input type="number" class="form-control" value="<?=$jugador['telphone']?>" id="telefono" name="telefono" aria-describedby="nombreHelp" placeholder="56453423 ">
    </div>

    <div class="input-group mb-3 mt-3 form-group">
    <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Equipo</label>
    </div>
        <select class="custom-select" id="idEquipo" name="idEquipo">
        <option value="<?php echo $jugador['team_id']?>"><?php echo $jugador['team_id']?></option>
            <?php foreach($equipos as $equipo):?>
            <option value="<?php echo $equipo['team_id']?>"><?php echo $equipo['team_name']?></option>
            <?php endforeach;?>
        </select>
    </div>

    <div class="form-group">
        <label for="numJugadores">Fecha de nacimiento</label>
        <input type="date" class="form-control" value="<?=$jugador['born_date']?>" id="fechaNac" name="fechaNac" aria-describedby="nombreHelp" placeholder="10 ">
    </div>
    <img src="<?=base_url()?>/uploads/<?=$jugador['photo']?>" width="100" class="img-thumbnail mt-3">        
    <div class="form-group mt-3 mb-3">
        <label for="foto">Foto del jugador</label>
        <input type="file" class="form-control-file" id="foto" name="foto">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
  </div>
</div>

<?=$footer?>