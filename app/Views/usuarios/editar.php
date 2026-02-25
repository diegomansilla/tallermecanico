<form action="<?php echo base_url(); ?>public/usuarios/actualizar/<?php echo $usuario[0]['id']; ?>" method="post">

    
    <label class="form-label" for="nombre">Nombre</label>
    <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Ingrese nombre" value="<?php echo $usuario[0]['nombre']; ?>" required>
    
    <label class="form-label" for="apellido">Apellido</label>
    <input class="form-control" type="text" name="apellido" id="apellido" placeholder="Ingrese apellido" value="<?php echo $usuario[0]['apellido']; ?>" required>
    
    <label class="form-label" for="dni">D.N.I.</label>
    <input class="form-control" type="text" name="dni" id="dni" placeholder="Ingrese DNI" value="<?php echo $usuario[0]['dni']; ?>" required>
    
    <label class="form-label" for="email">Email</label>
    <input class="form-control" type="text" name="email" id="email" placeholder="Ingrese una dirección mail" value="<?php echo $usuario[0]['email']; ?>" required>
    
    <label class="form-label" for="username">Nombre de Usuario</label>
    <input class="form-control" type="text" name="username" id="username" placeholder="Ingrese un nombre de usuario" value="<?php echo $usuario[0]['username']; ?>" required>
    
    <label class="form-label" for="password">Contraseña</label>
    <input class="form-control" type="password" name="password" id="password" placeholder="SOLO ingrese una Clave SI DESEA CAMBIARLA, de lo contrario, DEJE VACÍO este campo" required>
    
    <label class="form-label" for="rol"></label>
    <input class="form-control" type="text" name="rol" id="rol" placeholder="Ingrese el Rol asignado" value="<?php echo $usuario[0]['rol']; ?>" required><br>
    
    <input class="btn btn-success" type="submit" value="Guardar">
    <a class="btn btn-danger" href="<?php echo base_url(); ?>public/usuarios">Cancelar</a>

</form>