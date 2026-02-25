<form action="<?php echo base_url(); ?>public/reparaciones/guardar" method="post">

<input type="hidden" name="usuario_id" id="usuario_id">

    <label class="form-label" for="auto">Auto</label>
    <select class="form-control" id="id_auto" name="id_auto" required>
        <?php
        foreach ($autos as $auto) {
            echo '<option value="' . $auto['id'] . '">' . $auto['patente'] . 
            " - " . $auto['marca'] . " - " . $auto['modelo'] . '</option>';
        }
        ?>
    </select>

    <label class="form-label" for="descripcion">Descripción</label>
    <textarea class="form-control" name="descripcion" id="descripcion" required></textarea>
    
    <label class="form-label" for="fecha">Fecha</label>
    <input class="form-control" type="date" name="fecha" id="fecha" placeholder="Ingrese una fecha" required>

    <label class="form-label" for="monto">Monto</label>
    <input class="form-control" type="number" name="monto" id="monto" placeholder="Ingrese un monto" required>

    <br>
    <br>
    <input class="btn btn-success" type="submit" value="Guardar">
    <a class="btn btn-danger" href="<?php echo base_url(); ?>public/reparaciones">Cancelar</a>

</form>