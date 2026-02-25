<form action="<?php echo base_url(); ?>public/movimientosproveedores/guardar" method="post">

    <input type="hidden" name="proveedor_id" value="<?= $proveedor_id ?>">

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

    <label class="form-label" for="numero">Número de Factura</label>
    <input class="form-control" type="text" name="numero" id="numero" placeholder="Ingrese Nro de Factura" required>

    <label class="form-label" for="fecha">Fecha</label>
    <input class="form-control" type="date" name="fecha" id="fecha" placeholder="Ingrese una fecha" required>

    <label class="form-label" for="monto">Monto</label>
    <input class="form-control" type="number" name="monto" id="monto" placeholder="Ingrese un monto" required>

    <label class="form-label" for="observaciones">Observaciones</label>
    <textarea name="observaciones" id="observaciones" class="form-control"></textarea>

    <br>
    <br>
    <input class="btn btn-success" type="submit" value="Guardar">
    <a class="btn btn-danger" href="<?php echo base_url(); ?>public/proveedores/' . $proveedor['id'] . '/movimientos">Cancelar</a>

</form>