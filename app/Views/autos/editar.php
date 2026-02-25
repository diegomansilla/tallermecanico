<form action="<?php echo base_url(); ?>public/autos/actualizar/<?php echo $auto[0]['id']; ?>" method="post">

    <label class="form-label" for="patente">Patente</label>
    <input class="form-control" type="text" name="patente" id="patente" placeholder="Ingrese patente" value="<?php echo $auto[0]['patente']; ?>">

    <label class="form-label" for="marca">Marca</label>
    <input class="form-control" type="text" name="marca" id="marca" placeholder="Ingrese marca" value="<?php echo $auto[0]['marca']; ?>">

    <label class="form-label" for="modelo">Modelo</label>
    <input class="form-control" type="text" name="modelo" id="modelo" placeholder="Ingrese un modelo" value="<?php echo $auto[0]['modelo']; ?>">

    <label class="form-label" for="anio">Año</label>
    <input class="form-control" type="text" name="anio" id="anio" placeholder="Ingrese un año" value="<?php echo $auto[0]['anio']; ?>">

    <label class="form-label" for="cliente">Cliente</label>
    <select class="form-control" id="id_cliente" name="id_cliente">
        <?php
        foreach ($clientes as $cliente) { ?>

            <option value="<?php echo $cliente['id']; ?>"
                <?php
                if ($cliente['id'] == $auto[0]['id_cliente']) {
                    echo 'selected';
                }
                ?>><?php echo $cliente['nombre']; ?> <?= $cliente['apellido'] ?></option>

        <?php } ?>
    </select><br>

    <input class="btn btn-success" type="submit" value="Guardar">
    <a class="btn btn-danger" href="<?php echo base_url(); ?>public/autos">Cancelar</a>
</form>