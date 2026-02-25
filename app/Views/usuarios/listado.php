<br>
<br>
<a class="btn btn-primary" href="<?php echo base_url(); ?>public/usuarios/nuevo">+ Nuevo usuario</a>
<br>
<br>
<table class="table table-hover" id="contenido-lista">
    <thead>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Mail</th>
        <th>Rol</th>
        <th>Acciones</th>

    </thead>

    <tbody>
        <?php
        foreach ($usuarios as $usuario) {
            if ($usuario) {

                echo '<tr>';
                echo '<td>' . $usuario['nombre'] . '</td>';
                echo '<td>' . $usuario['apellido'] . '</td>';
                echo '<td>' . $usuario['email'] . '</td>';
                echo '<td>' . $usuario['rol'] . '</td>';

                echo '<td>
                <a class ="btn btn-warning" href="' . base_url() . 'public/usuarios/editar/' . $usuario['id'] . '">Editar</a>
                <a class ="btn btn-danger" onclick="return confirm(\'¿Seguro que desea eliminar este registro?\')" href="' . base_url() . 'public/usuarios/borrar/' . $usuario['id'] . '">Borrar</a>
                </td>';
                echo '</tr>';
            } else {
                echo '<td class="colspan=5 text-center">No hay registros en lista</td>';
            }
        } ?>

    </tbody>
</table><br>