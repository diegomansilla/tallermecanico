<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class Usuarios extends BaseController
{
    protected $usuarios;
    protected $usuariosin;
    protected $sesion;

    public function __construct()
    {
        $this->usuarios = new UsuariosModel();
        $this->usuariosin = new UsuariosModel();
        $this->sesion = session();
    }

    public function index($activo = 1, $inactivo = 0)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $usuarios = $this->usuarios->where('activo', $activo)->findAll();
        $usuariosin = $this->usuarios->where('activo', $inactivo)->findAll();
        $context = [
            'usuarios' => $usuarios,
            'usuariosin' => $usuariosin,
            'titulo' => "Usuarios",
            'pagname' => "Gestión/Usuarios"
        ];

        echo view('panel/header', $context);
        echo view('usuarios/listado', $context);
        echo view('panel/footer');
    }
    public function nuevo()
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $context = [
            'titulo' => "Nuevo usuario",
            'pagname' => 'Gestión/Nuevo usuario'
        ];

        echo view('panel/header', $context);
        echo view('usuarios/nuevo');
        echo view('panel/footer');
    }
    public function guardar()
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        $this->usuarios->save(
            [
                'nombre' => $this->request->getPost('nombre'),
                'apellido' => $this->request->getPost('apellido'),
                'dni' => $this->request->getPost('dni'),
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'password' => $hash,
                'rol' => $this->request->getPost('rol'),
            ]
        );
        session()->setFlashdata('mensaje', 'Usuario creado correctamente');
        session()->setFlashdata('tipo', 'success');
        return redirect()->to(base_url() . 'public/usuarios/');
    }
    public function borrar($id)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $this->usuarios->delete($id);

        session()->setFlashdata('mensaje', 'Usuario dado de baja correctamente');
        session()->setFlashdata('tipo', 'warning');
        return redirect()->to(base_url() . 'public/usuarios/');
    }
    public function editar($id)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $usuario = $this->usuarios->where('id', $id)->findAll();
        $context = [
            'usuario' => $usuario,
            'titulo' => "Edición usuario",
            'pagname' => 'Gestión/Edición usuario'
        ];


        echo view('panel/header', $context);
        echo view('usuarios/editar');
        echo view('panel/footer');
    }
    public function actualizar($id)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }



        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'dni' => $this->request->getPost('dni'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'rol' => $this->request->getPost('rol'),
        ];

        //Verificar si se ingresó una nueva contraseña
        $clave_nueva = $this->request->getPost('password');
        if (!empty($clave_nueva)) {

            $hash = password_hash($clave_nueva, PASSWORD_DEFAULT);
            $data['password'] = $hash;
        }



        $this->usuarios->update($id, $data);

        session()->setFlashdata('mensaje', 'Usuario actualizado correctamente');
        session()->setFlashdata('tipo', 'success');
        return redirect()->to(base_url() . 'public/usuarios/');
    }
}
