<br>
<br>
<a class="btn btn-primary" href="<?php echo base_url(); ?>public/facturas/nuevo?reparacion_id=<?= $reparacion_id ?>">+ Nueva Factura</a>
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
        <th>Cliente</th>
        <th>Reparación</th>
        <th>Tipo de Factura</th>
        <th>Monto</th>
        <th>Usuario que registró</th>
        <th>Acciones</th>

    </thead>

    <tbody>
        <?php
        foreach ($facturas as $factura) {
            if ($factura) {

                echo '<tr>';
                $ClienteNombre = '';
                foreach ($clientes as $cliente) {
                    if ($cliente['id'] == $factura['id_cliente']) {
                        $ClienteNombre = $cliente['nombre'] . " " . $cliente['apellido'];
                        break;
                    }
                }

                echo '<td>' . $ClienteNombre . '</td>';
                $reparacionNombre = '';
                foreach ($reparaciones as $reparacion) {
                    if ($reparacion['id'] == $factura['id_reparacion']) {
                        $reparacionNombre = $reparacion['descripcion'];
                        break;
                    }
                }

                echo '<td>' . $reparacionNombre . '</td>';
                echo '<td>' . $tipos_facturas[$factura['tipo_factura']] ?? $factura['tipo_factura'] . '</td>';
                echo '<td>' . $factura['monto'] . '</td>';
                $usuarioNombre = '';
                foreach ($usuarios as $usuario) {
                    if ($usuario['id'] == $factura['id_usuario']) {
                        $usuarioNombre = $usuario['nombre'] . " " . $usuario['apellido'];
                        break;
                    }
                }
                echo '<td>' . $usuarioNombre . '</td>';

                echo '<td>';
                if ($factura['estado_pago'] == 1) {
                    echo '<button class="btn btn-secondary" disabled>Pagada</button>';
                    echo '<a class="btn btn-warning" href="' . base_url() . 'public/facturas/imprimir/' . $factura['id'] . '" target="_blank">Imprimir</a>';
                } else {
                    echo '<a class="btn btn-success" href="' . base_url() . 'public/facturas/pagar/' . $factura['id'] . '">Pagar</a>';
                }
                echo '<a class ="btn btn-warning" href="' . base_url() . 'public/facturas/editar/' . $factura['id'] . '">Editar</a>
                </td>';
                echo '</tr>';
            } else {
                echo '<td class="colspan=6 text-center">No hay registros en lista</td>';
            }
        } ?>

    </tbody>
</table><br>