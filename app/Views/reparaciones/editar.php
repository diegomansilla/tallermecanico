<form action="<?php echo base_url(); ?>public/reparaciones/actualizar/<?php echo $reparacion[0]['id']; ?>" method="post">

    <label class="form-label" for="auto">Auto</label>
    <select class="form-control" id="id_auto" name="id_auto">
        <?php
        foreach ($autos as $auto) { ?>

            <option value="<?php echo $auto['id']; ?>"
                <?php
                if ($auto['id'] == $reparacion[0]['id_auto']) {
                    echo 'selected';
                }
                ?>><?php echo $auto['patente'] . " - " . $auto['marca'] . " - " . $auto['modelo']; ?></option>

        <?php } ?>
    </select>

    <label class="form-label" for="descripcion">Descripción</label>
    <textarea class="form-control" name="descripcion" id="descripcion"><?php echo $reparacion[0]['descripcion']; ?></textarea>
    
    <label class="form-label" for="fecha">Fecha</label>
    <input class="form-control" type="date" name="fecha" id="fecha" placeholder="Ingrese una dirección mail" value="<?php echo $reparacion[0]['fecha']; ?>">

    <label class="form-label" for="monto">Monto</label>
    <input class="form-control" type="number" name="monto" id="monto" placeholder="Ingrese una dirección mail" value="<?php echo $reparacion[0]['monto']; ?>">

    <br>
    <br>
    <input class="btn btn-success" type="submit" value="Guardar">
    <a class="btn btn-danger" href="<?php echo base_url(); ?>public/reparaciones">Cancelar</a>

</form>