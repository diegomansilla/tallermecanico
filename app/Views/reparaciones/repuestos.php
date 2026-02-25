<form action="<?php echo base_url(); ?> public/reparaciones/guardarRepuesto" method="post">
    <input type="hidden" name="id_reparacion" value="<?= $reparacion['id']; ?>">

    <label for="id_repuesto">Repuesto</label>
    <select name="id_repuesto" id="id_repuesto" class="form-control">
        <?php foreach ($repuestos as $r): ?>
            <option value="<?= $r['id']; ?>">
                <?= $r['descripcion']; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="cantidad">Cantidad</label>
    <input type="number" name="cantidad" id="cantidad" class="form-control">

    <label for="costo_unitario">Costo Por Unidad</label>
    <input type="number" name="costo_unitario" id="costo_unitario" class="form-control">

    <button class="btn btn-success">Agregar</button>
</form>