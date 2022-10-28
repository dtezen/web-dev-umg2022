<?=$cabecera?>
<h1>crear jugador</h1>

<?php
    if(session('mensaje')){?>
<div class="alert alert-danger" role="alert">
  <?php 
    echo session('mensaje');
  ?>
</div>

<?php
    }
?>

<div class="card mb-5" style="width: 100;" >
  <div class="card-body">
    <form action="<?=site_url('/guardarJugador')?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nombreJugador">Nombre </label>
        <input type="text" class="form-control" value="<?=old('team_name')?>" id="nombreJugador" name="nombreJugador" aria-describedby="nombreHelp" placeholder="Darwin">
        <small id="nombreHelp" class="form-text text-muted">Ingresa el nombre del Jugador.</small>
    </div>
    <div class="form-group">
        <label for="apellidoJugador">Apellido</label>
        <input type="text" class="form-control" id="apellidoJugador" name="apellidoJugador" aria-describedby="nombreHelp" placeholder="Ejemplo... Pep Ñuñez Perez">
        <small id="nombreHelp" class="form-text text-muted">Ingresa el apellido del jugaror.</small>
    </div>
    <div class="form-group">
        <label for="direccion">Direccion</label>
        <input type="text" class="form-control" id="direccion" name="direccion" aria-describedby="nombreHelp" placeholder="Guatemala ">
    </div>
    <div class="form-group">
        <label for="entrenadorAux">Telefono</label>
        <input type="number" class="form-control" id="telefono" name="telefono" aria-describedby="nombreHelp" placeholder="56453423 ">
    </div>

    <div class="input-group mb-3 mt-3 form-group">
    <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Equipo</label>
    </div>
        <select class="custom-select" id="idEquipo" name="idEquipo">
        <option selected>Escoge...</option>
            <?php foreach($equipos as $equipo): ?>
            <option value="<?php echo $equipo['team_id']?>"><?php echo $equipo['team_name']?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="numJugadores">Fecha de nacimiento</label>
        <input type="date" class="form-control" id="fechaNac" name="fechaNac" aria-describedby="nombreHelp" placeholder="10 ">
    </div>
    <div class="form-group mt-3 mb-3">
        <label for="foto">Foto del jugador</label>
        <input type="file" class="form-control-file" id="foto" name="foto">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
  </div>
</div>

<?=$footer?>