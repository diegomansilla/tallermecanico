<form action="<?php echo base_url(); ?>public/clientes/actualizar/<?php echo $cliente[0]['id']; ?>" method="post">

    <label class="form-label" for="nombre">Nombre</label>
    <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Ingrese nombre" value="<?php echo $cliente[0]['nombre']; ?>">

    <label class="form-label" for="apellido">Apellido</label>
    <input class="form-control" type="text" name="apellido" id="apellido" placeholder="Ingrese apellido" value="<?php echo $cliente[0]['apellido']; ?>">

    <label class="form-label" for="telefono">Teléfono</label>
    <input class="form-control" type="text" name="telefono" id="telefono" placeholder="Ingrese teléfono" value="<?php echo $cliente[0]['telefono']; ?>">

    <label class="form-label" for="email">Email</label>
    <input class="form-control" type="text" name="email" id="email" placeholder="Ingrese una dirección mail" value="<?php echo $cliente[0]['email']; ?>">

    <label class="form-label" for="direccion">Dirección</label>
    <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Ingrese una dirección" value="<?php echo $cliente[0]['direccion']; ?>">
    <br>

    <input class="btn btn-success" type="submit" value="Guardar">
    <a class="btn btn-danger" href="<?php echo base_url(); ?>public/clientes">Cancelar</a>

</form>