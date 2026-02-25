<br>
<br>
<a class="btn btn-primary" href="<?php echo base_url(); ?>public/proveedores/nuevo">+ Nuevo proveedor</a>
<br>
<br>
<table class="table table-hover" id="contenido-lista">
    <thead>
        <th>#</th>
        <th>Razón Social</th>
        <th>Teléfono</th>
        <th>Mail</th>
        <th>Acciones</th>

    </thead>

    <tbody>
        <?php
        foreach ($proveedores as $proveedor) {
            if ($proveedor) {

                echo '<tr>';
                echo '<td>' . $proveedor['id'] . '</td>';
                echo '<td>' . $proveedor['razon_social'] . '</td>';
                echo '<td>' . $proveedor['telefono'] . '</td>';
                echo '<td>' . $proveedor['email'] . '</td>';
                echo '<td>
                <a class ="btn btn-warning"
                href="' . base_url() . 'public/movimientosproveedores?proveedor_id=' . $proveedor['id'] . '">Movimientos
                </a>
                <a class ="btn btn-warning"
                href="' . base_url() . 'public/proveedores/editar/' . $proveedor['id'] . '">Editar
                </a>
                <a class ="btn btn-danger" onclick="return confirm(\'¿Seguro que desea eliminar este registro?\')"
                href="' . base_url() . 'public/proveedores/borrar/' . $proveedor['id'] . '">Borrar
                </a>
                
                </td>';
                echo '</tr>';
            } else {
                echo '<td class="colspan=6 text-center">No hay registros en lista</td>';
            }
        } ?>

    </tbody>
</table><br>