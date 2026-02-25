<?php

namespace App\Controllers;

require_once FCPATH.'../vendor/autoload.php';

use App\Models\MovimientosProveedoresModel;
use App\Models\ProveedoresModel;
use App\Models\UsuariosModel;
use Dompdf\Dompdf;

class MovimientosProveedores extends BaseController
{
    protected $movimientosproveedores;
    protected $movimientosproveedoresin;
    protected $proveedores;
    protected $usuarios;
    protected $sesion;

    public function __construct()
    {
        $this->movimientosproveedores = new MovimientosProveedoresModel();
        $this->movimientosproveedoresin = new MovimientosProveedoresModel();
        $this->proveedores = new ProveedoresModel();
        $this->usuarios = new UsuariosModel();
        $this->sesion = session();
    }

    public function index($activo = 1, $inactivo = 0)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $movimientosproveedores = $this->movimientosproveedores->where('activo', $activo)->findAll();
        $movimientosproveedoresin = $this->movimientosproveedores->where('activo', $inactivo)->findAll();
        $proveedores = $this->proveedores->where('activo', $activo)->findAll();
        $usuarios = $this->usuarios->where('activo', $activo)->findAll();

        $proveedor_id = $this->request->getGet('proveedor_id');

        if ($proveedor_id) {
            $movimientos = $this->movimientosproveedores->where('id_proveedor', $proveedor_id)->where('activo', $activo)->findAll();
        } else {
            $movimientos = $this->movimientosproveedores->where('activo', $inactivo)->findAll();
        }
        $context = [
            'proveedor_id' => $proveedor_id,
            'movimientosproveedores' => $movimientosproveedores,
            'movimientosproveedoresin' => $movimientosproveedoresin,
            'proveedores' => $proveedores,
            'usuarios' => $usuarios,
            'titulo' => "Movimientos de Proveedores",
            'pagname' => "Gestión/MovimientosProveedores"
        ];

        echo view('panel/header', $context);
        echo view('movimientos_proveedores/listado', $context);
        echo view('panel/footer');
    }
    public function nuevo($activo = 1)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $proveedor_id = $this->request->getGet('proveedor_id');
        $usuarios = $this->usuarios->where('activo', $activo)->findAll();
        $context = [
            'proveedor_id' => $proveedor_id,
            'usuarios' => $usuarios,
            'titulo' => "Nuevo Movimiento de Proveedor",
            'pagname' => 'Gestión/Nuevo Movimiento Proveedor'
        ];

        echo view('panel/header', $context);
        echo view('movimientos_proveedores/nuevo', $context);
        echo view('panel/footer');
    }
    public function guardar()
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $session = session();
        $id_usuario = $session->get('id_usuario');

        $proveedor_id = $this->request->getPost('proveedor_id');

        $this->movimientosproveedores->save(
            [
                'id_proveedor' => $proveedor_id,
                'tipo_factura' => $this->request->getPost('tipo_factura'),
                'numero' => $this->request->getPost('numero'),
                'fecha' => $this->request->getPost('fecha'),
                'monto' => $this->request->getPost('monto'),
                'observaciones' => $this->request->getPost('observaciones'),
                'id_usuario' => $id_usuario,
            ]
        );

        session()->setFlashdata('mensaje', 'Movimiento del Proveedor creado correctamente');
        session()->setFlashdata('tipo', 'success');
        return redirect()->to(base_url() . 'public/movimientosproveedores/');
    }
    public function borrar($id)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $this->movimientosproveedores->delete($id);

        session()->setFlashdata('mensaje', 'Movimiento de Proveedor dado de baja correctamente');
        session()->setFlashdata('tipo', 'warning');
        return redirect()->to(base_url() . 'public/movimientosproveedores/');
    }
    public function editar($id)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $proveedor = $this->movimientosproveedores->where('id', $id)->findAll();
        $context = [
            'proveedor' => $proveedor,
            'titulo' => "Edición proveedor",
            'pagname' => 'Gestión/Edición proveedor'
        ];


        echo view('panel/header', $context);
        echo view('movimientosproveedores/editar');
        echo view('panel/footer');
    }
    public function actualizar($id)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $proveedor_id = $this->request->getGet('id_proveedor');


        $data = [
            'proveedor_id' => $proveedor_id,
            'tipo_factura' => $this->request->getPost('tipo_factura'),
            'numero' => $this->request->getPost('numero'),
            'fecha' => $this->request->getPost('fecha'),
            'monto' => $this->request->getPost('monto'),
            'observaciones' => $this->request->getPost('observaciones'),
            'id_usuario' => session()->get('usuario_id')
        ];


        $this->movimientosproveedores->update($id, $data);

        session()->setFlashdata('mensaje', 'Movimiento del Proveedor actualizado correctamente');
        session()->setFlashdata('tipo', 'success');
        return redirect()->to(base_url() . 'public/movimientosproveedores/');
    }

    public function pagar($id)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $mov = $this->movimientosproveedores->find($id);
        $prov=$this->proveedores->find($mov['id_proveedor']);
        $context = [
            'mov' => $mov,
            'prov' => $prov,
            'titulo' => 'Pagar Movimiento'
        ];
        echo view('panel/header', $context);
        echo view('movimientos_proveedores/pagar', $context);
        echo view('panel/footer');
    }

    public function confirmar_pago()
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $id = $this->request->getPost('movimiento_id');
        $this->movimientosproveedores->update($id,[
            'estado_pago'=>1,
            'fecha_pago'=>date('Y-m-d'),
            'metodo_pago'=>$this->request->getPost('metodo_pago')
        ]);

        session()->setFlashdata('mensaje', 'Pago registrado correctamente');
        session()->setFlashdata('tipo', 'info');
        return redirect()->to(base_url().'public/movimientosproveedores/');
    }

    public function imprimir($id)
    {
        $mov = $this->movimientosproveedores->find($id);
        $prov=$this->proveedores->find($mov['id_proveedor']);
        
        $context=[
            'mov'=>$mov,
            'prov'=>$prov
        ];

        $html=view('movimientos_proveedores/facturas_pdf',$context);
        $dompdf=new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','portrait');
        $dompdf->render();
        $dompdf->stream("factura_movimiento_".$id.".pdf",["Attachment"=>false]);
    }
}
