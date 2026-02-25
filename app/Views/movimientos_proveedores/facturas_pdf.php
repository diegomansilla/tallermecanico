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

<h2>Factura Proveedores</h2>
<hr>
<p><b>Proveedor: </b><?= $prov['razon_social'] ?></p>
<p><b>Tipo de Factura: </b><?= $tipos_facturas[$mov['tipo_factura']] ?? $mov['tipo_factura'] ?></p>
<p><b>Número: </b><?= $mov['numero'] ?></p>
<p><b>Monto: $</b><?= $mov['monto'] ?></p>
<p><b>Fecha: </b><?= $mov['fecha']??date('Y-m-d') ?></p>
<p><b>Concepto: </b><?= $mov['observaciones'] ?></p>
<p><b>Método de Pago: </b><?= $mov['metodo_pago'] ?></p>

<hr>
<p>Gracias por confiar en nuestros Servicios</p>