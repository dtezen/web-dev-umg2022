<?=$cabecera?>

<h1>EDITAR GOLES</h1>

<div class="card mb-5" style="width: 100;" >
  <div class="card-body">
    <form action="<?=site_url('/actualizarGol')?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idEditarGol" value="<?=$goles['id_goal']?>">    
    <div class="form-group">
    <select class="custom-select mb-3" id="idJugador" name="idJugador">
        <!-- <option selected>Escoge...</option> -->
        <option value="<?php echo $goles['player_id']?>"><?php echo $goles['player_id']?></option>
            <?php foreach($jugadores as $jugador): ?>
            <option value="<?php echo $jugador['player_id']?>"><?php echo $jugador['name']?></option>
            <?php endforeach; ?>
    </select>    
    </div>
    <div class="form-group">
        <label for="cantGoles">Cantidad de goles</label>
        <input type="number" class="form-control" value="<?=$goles['goals_number']?>" id="cantGoles" name="cantGoles" aria-describedby="nombreHelp" placeholder="5">
        <small id="nombreHelp" class="form-text text-muted">Ingresa la cantidad de goles del jugadr.</small>
    </div>
    <div class="form-group mb-4">
        <label for="numJugadores">Fecha de nacimiento</label>
        <input type="date" class="form-control"  value="<?=$goles['date_goal']?>" id="fechaNac" name="fechaNac" aria-describedby="nombreHelp" placeholder="10 ">
    </div>
    
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
  </div>
</div>

<?=$footer?>