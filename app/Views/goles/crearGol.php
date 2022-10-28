<?=$cabecera?>

<h1>REGISTRO DE GOLES</h1>
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
    <form action="<?=site_url('/guardarGol')?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
    <select class="custom-select mb-3" id="idJugador" name="idJugador">
        <option selected>Escoge...</option>
            <?php foreach($jugadores as $jugador): ?>
            <option value="<?php echo $jugador['player_id']?>"><?php echo $jugador['name']?></option>
            <?php endforeach; ?>
    </select>    
    </div>
    <div class="form-group">
        <label for="cantGoles">Cantidad de goles</label>
        <input type="number" class="form-control" id="cantGoles" name="cantGoles" aria-describedby="nombreHelp" placeholder="5">
        <small id="nombreHelp" class="form-text text-muted">Ingresa la cantidad de goles del jugadr.</small>
    </div>
    <div class="form-group mb-4">
        <label for="numJugadores">Fecha de nacimiento</label>
        <input type="date" class="form-control" id="fechaNac" name="fechaNac" aria-describedby="nombreHelp" placeholder="10 ">
    </div>
    
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
  </div>
</div>

<?=$footer?>