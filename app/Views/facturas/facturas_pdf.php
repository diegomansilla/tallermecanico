<h2>Factura de Clientes</h2>
<hr>
<p><b>Cliente: </b><?= $cliente['nombre'] ?></p>
<p><b>Reparación: </b><?= $reparacion['descripcion'] ?></p>
<p><b>Monto: $</b><?= $factura['monto'] ?></p>
<p><b>Fecha: </b><?= $factura['fecha']??date('Y-m-d') ?></p>

<hr>
<p>Gracias por confiar en nuestros Servicios</p>