<a class="btn btn-primary" href="<?php echo base_url(); ?>public/autos/nuevo">+ Nuevo auto</a>
<a class="btn btn-primary" href="<?php echo base_url(); ?>public/autos/autos_por_cliente">Autos por Cliente</a>
<br>
<br>
<table class="table table-hover" id="contenido-lista">
    <thead>
        <th>Cliente</th>
        <th>Patente</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Año</th>
        <th>Usuario que registró</th>
        <th>Acciones</th>

    </thead>

    <tbody>
        <?php
        foreach ($autos as $auto) {
            if (!empty($auto)) {

                echo '<tr>';
                $clienteNombre = '';
                foreach ($clientes as $cliente) {
                    if ($cliente['id'] == $auto['id_cliente']) {
                        $clienteNombre = $cliente['nombre'] . " " . $cliente['apellido'];
                        break;
                    }
                }
                echo '<td>' . $clienteNombre . '</td>';
                echo '<td>' . $auto['patente'] . '</td>';
                echo '<td>' . $auto['marca'] . '</td>';
                echo '<td>' . $auto['modelo'] . '</td>';
                echo '<td>' . $auto['anio'] . '</td>';
                $usuarioNombre = '';
                foreach ($usuarios as $usuario) {
                    if ($usuario['id'] == $auto['id_usuario']) {
                        $usuarioNombre = $usuario['nombre'] . " " . $usuario['apellido'];
                        break;
                    }
                }
                echo '<td>' . $usuarioNombre . '</td>';
                echo '<td>
                <a class ="btn btn-warning"
                href="' . base_url() . 'public/autos/editar/' . $auto['id'] . '">Editar
                </a>
                <a class ="btn btn-danger" onclick="return confirm(\'¿Seguro que desea eliminar este registro?\')"
                href="' . base_url() . 'public/autos/borrar/' . $auto['id'] . '">Borrar
                </a>
                
                </td>';
                echo '</tr>';
            } else {
                echo '<td class="colspan=6 text-center">No hay registros en lista</td>';
            }
        } ?>

    </tbody>
</table><br>