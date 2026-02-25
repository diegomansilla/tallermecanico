<a class="btn btn-secondary" href="<?php echo base_url(); ?>public/reparaciones">Volver</a>
<br>
<br>
<table class="table table-hover" id="contenido-lista">
    <thead>
        <th>Cliente</th>
        <th>Auto</th>
        <th>Reparaciones</th>
        <th>Total</th>
    </thead>
    <tbody>
        <?php foreach ($autos as $auto) {
            $clienteNombre = '';
            foreach ($clientes as $cliente) {
                if ($cliente['id'] == $auto['id_cliente']) {
                    $clienteNombre = $cliente['nombre'];
                    break;
                }
            }
            $total = 0;
            $lista = '';

            foreach ($reparaciones as $rep) {
                if ($rep['id_auto'] == $auto['id']) {
                    $lista .= $rep['descripcion'] . ' ($' . $rep['monto'] . ')"<br>';
                    $total += $rep['monto'];
                }
            }
            if ($lista != '') {
                echo '<tr>
                <td>' . $clienteNombre . '</td>
                <td>' . $auto['marca'] . ' ' . $auto['modelo'] . '</td>
                <td>' . $lista . '</td>
                <td>$' . $total . '</td>
                </tr>';
            }
        } ?>
    </tbody>
</table>