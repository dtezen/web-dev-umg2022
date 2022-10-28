<?=$cabecera?>
<h1>CREAR EQUIPO</h1>

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
    <form action="<?=site_url('/guardar')?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nombreEquipo">Nombre del equipo</label>
        <input type="text" class="form-control" value="<?=old('team_name')?>" id="nombreEquipo" name="nombreEquipo" aria-describedby="nombreHelp" placeholder="FC Barcelona">
        <small id="nombreHelp" class="form-text text-muted">Ingresa el nombre del equipo.</small>
    </div>
    <div class="form-group">
        <label for="nombreEntrenador">Nombre del Entrenador</label>
        <input type="text" class="form-control" id="nombreEntrenador" name="nombreEntrenador" aria-describedby="nombreHelp" placeholder="Ejemplo... Pep Guardiola">
        <small id="nombreHelp" class="form-text text-muted">Ingresa el nombre del Entrenador.</small>
    </div>
    <div class="form-group">
        <label for="direccion">Direccion</label>
        <input type="text" class="form-control" id="direccion" name="direccion" aria-describedby="nombreHelp" placeholder="Guatemala ">
    </div>
    <div class="form-group">
        <label for="entrenadorAux">Entrenador auxiliar</label>
        <input type="text" class="form-control" id="entrenadorAux" name="entrenadorAux" aria-describedby="nombreHelp" placeholder="Guatemala ">
    </div>
    <div class="form-group">
        <label for="numJugadores">Numero de jugadores</label>
        <input type="number" class="form-control" id="numJugadores" name="numJugadores" aria-describedby="nombreHelp" placeholder="10 ">
    </div>
    <div class="form-group mt-3">
        <label for="imagenUniforme">Seleccionar foto del Uniforme</label>
        <input type="file" class="form-control-file" id="imagenUniforme" name="imagenUniforme">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
  </div>
</div>

<?=$footer?>