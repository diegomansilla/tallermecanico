<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Models\AutosModel;
use App\Models\ClientesModel;
use App\Models\ProveedoresModel;
use App\Models\ReparacionesModel;
use App\Models\FacturasModel;
use App\Models\MovimientosProveedoresModel;

class Panel extends BaseController
{
    protected $usuarios;
    protected $autos;
    protected $clientes;
    protected $proveedores;
    protected $reparaciones;
    protected $facturas;
    protected $movimientosproveedores;
    protected $sesion;
    public function __construct()
    {
        $this->usuarios = new UsuariosModel();
        $this->autos = new AutosModel();
        $this->clientes = new ClientesModel();
        $this->proveedores = new ProveedoresModel();
        $this->reparaciones = new ReparacionesModel();
        $this->facturas = new FacturasModel();
        $this->movimientosproveedores = new MovimientosProveedoresModel();
        $this->sesion = session();
    }

    public function index()
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $totalUsuarios = $this->usuarios->countAll();
        $totalAutos = $this->autos->countAll();
        $totalClientes = $this->clientes->countAll();
        $totalProveedores = $this->proveedores->countAll();
        $totalReparaciones = $this->reparaciones->countAll();

        $ingresos = $this->facturas->selectSum('monto')->where('estado_pago', 1)->first()['monto'] ?? 0;

        $egresos = $this->movimientosproveedores->selectSum('monto')->where('estado_pago', 1)->first()['monto'] ?? 0;

        $context = [
            'titulo' => 'Panel',
            'totalUsuarios' => $totalUsuarios,
            'totalAutos' => $totalAutos,
            'totalClientes' => $totalClientes,
            'totalProveedores' => $totalProveedores,
            'totalReparaciones' => $totalReparaciones,
            'ingresos' => $ingresos,
            'egresos' => $egresos
        ];


        echo view('panel/header', $context);
        echo view('panel/contenido', $context);
        echo view('panel/footer');
    }

    public function nuevo()
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }
        $contex['titulo'] = "Panel"; //los valores de contexto pueden ser cualquier tipo de dato, siempre tiene que tener
        $contex['subtitulo'] = "Este es el panel de control";
        $contex['pagname'] = "Panel de control";
        echo view('inicio', $contex);
        echo view('nuevo', $contex); //se envia la variable de contexto a esta vista
        echo view('fin');
    }
}
