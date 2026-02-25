<?php

namespace App\Controllers;

use App\Models\ReparacionesModel;
use App\Models\AutosModel;
use App\Models\UsuariosModel;
use App\Models\RepuestosModel;
use App\Models\ReparacionRepuestosModel;
use App\Models\ClientesModel;

class Reparaciones extends BaseController
{
    protected $reparaciones;
    protected $reparacionesin;
    protected $autos;
    protected $usuarios;
    protected $repuestos;
    protected $reparacionrepuestos;
    protected $clientes;
    protected $sesion;

    public function __construct()
    {
        $this->reparaciones = new ReparacionesModel();
        $this->reparacionesin = new ReparacionesModel();
        $this->autos = new AutosModel();
        $this->usuarios = new UsuariosModel();
        $this->repuestos = new RepuestosModel();
        $this->reparacionrepuestos = new ReparacionRepuestosModel();
        $this->clientes = new ClientesModel();
        $this->sesion = session();
    }

    public function index($activo = 1, $inactivo = 0)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $reparaciones = $this->reparaciones->where('activo', $activo)->findAll();
        $reparacionesin = $this->reparaciones->where('activo', $inactivo)->findAll();
        $autos = $this->autos->where('activo', 1)->findAll();
        $usuarios = $this->usuarios->where('activo', 1)->findAll();
        $repuestos = $this->repuestos->where('activo', 1)->findAll();
        $reparacionrepuestos = $this->reparacionrepuestos->where('activo', 1)->findAll();
        $context = [
            'reparaciones' => $reparaciones,
            'reparacionesin' => $reparacionesin,
            'autos' => $autos,
            'usuarios' => $usuarios,
            'repuestos' => $repuestos,
            'reparacionrepuestos' => $reparacionrepuestos,
            'titulo' => "Reparaciones",
            'pagname' => "Gestión/reparaciones"
        ];

        echo view('panel/header', $context);
        echo view('reparaciones/listado', $context);
        echo view('panel/footer');
    }
    public function nuevo($activo = 1)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $autos = $this->autos->where('activo', $activo)->findAll();
        $usuarios = $this->usuarios->where('activo', $activo)->findAll();
        $repuestos = $this->repuestos->where('activo', $activo)->findAll();
        $reparacionrepuestos = $this->reparacionrepuestos->where('activo', $activo)->findAll();

        $context = [
            'titulo' => "Nueva Reparación",
            'pagname' => 'Gestión/Nuevo Reparación',
            'autos' => $autos,
            'usuarios' => $usuarios,
            'repuestos' => $repuestos,
            'reparacionrepuestos' => $reparacionrepuestos,
        ];

        echo view('panel/header', $context);
        echo view('reparaciones/nuevo');
        echo view('panel/footer');
    }
    public function guardar()
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $session = session();
        $id_usuario = $session->get('id_usuario');

        $this->reparaciones->save(
            [
                'id_auto' => $this->request->getPost('id_auto'),
                'descripcion' => $this->request->getPost('descripcion'),
                'fecha' => $this->request->getPost('fecha'),
                'monto' => $this->request->getPost('monto'),
                'id_usuario' => $id_usuario,
            ]
        );
        session()->setFlashdata('mensaje', 'Reparación creada correctamente');
        session()->setFlashdata('tipo', 'success');
        return redirect()->to(base_url() . 'public/reparaciones/');
    }
    public function borrar($id)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $this->reparaciones->delete($id);

        session()->setFlashdata('mensaje', 'Reparación dada de baja correctamente');
        session()->setFlashdata('tipo', 'warning');
        return redirect()->to(base_url() . 'public/reparaciones/');
    }
    public function editar($id)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $status = 1;
        $reparacion = $this->reparaciones->where('id', $id)->findAll();
        $autos = $this->autos->where('activo', $status)->findall();
        $repuestos = $this->repuestos->where('activo', $status)->findall();
        $context = [
            'reparacion' => $reparacion,
            'titulo' => "Edición Reparaciones",
            'pagname' => 'Gestión/Edición Reparaciones',
            'autos' => $autos,
            'repuestos' => $repuestos
        ];


        echo view('panel/header', $context);
        echo view('reparaciones/editar', $context);
        echo view('panel/footer');
    }
    public function actualizar($id)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $data = [
            'id_auto' => $this->request->getPost('id_auto'),
            'descripcion' => $this->request->getPost('descripcion'),
            'fecha' => $this->request->getPost('fecha'),
            'monto' => $this->request->getPost('monto'),
            'usuario_id' => session()->get('usuario_id'),
        ];

        $this->reparaciones->update($id, $data);

        session()->setFlashdata('mensaje', 'Reparación actualizada correctamente');
        session()->setFlashdata('tipo', 'success');
        return redirect()->to(base_url() . 'public/reparaciones/');
    }

    public function repuestos($id_reparacion)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $status = 1;
        $reparacion = $this->reparaciones->where('id', $id_reparacion)->first();
        $repuestos = $this->repuestos->where('activo', $status)->findall();

        $context = [
            'reparacion' => $reparacion,
            'repuestos' => $repuestos,
            'titulo' => 'Agregar Repuesto',
            'pagename' => 'Gestión/ Reparaciones/Repuestos'
        ];

        echo view('panel/header', $context);
        echo view('reparaciones/repuestos', $context);
        echo view('panel/footer');
    }

    public function guardarRepuesto()
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $subtotal = $this->request->getPost('cantidad') * $this->request->getPost('costo_unitario');

        $this->reparacionrepuestos->save([
            'id_reparacion' => $this->request->getPost('id_reparacion'),
            'id_repuesto' => $this->request->getPost('id_repuesto'),
            'cantidad' => $this->request->getPost('cantidad'),
            'costo_unitario' => $this->request->getPost('costo_unitario'),
            'subtotal' => $subtotal
        ]);
        return redirect()->to(base_url() . 'public/reparaciones/nuevo' . $this->request->getGetPost('id_reparacion'));
    }

    public function por_auto($activo = 1)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $autos = $this->autos->where('activo', $activo)->findAll();
        $reparaciones = $this->reparaciones->where('activo', $activo)->findAll();
        $clientes = $this->clientes->where('activo', $activo)->findAll();

        $context = [
            'autos' => $autos,
            'reparaciones' => $reparaciones,
            'clientes' => $clientes,
            'titulo' => 'Reporte Reparaciones por Auto',
            'pagname' => 'Reportes/Reparaciones por Auto',
        ];
        echo view('panel/header', $context);
        echo view('reparaciones/reparaciones_auto', $context);
        echo view('panel/footer');
    }
}
