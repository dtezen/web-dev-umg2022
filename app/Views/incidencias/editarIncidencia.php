<?=$cabecera?>

<h1>Editar Incidencia</h1>

<div class="card mb-5" style="width: 100;" >
  <div class="card-body">
    <form action="<?=site_url('/actualizarInci')?>"  method="post" enctype="multipart/form-data">
    <input type="hidden" name="idInc" value="<?=$inci['incidence_id']?>"> 
    <div class="form-group">
    <small>Seleccione al jugador</small>
    <select class="custom-select mb-3" id="idJugador" name="idJugador">
            <option value="<?php echo $inci['id_player']?>"><?php echo $inci['id_player']?></option>
            <?php foreach($jugadores as $jugador): ?>
            <option value="<?php echo $jugador['player_id']?>"><?php echo $jugador['name']?></option>
            <?php endforeach; ?>
    </select>
        <div class="form-group">
                <small>Escoje el tipo de tarjeta</small>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox"  value="<?php echo $inci['card_type']?>" id="amarilla" name="tarjeta" >
                    <label class="form-check-label" for="defaultCheck1">
                        Amarilla
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox"  value="<?php echo $inci['card_type']?>" id="roja" name="tarjeta" >
                    <label class="form-check-label" for="defaultCheck2">
                    Roja
                    </label>
                </div>
            </div>    
        </div>
    
    <div class="form-group mb-4">
        <label for="numJugadores">Fecha de incidencia</label>
        <input type="date" class="form-control" id="fechaInc" name="fechaInc" value="<?php echo $inci['incidence_date']?>" aria-describedby="nombreHelp" placeholder="10" >
    </div>
    <div class="form-group mb-4">
        <label for="numJugadores">Fecha de suspensión</label>
        <input type="date" class="form-control" id="fechaSus" name="fechaSus" value="<?php echo $inci['suspension_date']?>" aria-describedby="nombreHelp" placeholder="10" disabled>
    </div>
    <div class="form-group mb-4">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Descripción</label>
            <!-- <textarea class="form-control rounded-0" id="descripcion" value="<?php echo $inci['description']?>" name="descripcion" rows="10"></textarea> -->
            <input class="form-control rounded-0 textarea" id="descripcion" value="<?php echo $inci['description']?>" name="descripcion" rows="10">    
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

<script>
    // var checker = document.getElementById('roja').value;
    // var sendbtn = document.getElementById('fechaSus');

   var roja= document.querySelector('#roja').value;

    if(roja == "Roja"){
     
     console.log("Funcionas")
 };

</script>

<?=$footer?>