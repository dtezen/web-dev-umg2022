<?=$cabecera?>
<div class="col-md-12 ">
<video width="400" controls autoplay class=" col-md-12 h-50">
  <source src="uploads/videos/uefa.mp4" type="video/mp4">
  Your browser does not support HTML video.
</video>
</div>


       <h1 class="mb-3">Litado de equipos</h1>
       <a href="<?=base_url('crearEquipo')?>" class="btn btn-info mb-2" type="button">Agregar un equipo</a> 

       <table class = "table table-light">
                <thead class = "thead-light">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Entrenador</th>
                            <th>Numero de Jugadores</th>
                            <th>Equipación</th>
                            <th>Acciones</th>
                        </tr>
                </thead>
                <tbody>
                    <?php foreach($equipos as $equipo): ?>
                        <tr>
                            <td><?=$equipo['team_id'] ?></td>
                            <td><?=$equipo['team_name'] ?></td>
                            <td><?=$equipo['team_coach'] ?></td>
                            <td><?=$equipo['number_of_players']?></td>
                            <td>
                             <img src="<?=base_url()?>/uploads/<?=$equipo['uniform_team']?>" width="100" class="img-thumbnail">
                            </td>
                            <td>
                                <a href="<?=base_url("borrarEquipo/".$equipo['team_id'])?>" type="button" class="btn btn-danger">Eliminar</a>
                                <a href="<?=base_url("editarEquipos/".$equipo['team_id'])?>" type="button" class="btn btn-info">Editar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                </tbody>
        </table>
<?=$footer?>