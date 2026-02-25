<?php

namespace App\Controllers;

use App\Models\ClientesModel;
use App\Models\UsuariosModel;

class Clientes extends BaseController
{
    protected $clientes;
    protected $clientesin;
    protected $usuarios;
    protected $sesion;

    public function __construct()
    {
        $this->clientes = new ClientesModel();
        $this->clientesin = new ClientesModel();
        $this->usuarios = new UsuariosModel();
        $this->sesion = session();
    }

    public function index($activo = 1, $inactivo = 0)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $clientes = $this->clientes->where('activo', $activo)->findAll();
        $clientesin = $this->clientes->where('activo', $inactivo)->findAll();
        $usuarios = $this->usuarios->where('activo', $inactivo)->findAll();
        $context = [
            'clientes' => $clientes,
            'clientesin' => $clientesin,
            'usuarios' => $usuarios,
            'titulo' => "Clientes",
            'pagname' => "Gestión/Clientes"
        ];

        echo view('panel/header', $context);
        echo view('clientes/listado', $context);
        echo view('panel/footer');
    }
    public function nuevo()
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $context = [
            'titulo' => "Nuevo cliente",
            'pagname' => 'Gestión/Nuevo cliente'
        ];

        echo view('panel/header', $context);
        echo view('clientes/nuevo');
        echo view('panel/footer');
    }
    public function guardar()
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $session = session();
        $id_usuario = $session->get('id_usuario');

        $this->clientes->save(
            [
                'nombre' => $this->request->getPost('nombre'),
                'apellido' => $this->request->getPost('apellido'),
                'telefono' => $this->request->getPost('telefono'),
                'email' => $this->request->getPost('email'),
                'direccion' => $this->request->getPost('direccion'),
                'id_usuario' => $id_usuario,
            ]
        );

        session()->setFlashdata('mensaje', 'Cliente creado correctamente');
        session()->setFlashdata('tipo', 'success');
        return redirect()->to(base_url() . 'public/clientes/');
    }
    public function borrar($id)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $this->clientes->delete($id);

        session()->setFlashdata('mensaje', 'Cliente dado de baja correctamente');
        session()->setFlashdata('tipo', 'warning');
        return redirect()->to(base_url() . 'public/clientes/');
    }
    public function editar($id)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $cliente = $this->clientes->where('id', $id)->findAll();
        $context = [
            'cliente' => $cliente,
            'titulo' => "Edición cliente",
            'pagname' => 'Gestión/Edición cliente'
        ];


        echo view('panel/header', $context);
        echo view('clientes/editar', $context);
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
            'telefono' => $this->request->getPost('telefono'),
            'email' => $this->request->getPost('email'),
            'direccion' => $this->request->getPost('direccion'),
            'usuario_id' => session()->get('usuario_id')
        ];

        $this->clientes->update($id, $data);

        session()->setFlashdata('mensaje', 'Cliente actualizado correctamente');
        session()->setFlashdata('tipo', 'success');
        return redirect()->to(base_url() . 'public/clientes/');
    }
}
