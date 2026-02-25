<form action="<?php echo base_url(); ?>public/proveedores/actualizar/<?php echo $proveedor[0]['id']; ?>" method="post">

    <label class="form-label" for="razon_social">Razón Social</label>
    <input class="form-control" type="text" name="razon_social" id="razon_social" placeholder="Ingrese razón social" value="<?php echo $proveedor[0]['razon_social']; ?>">

    <label class="form-label" for="telefono">Teléfono</label>
    <input class="form-control" type="text" name="telefono" id="telefono" placeholder="Ingrese telefono" value="<?php echo $proveedor[0]['telefono']; ?>">

    <label class="form-label" for="email">Email</label>
    <input class="form-control" type="text" name="email" id="email" placeholder="Ingrese una dirección mail" value="<?php echo $proveedor[0]['email']; ?>">

    <input class="btn btn-success" type="submit" value="Guardar">
    <a class="btn btn-danger" href="<?php echo base_url(); ?>public/proveedores">Cancelar</a>

</form>