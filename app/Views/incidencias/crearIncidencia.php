<?=$cabecera?>
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
<h1>REGISTRO DE GOLES</h1>

<div class="card mb-5" style="width: 100;" >
  <div class="card-body">
    <form action="<?=site_url('/guardarInci')?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
    <small>Seleccione al jugador</small>
    <select class="custom-select mb-3" id="idJugador" name="idJugador">
        <option selected>Escoge...</option>
            <?php foreach($jugadores as $jugador): ?>
            <option value="<?php echo $jugador['player_id']?>"><?php echo $jugador['name']?></option>
            <?php endforeach; ?>
    </select>
        <div class="form-group">
                <small>Escoje el tipo de tarjeta</small>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Amarilla" id="amarilla" name="tarjeta">
                    <label class="form-check-label" for="defaultCheck1">
                        Amarilla
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Roja" id="roja" name="tarjeta">
                    <label class="form-check-label" for="defaultCheck2">
                    Roja
                    </label>
                </div>
            </div>    
        </div>
    
    <div class="form-group mb-4">
        <label for="numJugadores">Fecha de incidencia</label>
        <input type="date" class="form-control" id="fechaInc" name="fechaInc" aria-describedby="nombreHelp" placeholder="10 ">
    </div>
    <div class="form-group mb-4">
        <label for="numJugadores">Fecha de suspensión</label>
        <input type="date" class="form-control" id="fechaSus" name="fechaSus" aria-describedby="nombreHelp" placeholder="10" disabled>
    </div>
    <div class="form-group mb-4">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Descripción</label>
            <textarea class="form-control rounded-0" id="descripcion" name="descripcion" rows="10"></textarea>
        </div>    
    </div>
    
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
  </div>
</div>

<script>
    var checker = document.getElementById('roja');
    var sendbtn = document.getElementById('fechaSus');
    checker.onchange = function() {
    sendbtn.disabled = !this.checked;
    };
</script>

<?=$footer?>