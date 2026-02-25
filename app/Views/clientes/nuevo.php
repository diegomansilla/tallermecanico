<form action="<?php echo base_url(); ?>public/clientes/guardar" method="post">

    <label class="form-label" for="nombre">Nombre</label>
    <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Ingrese nombre" required>

    <label class="form-label" for="apellido">Apellido</label>
    <input class="form-control" type="text" name="apellido" id="apellido" placeholder="Ingrese apellido" required>

    <label class="form-label" for="telefono">Teléfono</label>
    <input class="form-control" type="text" name="telefono" id="telefono" placeholder="Ingrese teléfono" required>

    <label class="form-label" for="email">Email</label>
    <input class="form-control" type="text" name="email" id="email" placeholder="Ingrese una dirección mail" required>
    
    <label class="form-label" for="direccion">Dirección</label>
    <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Ingrese una dirección" required>


<br>
    <input class="btn btn-success" type="submit" value="Guardar">
    <a class="btn btn-danger" href="


<?php echo base_url(); ?>public/clientes">Cancelar</a>

</form>