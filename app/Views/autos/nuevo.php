<form action="<?php echo base_url(); ?>public/autos/guardar" method="post">

    <label class="form-label" for="patente">Patente</label>
    <input class="form-control" type="text" name="patente" id="patente" placeholder="Ingrese patente" required>

    <label class="form-label" for="marca">Marca</label>
    <input class="form-control" type="text" name="marca" id="marca" placeholder="Ingrese marca" required>

    <label class="form-label" for="modelo">Modelo</label>
    <input class="form-control" type="text" name="modelo" id="modelo" placeholder="Ingrese un modelo" required>

    <label class="form-label" for="anio">Año</label>
    <input class="form-control" type="text" name="anio" id="anio" placeholder="Ingrese el año de Fabricación" required>

    <label class="form-label" for="cliente">Cliente</label>
    <select class="form-control" id="id_cliente" name="id_cliente" required>
        <?php
        foreach ($clientes as $cliente) {
            echo '<option value="' . $cliente['id'] . '">' . $cliente['nombre'] . ' ' . $cliente['apellido'] . '</option>';
        }
        ?>
    </select><br>


    <input class="btn btn-success" type="submit" value="Guardar">
    <a class="btn btn-danger" href="<?php echo base_url(); ?>public/autos">Cancelar</a>

</form>