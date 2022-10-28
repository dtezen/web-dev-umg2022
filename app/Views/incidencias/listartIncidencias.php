<?=$cabecera?>
<h1>Listado de incidencias</h1>
<a href="<?=base_url('crearInci')?>" class="btn btn-info mb-2" type="button">Agregar Incidencia</a> 
<table class = "table table-light">
                <thead class = "thead-light">
                        <tr>
                            <th>#</th>
                            <th>Jugador</th>
                            <th>Tipo de tarjeta</th>
                            <th>Fecha de incidencia</th>
                            <th>fecha de suspencion</th>
                            <th>descripción</th>
                            <th>Foto</th>
                            <th>Acciones</th>
                        </tr>
                </thead>
                <tbody>
                    <?php foreach($inci as $inc): ?>
                        <tr>
                            <td><?=$inc['incidence_id'] ?></td>
                            <td><?=$inc['name'] ?></td>
                            <td><?=$inc['card_type'] ?></td>
                            <td><?=$inc['incidence_date'] ?> </td>
                            <td><?=$inc['suspension_date'] ? $inc['suspension_date'] : 'No suspendido';?></td>
                            <td><?=$inc['description']?></td>
                            <td>
                             <img src="<?=base_url()?>/uploads/<?=$inc['photo']?>" width="100" class="img-thumbnail">
                            </td>
                            <td>
                                <a href="<?=base_url("borrarInci/".$inc['incidence_id'])?>" type="button" class="btn btn-danger ">Eliminar</a>
                                <a href="<?=base_url("editarInci/".$inc['incidence_id'])?>" type="button" class="btn btn-info">Editar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                </tbody>
        </table>
<?=$footer?>