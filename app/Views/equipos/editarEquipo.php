
<?=$cabecera?>

<h1>Editar Equipo</h1>
<div class="card mb-5" style="width: 100;" >
  <div class="card-body">
    <form action="<?=site_url('/actualizarEquipo')?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$equipo['team_id']?>">
    <div class="form-group">
        <label for="nombreEquipo">Nombre del equipo</label>
        <input type="text" class="form-control" value="<?=$equipo['team_name']?>" id="nombreEquipo" name="nombreEquipo" aria-describedby="nombreHelp" placeholder="FC Barcelona">
        <small id="nombreHelp" class="form-text text-muted">Ingresa el nombre del equipo.</small>
    </div>
    <div class="form-group">
        <label for="nombreEntrenador">Nombre del Entrenador</label>
        <input type="text" class="form-control" value="<?=$equipo['team_coach']?>" id="nombreEntrenador" name="nombreEntrenador" aria-describedby="nombreHelp" placeholder="Ejemplo... Pep Guardiola">
        <small id="nombreHelp" class="form-text text-muted">Ingresa el nombre del Entrenador.</small>
    </div>
    <div class="form-group">
        <label for="direccion">Direccion</label>
        <input type="text" class="form-control" value="<?=$equipo['address']?>" id="direccion" name="direccion" aria-describedby="nombreHelp" placeholder="Guatemala ">
    </div>
    <div class="form-group">
        <label for="entrenadorAux">Entrenador auxiliar</label>
        <input type="text" class="form-control" value="<?=$equipo['auxiliary_coach']?>" id="entrenadorAux" name="entrenadorAux" aria-describedby="nombreHelp" placeholder="Guatemala ">
    </div>
    <div class="form-group">
        <label for="numJugadores">Numero de jugadores</label>
        <input type="number" class="form-control" value="<?=$equipo['number_of_players']?>" id="numJugadores" name="numJugadores" aria-describedby="nombreHelp" placeholder="10 ">
    </div>
    <img src="<?=base_url()?>/uploads/<?=$equipo['uniform_team']?>" width="100" class="img-thumbnail mt-2">
    <div class="form-group mt-3">
        <label for="imagenUniforme">Seleccionar foto del Uniforme</label>
        <input type="file" class="form-control-file"  id="imagenUniforme" name="imagenUniforme">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
  </div>
</div>





<?=$footer?>