<form action="<?php echo base_url(); ?>public/usuarios/guardar" method="post">

    <label class="form-label" for="nombre">Nombre</label>
    <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Ingrese nombre" required>

    <label class="form-label" for="apellido">Apellido</label>
    <input class="form-control" type="text" name="apellido" id="apellido" placeholder="Ingrese apellido" required>

    <label class="form-label" for="dni">D.N.I.</label>
    <input class="form-control" type="text" name="dni" id="dni" placeholder="Ingrese DNI" required>

    <label class="form-label" for="email">Email</label>
    <input class="form-control" type="text" name="email" id="email" placeholder="Ingrese una dirección mail" required>
   
    <label class="form-label" for="username">Nombre de Usuario</label>
    <input class="form-control" type="text" name="username" id="username" placeholder="Ingrese un nombre de usuario" required>

    <label class="form-label" for="password">Contraseña</label>
    <input class="form-control" type="password" name="password" id="password" placeholder="Ingrese una Clave" required>

    <label class="form-label" for="rol"></label>
    <input class="form-control" type="text" name="rol" id="rol" placeholder="Ingrese el Rol asignado" required>


<br>
<br>
    <input class="btn btn-success" type="submit" value="Guardar">
    <a class="btn btn-danger" href="<?php echo base_url(); ?>public/usuarios">Cancelar</a>

</form>