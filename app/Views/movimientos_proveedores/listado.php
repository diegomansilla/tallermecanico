<br>
<br>
<a class="btn btn-primary" href="<?php echo base_url(); ?>public/movimientosproveedores/nuevo?proveedor_id=<?= $proveedor_id ?>">+ Nuevo movimiento</a>
<br>
<br>

<?php
$tipos_facturas = [
    'fa' => 'Factura A',
    'fb' => 'Factura B',
    'fc' => 'Factura C',
    'nod' => 'Nota de Débito',
    'noc' => 'Nota de Crédito',
    'rec' => 'Recibo'
];
?>

<table class="table table-hover" id="contenido-lista">
    <thead>
        <th>Proveedor</th>
        <th>Tipo de Factura</th>
        <th>Número</th>
        <th>Fecha</th>
        <th>Monto</th>
        <th>Observaciones</th>
        <th>Usuario que registró</th>
        <th>Acciones</th>

    </thead>

    <tbody>
        <?php
        foreach ($movimientosproveedores as $movimientosproveedor) {
            if ($movimientosproveedor) {

                echo '<tr>';
                $proveedorNombre = '';
                foreach ($proveedores as $proveedor) {
                    if ($proveedor['id'] == $movimientosproveedor['id_proveedor']) {
                        $proveedorNombre = $proveedor['razon_social'];
                        break;
                    }
                }

                echo '<td>' . $proveedorNombre . '</td>';
                echo '<td>' . $tipos_facturas[$movimientosproveedor['tipo_factura']] ?? $movimientosproveedor['tipo_factura'] . '</td>';
                echo '<td>' . $movimientosproveedor['numero'] . '</td>';
                echo '<td>' . $movimientosproveedor['fecha'] . '</td>';
                echo '<td>' . $movimientosproveedor['monto'] . '</td>';
                echo '<td>' . $movimientosproveedor['observaciones'] . '</td>';
                $usuarioNombre = '';
                foreach ($usuarios as $usuario) {
                    if ($usuario['id'] == $movimientosproveedor['id_usuario']) {
                        $usuarioNombre = $usuario['nombre'] . " " . $usuario['apellido'];
                        break;
                    }
                }
                echo '<td>' . $usuarioNombre . '</td>';

                echo '<td>';
                if ($movimientosproveedor['estado_pago'] == 0) {
                    echo '<a class="btn btn-success" href="'.base_url().'public/movimientosproveedores/pagar/'.$movimientosproveedor['id'].'">Pagar</a>';
                } else {
                    echo '<a class="btn btn-secondary" disabled>Pagado</a>';
                    echo '<a class="btn btn-warning" href="' . base_url() . 'public/movimientosproveedores/imprimir/' . $movimientosproveedor['id'] . '" target="_blank">Imprimir</a>';
                }
                echo '<a class ="btn btn-warning"
                href="' . base_url() . 'public/proveedores/editar/' . $movimientosproveedor['id'] . '">Editar
                </a>
                <a class ="btn btn-danger" onclick="return confirm(\'¿Seguro que desea eliminar este registro?\')"
                href="' . base_url() . 'public/proveedores/borrar/' . $movimientosproveedor['id'] . '">Borrar
                </a>
                
                </td>';
                echo '</tr>';
            } else {
                echo '<td class="colspan=6 text-center">No hay registros en lista</td>';
            }
        } ?>

    </tbody>
</table><br>