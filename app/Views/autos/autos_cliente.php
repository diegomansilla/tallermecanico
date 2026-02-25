<a class="btn btn-secondary" href="<?php echo base_url(); ?>public/autos">Volver</a>
<br>
<br>
<table class="table table-hover" id="contenido-lista">
    <thead>
        <th>Cliente</th>
        <th>Autos</th>
        <th>Cantidad</th>
    </thead>
    <tbody>
        <?php foreach ($clientes as $cliente) {
            $lista = '';
            $cant = 0;

            foreach ($autos as $auto) {
                if ($auto['id_cliente'] == $cliente['id']) {
                    $lista = $auto['marca'] . ' ' . $auto['modelo'] . '<br>';
                    $cant++;
                }
            }

            if ($cant > 0) {
                echo '<tr>
                <td>' . $cliente['nombre'] . '</td>
                <td>' . $lista . '</td>
                <td>' . $cant . '</td>
                </tr>';
            }
        } ?>
    </tbody>
</table>