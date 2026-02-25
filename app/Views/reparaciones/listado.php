<br>
<br>
<a class="btn btn-primary" href="<?php echo base_url(); ?>public/reparaciones/nuevo">+ Nueva reparacion</a>
<a class="btn btn-primary" href="<?php echo base_url(); ?>public/reparaciones/por_auto">Reparaciones por auto</a>
<br>
<br>
<table class="table table-hover" id="contenido-lista">
    <thead>
        <th>Auto</th>
        <th>Descripción</th>
        <th>Fecha</th>
        <th>Monto</th>
        <th>Usuario que registró</th>
        <th>Acciones</th>

    </thead>

    <tbody>
        <?php
        foreach ($reparaciones as $reparacion) {
            if ($reparacion) {

                echo '<tr>';
                $autoNombre = '';
                foreach ($autos as $auto) {
                    if ($auto['id'] == $reparacion['id_auto']) {
                        $autoNombre = $auto['patente'] . " - " . $auto['modelo'] . " - " . $auto['marca'];
                        break;
                    }
                }
                echo '<td>' . $autoNombre . '</td>';
                echo '<td>' . $reparacion['descripcion'] . '</td>';
                echo '<td>' . $reparacion['fecha'] . '</td>';
                echo '<td>' . $reparacion['monto'] . '</td>';
                $usuarioNombre = '';
                foreach ($usuarios as $usuario) {
                    if ($usuario['id'] == $reparacion['id_usuario']) {
                        $usuarioNombre = $usuario['nombre'] . " " . $usuario['apellido'];
                        break;
                    }
                }
                echo '<td>' . $usuarioNombre . '</td>';
                echo '<td>
                <a class ="btn btn-warning" href="' . base_url() . 'public/facturas?reparacion_id=' . $reparacion['id'] . '">Facturar</a>
                <a class ="btn btn-warning" href="' . base_url() . 'public/reparaciones/editar/' . $reparacion['id'] . '">Editar</a>
                <a class ="btn btn-danger" onclick="return confirm(\'¿Seguro que desea eliminar este registro?\')" href="' . base_url() . 'public/reparaciones/borrar/' . $reparacion['id'] . '">Borrar</a>                
                </td>';
                echo '</tr>';
            } else {
                echo '<td class="colspan=6 text-center">No hay registros en lista</td>';
            }
        } ?>

    </tbody>
</table><br>