<?php
namespace App\Controllers;

require_once FCPATH.'../vendor/autoload.php';

use App\Models\FacturasModel;
use App\Models\ReparacionesModel;
use App\Models\ClientesModel;
use App\Models\AutosModel;
use App\Models\UsuariosModel;
use Dompdf\Dompdf;

class Facturas extends BaseController
{
    protected $facturas;
    protected $facturasin;
    protected $reparaciones;
    protected $clientes;
    protected $autos;
    protected $usuarios;
    protected $sesion;

    public function __construct()
    {
        $this->facturas = new FacturasModel();
        $this->facturasin = new FacturasModel();
        $this->reparaciones = new ReparacionesModel();
        $this->clientes = new ClientesModel();
        $this->autos = new AutosModel();
        $this->usuarios = new UsuariosModel();
        $this->sesion = session();
    }

    public function index($activo = 1, $inactivo = 0)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $facturas = $this->facturas->where('activo', $activo)->findAll();
        $facturasin = $this->facturas->where('activo', $inactivo)->findAll();
        $reparaciones = $this->reparaciones->where('activo', $activo)->findAll();
        $clientes = $this->clientes->where('activo', $activo)->findAll();
        $autos = $this->autos->where('activo', $activo)->findAll();
        $usuarios = $this->usuarios->where('activo', $activo)->findAll();

        $reparaciones_id = $this->request->getGet('reparacion_id');

        if ($reparaciones_id) {
            $reparacioness = $this->facturas->where('id_reparacion', $reparaciones_id)->where('activo', $activo)->findAll();
        } else {
            $reparacioness = $this->facturas->where('activo', $inactivo)->findAll();
        }
        $context = [
            'reparacion_id' => $reparaciones_id,
            'facturas' => $facturas,
            'facturasin' => $facturasin,
            'reparaciones' => $reparaciones,
            'clientes' => $clientes,
            'autos' => $autos,
            'usuarios' => $usuarios,
            'titulo' => "Facturas",
            'pagname' => "Gestión/facturas"
        ];

        echo view('panel/header', $context);
        echo view('facturas/listado', $context);
        echo view('panel/footer');
    }
    public function nuevo($activo = 1)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $reparaciones_id = $this->request->getGet('reparacion_id');
        $rep = $this->reparaciones->find($reparaciones_id);
        $usuarios = $this->usuarios->where('activo', $activo)->findAll();
        $clientes = null;

        if ($rep) {
            $autos = $this->autos->find($rep['id_auto']);
            if ($autos) {
                $clientes = $this->clientes->find($autos['id_cliente']);
            }
        }

        $context = [
            'reparacion_id' => $reparaciones_id,
            'reparacion' => $rep,
            'usuarios' => $usuarios,
            'clientes' => $clientes,
            'autos' => $autos,
            'titulo' => "Nueva Factura",
            'pagname' => 'Gestión/Nueva Factura'
        ];

        echo view('panel/header', $context);
        echo view('facturas/nuevo', $context);
        echo view('panel/footer');
    }
    public function guardar()
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $session = session();
        $id_usuario = $session->get('id_usuario');

        $reparaciones_id = $this->request->getPost('reparacion_id');

        $this->facturas->save(
            [
                'id_cliente' => $this->request->getPost('id_cliente'),
                'id_reparacion' => $reparaciones_id,
                'tipo_factura' => $this->request->getPost('tipo_factura'),
                'monto' => $this->request->getPost('monto'),
                'id_usuario' => $id_usuario,
            ]
        );

        session()->setFlashdata('mensaje', 'Factura creada correctamente');
        session()->setFlashdata('tipo', 'success');
        return redirect()->to(base_url() . 'public/facturas/');
    }
    public function borrar($id)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $this->facturas->delete($id);

        session()->setFlashdata('mensaje', 'Factura dada de baja correctamente');
        session()->setFlashdata('tipo', 'warning');
        return redirect()->to(base_url() . 'public/facturas/');
    }
    public function editar($id)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $facturas = $this->facturas->where('id', $id)->findAll();
        $context = [
            'facturas' => $facturas,
            'titulo' => "Edición facturas",
            'pagname' => 'Gestión/Edición facturas'
        ];


        echo view('panel/header', $context);
        echo view('facturas/editar',$context);
        echo view('panel/footer');
    }
    public function actualizar($id)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $reparaciones_id = $this->request->getPost('id_reparacion');


        $data = [
            'id_cliente' => $this->request->getPost('id_cliente'),
            'id_reparacion' => $reparaciones_id,
            'tipo_factura' => $this->request->getPost('tipo_factura'),
            'monto' => $this->request->getPost('monto'),
            'id_usuario' => session()->get('usuario_id')
        ];


        $this->facturas->update($id, $data);

        session()->setFlashdata('mensaje', 'Factura actualizada correctamente');
        session()->setFlashdata('tipo', 'success');
        return redirect()->to(base_url() . 'public/facturas/');
    }

    public function pagar($id)
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $factura = $this->facturas->find($id);

        if (!$factura) {
            return redirect()->to(base_url() . 'public/facturas');
        }

        $cliente = $this->clientes->find($factura['id_cliente']);
        $reparacion = $this->reparaciones->find($factura['id_reparacion']);

        $context = [
            'factura' => $factura,
            'cliente' => $cliente,
            'reparacion' => $reparacion,
            'titulo' => "Pagar factura",
            'pagname' => 'Gestión/Pagar facturas'
        ];


        echo view('panel/header', $context);
        echo view('facturas/pagar', $context);
        echo view('panel/footer');
    }

    public function confirmar_pago()
    {
        if (!isset($this->sesion->id_usuario)) {
            return redirect()->to(base_url() . 'public/login');
        }

        $id = $this->request->getPost('factura_id');

        $metodo = $this->request->getPost('metodo_pago');

        $this->facturas->update($id, [
            'estado_pago' => 1,
            'fecha_pago' => date('Y-m-d'),
            'metodo_pago' => $metodo
        ]);

        session()->setFlashdata('mensaje', 'Pago registrado correctamente');
        session()->setFlashdata('tipo', 'info');
        return redirect()->to(base_url() . 'public/facturas');
    }

    public function imprimir($id)
    {
        $factura = $this->facturas->find($id);
        $cliente = $this->clientes->find($factura['id_cliente']);
        $reparacion = $this->reparaciones->find($factura['id_reparacion']);

        $data=[
            'factura'=>$factura,
            'cliente'=>$cliente,
            'reparacion'=>$reparacion
        ];

        $html=view('facturas/facturas_pdf',$data);
        $dompdf=new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','portrait');
        $dompdf->render();
        $dompdf->stream("factura_".$id.".pdf",["Attachment"=>false]);
    }
}
