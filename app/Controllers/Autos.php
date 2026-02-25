<?php

namespace App\Controllers;

use App\Models\AutosModel;
use App\Models\ClientesModel;
use App\Models\UsuariosModel;

class Autos extends BaseController
{
    protected $autos;
    protected $autosin;
    protected $sesion;
    protected $clientes;
    protected $usuarios;

    public function __construct()
    {
        $this->autos = new AutosModel();
        $this->autosin = new AutosModel();
        $this->sesion = session();
        $this->clientes = new ClientesModel();
        $this->usuarios = new UsuariosModel();
    }

    public function index($activo = 1, $inactivo = 0)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $autos = $this->autos->where('activo', $activo)->findAll();
        $autosin = $this->autos->where('activo', $inactivo)->findAll();
        $clientes = $this->clientes->where('activo', $activo)->findAll();
        $usuarios = $this->usuarios->where('activo', $activo)->findAll();

        $context = [
            'autos' => $autos,
            'autosin' => $autosin,
            'clientes' => $clientes,
            'usuarios' => $usuarios,
            'titulo' => "Autos",
            'pagname' => "Gestión/Autos"
        ];

        echo view('panel/header', $context);
        echo view('autos/listado', $context);
        echo view('panel/footer');
    }
    public function nuevo($activo = 1)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $clientes = $this->clientes->where('activo', $activo)->findAll();

        $context = [
            'titulo' => "Nuevo auto",
            'pagname' => 'Gestión/Nuevo auto',
            'clientes' => $clientes
        ];

        echo view('panel/header', $context);
        echo view('autos/nuevo', $context);
        echo view('panel/footer');
    }
    public function guardar()
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $session = session();
        $id_usuario = $session->get('id_usuario');

        $this->autos->save(
            [
                'id_cliente' => $this->request->getPost('id_cliente'),
                'patente' => $this->request->getPost('patente'),
                'marca' => $this->request->getPost('marca'),
                'modelo' => $this->request->getPost('modelo'),
                'anio' => $this->request->getPost('anio'),
                'estado' => "En Reparación",
                'id_usuario' => $id_usuario,
            ]
        );

        session()->setFlashdata('mensaje', 'Auto creado correctamente');
        session()->setFlashdata('tipo', 'success');
        return redirect()->to(base_url() . 'public/autos/');
    }
    public function borrar($id)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $this->autos->delete($id);

        session()->setFlashdata('mensaje', 'Auto dado de baja correctamente');
        session()->setFlashdata('tipo', 'warning');
        return redirect()->to(base_url() . 'public/autos/');
    }
    public function editar($id)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $status = 1;
        $auto = $this->autos->where('id', $id)->findAll();
        $clientes = $this->clientes->where('activo', $status)->findall();
        $context = [
            'auto' => $auto,
            'clientes' => $clientes,
            'titulo' => "Edición Auto",
            'pagname' => 'Gestión/Edición Auto'
        ];


        echo view('panel/header', $context);
        echo view('autos/editar', $context);
        echo view('panel/footer');
    }
    public function actualizar($id)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }


        $data = [
            'id_cliente' => $this->request->getPost('id_cliente'),
            'patente' => $this->request->getPost('patente'),
            'marca' => $this->request->getPost('marca'),
            'modelo' => $this->request->getPost('modelo'),
            'anio' => $this->request->getPost('anio'),
            'usuario_id' => session()->get('usuario_id')
        ];

        $this->autos->update($id, $data);

        session()->setFlashdata('mensaje', 'Auto actualizado correctamente');
        session()->setFlashdata('tipo', 'success');
        return redirect()->to(base_url() . 'public/autos/');
    }

    public function autos_por_cliente($activo = 1)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $clientes = $this->clientes->where('activo', $activo)->findAll();
        $autos = $this->autos->where('activo', $activo)->findAll();

        $context = [
            'clientes' => $clientes,
            'autos' => $autos,
            'titulo' => 'Autos por Cliente',
            'pagname' => 'Reportes/Autos por Cliente'
        ];

        echo view('panel/header', $context);
        echo view('autos/autos_cliente', $context);
        echo view('panel/footer');
    }
}
