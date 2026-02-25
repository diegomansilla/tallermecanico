<br>
<br>
<a class="btn btn-primary" href="<?php
                                    echo base_url();
                                    ?>public/clientes/nuevo">+ Nuevo cliente</a>
<br>
<br>
<table class="table table-hover" id="contenido-lista">
    <thead>
        <th>Nombre Completo</th>
        <th>Teléfono</th>
        <th>Mail</th>
        <th>Direccion</th>
        <th>Usuario que registró</th>
        <th>Acciones</th>

    </thead>

    <tbody>
        <?php
        foreach ($clientes as $cliente) {
            if ($cliente) {

                echo '<tr>';
                echo '<td>' . $cliente['nombre'] . " " . $cliente['apellido'] . '</td>';
                echo '<td>' . $cliente['telefono'] . '</td>';
                echo '<td>' . $cliente['email'] . '</td>';
                echo '<td>' . $cliente['direccion'] . '</td>';
                $usuarioNombre = '';
                foreach ($usuarios as $usuario) {
                    if ($usuario['id'] == $cliente['id_usuario']) {
                        $usuarioNombre = $usuario['nombre'] . " " . $usuario['apellido'];
                        break;
                    }
                }
                echo '<td>' . $usuarioNombre . '</td>';

                echo '<td>
                <a class ="btn btn-warning"
                href="' . base_url() . 'public/clientes/editar/' . $cliente['id'] . '">Editar
                </a>
                <a class ="btn btn-danger" onclick="return confirm(\'¿Seguro que desea eliminar este registro?\')"
                href="' . base_url() . 'public/clientes/borrar/' . $cliente['id'] . '">Borrar
                </a>
                
                </td>';
                echo '</tr>';
            } else {
                echo '<td class="colspan=5 text-center">No hay registros en lista</td>';
            }
        } ?>

    </tbody>
</table><br>