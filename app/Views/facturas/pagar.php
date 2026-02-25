<p><b>Cliente: </b><?= $cliente['nombre'] ?></p>
<p><b>Reparación: </b><?= $reparacion['descripcion'] ?></p>
<p><b>Monto: $</b><?= $factura['monto'] ?></p>

<form method="POST" action="<?= base_url().'public/facturas/confirmar_pago' ?>">
    <input type="hidden" name="factura_id" value="<?= $factura['id'] ?>">
    
    <label for="metodo_pago">Método de Pago</label>
    <select name="metodo_pago" id="metodo_pago" class="form-control">
        <option value="efectivo">Efectivo</option>
        <option value="transferencia">Transferencia</option>
        <option value="tarjeta">Tarjeta</option>
    </select>

    <br>
    
    <button class="btn btn-success">Confirmar</button>
    <a class="btn btn-secondary" href="<?= base_url().'public/facturas' ?>">Cancelar</a>
</form>