<?=$cabecera?>
<h1>Tabla de Goleadores</h1>
<a href="<?=base_url('crearGol')?>" class="btn btn-info mb-2" type="button">Agregar un Goles</a> 
<table class = "table table-light">
                <thead class = "thead-light">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>No. Goles</th>
                            <th>Fecha Gol</th>
                            <th>Foto</th>
                            <th>Acciones</th>
                        </tr>
                </thead>
                <tbody>
                    <?php foreach($goles as $gol): ?>
                        <tr>
                            <td><?=$gol['id_goal'] ?></td>
                            <td><?=$gol['name'] ?></td>
                            <td><?=$gol['goals_number'] ?></td>
                            <td><?=$gol['date_goal']?></td>
                            <td>
                             <img src="<?=base_url()?>/uploads/<?=$gol['photo']?>" width="100" class="img-thumbnail">
                            </td>
                            <td>
                                <a href="<?=base_url("borrarGol/".$gol['id_goal'])?>" type="button" class="btn btn-danger">Eliminar</a>
                                <a href="<?=base_url("editarGol/".$gol['id_goal'])?>" type="button" class="btn btn-info">Editar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                </tbody>
        </table>
<?=$footer?>