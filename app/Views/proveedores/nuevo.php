<form action="<?php echo base_url(); ?>public/proveedores/guardar" method="post">

    <label class="form-label" for="razon_social">Razón Social</label>
    <input class="form-control" type="text" name="razon_social" id="razon_social" placeholder="Ingrese razón social" required>

    <label class="form-label" for="telefono">Teléfono</label>
    <input class="form-control" type="text" name="telefono" id="telefono" placeholder="Ingrese telefono" required>

    <label class="form-label" for="email">Email</label>
    <input class="form-control" type="text" name="email" id="email" placeholder="Ingrese una dirección mail" required>

<br>
<br>
    <input class="btn btn-success" type="submit" value="Guardar">
    <a class="btn btn-danger" href="<?php echo base_url(); ?>public/proveedores">Cancelar</a>

</form>