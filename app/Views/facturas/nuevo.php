<form action="<?php echo base_url(); ?>public/facturas/guardar" method="post">

    <input type="hidden" name="reparacion_id" value="<?= $reparacion['id'] ?>">
    <input type="hidden" name="id_cliente" value="<?= $clientes['id'] ?>">

    <label for="cliente_id">Cliente</label>
    <input type="text" name="cliente_id" id="cliente_id" class="form-control" placeholder="Cliente" value="<?= $clientes['nombre'] . " " . $clientes['apellido'] ?>" readonly>

    <label for="reparacion_ic">Reparación</label>
    <input type="text" name="reparacion_ic" id="reparacion_ic" class="form-control" placeholder="Reparación" value="<?= $reparacion['descripcion'] ?>" readonly>

    <label class="form-label" for="tipo_factura">Tipo de Factura</label>
    <select name="tipo_factura" id="tipo_factura" class="form-control" required>
        <option value="">Seleccione una opción</option>
        <option value="fa">Factura A</option>
        <option value="fb">Factura B</option>
        <option value="fc">Factura C</option>
        <option value="nod">Nota de Débito</option>
        <option value="noc">Nota de Crédito</option>
        <option value="rec">Recibo</option>
    </select>

    <label class="form-label" for="monto">Monto</label>
    <input class="form-control" type="number" name="monto" id="monto" placeholder="Ingrese un monto" required>

    <br>
    <br>
    <input class="btn btn-success" type="submit" value="Guardar">
    <a class="btn btn-danger" href="<?php echo base_url(); ?>public/proveedores/' . $proveedor['id'] . '/movimientos">Cancelar</a>

</form>