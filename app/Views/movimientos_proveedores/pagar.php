<?php

use App\Controllers\MovimientosProveedores; ?>
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
<hr>
<p><b>proveedor: </b><?= $prov['razon_social'] ?></p>
<p><b>Tipo de Factura: </b><?= $tipos_facturas[$mov['tipo_factura']] ?? $mov['tipo_factura'] ?></p>
<p><b>Número: </b><?= $mov['numero'] ?></p>
<p><b>Monto: $</b><?= $mov['monto'] ?></p>
<p><b>Concepto: </b><?= $mov['observaciones'] ?></p>

<form action="<?= base_url() . 'public/movimientosproveedores/confirmar_pago' ?>" method="post">

<input type="hidden" name="movimiento_id" value="<?= $mov['id'] ?>">

    <label for="metodo_pago">Método de Pago</label>
    <select name="metodo_pago" id="metodo_pago" class="form-control">
        <option value="efectivo">Efectivo</option>
        <option value="transferencia">Transferencia</option>
        <option value="tarjeta">Tarjeta</option>
    </select>

    <hr>
    <br>
    <button class="btn btn-success">Confirmar</button>
    <a class="btn btn-secondary" href="<?= base_url() . 'public/movimientosproveedores' ?>">Cancelar</a>
</form>