<?php

namespace App\Controllers;

use App\Models\ProveedoresModel;
use App\Models\UsuariosModel;

class Proveedores extends BaseController
{
    protected $proveedores;
    protected $proveedoresin;
    protected $usuarios;
    protected $sesion;

    public function __construct()
    {
        $this->proveedores = new ProveedoresModel();
        $this->proveedoresin = new ProveedoresModel();
        $this->usuarios = new UsuariosModel();
        $this->sesion = session();
    }

    public function index($activo = 1, $inactivo = 0)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $proveedores = $this->proveedores->where('activo', $activo)->findAll();
        $proveedoresin = $this->proveedores->where('activo', $inactivo)->findAll();
        $usuarios = $this->usuarios->where('activo', $inactivo)->findAll();

        $context = [
            'proveedores' => $proveedores,
            'proveedoresin' => $proveedoresin,
            'usuarios' => $usuarios,
            'titulo' => "Proveedores",
            'pagname' => "Gestión/proveedores"
        ];

        echo view('panel/header', $context);
        echo view('proveedores/listado', $context);
        echo view('panel/footer');
    }
    public function nuevo($activo = 1)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $context = [
            'titulo' => "Nuevo proveedor",
            'pagname' => 'Gestión/Nuevo proveedor'
        ];

        echo view('panel/header', $context);
        echo view('proveedores/nuevo');
        echo view('panel/footer');
    }
    public function guardar()
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $session = session();
        $id_usuario = $session->get('id_usuario');

        $this->proveedores->save(
            [
                'razon_social' => $this->request->getPost('razon_social'),
                'telefono' => $this->request->getPost('telefono'),
                'email' => $this->request->getPost('email'),
                'id_usuario' => $id_usuario
            ]
        );
        session()->setFlashdata('mensaje', 'Proveedor creado correctamente');
        session()->setFlashdata('tipo', 'success');
        return redirect()->to(base_url() . 'public/proveedores/');
    }

    public function borrar($id)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $this->proveedores->delete($id);

        session()->setFlashdata('mensaje', 'Proveedor dado de baja correctamente');
        session()->setFlashdata('tipo', 'warning');
        return redirect()->to(base_url() . 'public/proveedores/');
    }

    public function editar($id)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $proveedor = $this->proveedores->where('id', $id)->findAll();
        $context = [
            'proveedor' => $proveedor,
            'titulo' => "Edición proveedor",
            'pagname' => 'Gestión/Edición proveedor'
        ];


        echo view('panel/header', $context);
        echo view('proveedores/editar', $context);
        echo view('panel/footer');
    }

    public function actualizar($id)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }


        $data = [
            'razon_social' => $this->request->getPost('razon_social'),
            'telefono' => $this->request->getPost('telefono'),
            'email' => $this->request->getPost('email'),
            'usuario_id' => session()->get('usuario_id'),
        ];


        $this->proveedores->update($id, $data);

        session()->setFlashdata('mensaje', 'Proveedor actualizado correctamente');
        session()->setFlashdata('tipo', 'success');
        return redirect()->to(base_url() . 'public/proveedores/');
    }
}
