<?php

namespace App\Http\Controllers\SI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

use App\SI\TipoCambio;
use App\SI\Moneda;

class TipoCambioController extends Controller
{
    /**
     * Url base para este controlador.
     *
     * @var string
     */
    protected $url = '';

    /**
     * Monedas.
     *
     * @var array
     */
    protected $monedas = [];

    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->url = url('si/tipo_cambio/');
        $this->monedas = Moneda::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'url' => $this->url,
        ];

        return view('si.tipo_cambio.index', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $data = TipoCambio::with('moneda_origen','moneda_destino')->get();
        $json = [
            'data' => $data
        ];

        return response()->json($json);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = (object) [
            'id_tipo_cambio' => '',
            'id_moneda_origen' => '',
            'id_moneda_destino' => '',
            'fecha_cambio' => date('d-m-Y'),
            'factor_compra' => 0.00,
            'factor_venta' => 0.00,
            'factor_promedio' => 0.00,
            'ind_estado' => 'A',
            'ult_usuario' => '',
            'ult_fecha' => '',
            'ult_equipo' => '',
            'ult_ip' => '',
        ];

        $data = [
            'form' => $form,
            'url' => $this->url,
            'title' => 'Nuevo registro',
            'action' => $this->url,
            'option' => 'create',
            'disabled' => [
                'editar' => '',
                'ver' => '',
            ],
            'monedas' => $this->monedas,
        ];

        return view('si.tipo_cambio.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['fecha_cambio'] = formatDate($request->fecha_cambio);
        $data['factor_compra'] = setNumber($request->factor_compra);
        $data['factor_venta'] = setNumber($request->factor_venta);
        $data['factor_promedio'] = setNumber($request->factor_promedio);

        #Validation
        $validator = Validator::make($data, [
            'fecha_cambio'      => 'required|date_format:Y-m-d|before_or_equal:'.date('Y-m-d'),
            'id_moneda_origen'  => 'required',
            'id_moneda_destino' => 'required',
            'factor_compra'     => 'required|numeric',
            'factor_venta'      => 'required|numeric',
            'factor_promedio'   => 'required|numeric',
        ], [
            'required'                => 'Debe llenar los campos obligatorios.',
            'date_format'             => 'La Fecha de Cambio debe ser una fecha válida.',
            'before_or_equal'             => 'La Fecha de Cambio no puede ser mayor a la fecha actual.',
            'factor_compra.numeric'   => 'Factor Compra debe ser un valor numérico válido.',
            'factor_venta.numeric'    => 'Factor Venta debe ser un valor numérico válido.',
            'factor_promedio.numeric' => 'Factor Promedio debe ser un valor numérico válido.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->all()[0],
            ]);
        }

        #Store
        $model = new TipoCambio;
        $model->fecha_cambio        = $data['fecha_cambio'];
        $model->id_moneda_origen    = $request->id_moneda_origen;
        $model->id_moneda_destino   = $request->id_moneda_destino;
        $model->factor_compra       = $data['factor_compra'];
        $model->factor_venta        = $data['factor_venta'];
        $model->factor_promedio     = $data['factor_promedio'];
        $model->ind_estado  = ($request->ind_estado ? 'A' : 'I');
        $model->ult_usuario = Auth::user()->usuario;
        $model->ult_fecha   = date('Y-m-d H:i:s');
        $model->ult_equipo  = $_SERVER['REMOTE_ADDR'];
        $model->ult_ip      = $_SERVER['REMOTE_ADDR'];
        $model->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Registro almacenado exitosamente',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $form = TipoCambio::find($id);

        $data = [
            'form' => $form,
            'url' => $this->url,
            'title' => 'Ver registro',
            'action' => '',
            'option' => 'show',
            'disabled' => [
                'editar' => 'disabled',
                'ver' => 'disabled',
            ],
            'monedas' => $this->monedas,
        ];

        return view('si.tipo_cambio.form', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $form = TipoCambio::find($id);

        $data = [
            'form' => $form,
            'url' => $this->url,
            'title' => 'Editar registro',
            'action' => $this->url.'/'.$id,
            'option' => 'edit',
            'disabled' => [
                'editar' => 'disabled',
                'ver' => '',
            ],
            'monedas' => $this->monedas,
        ];

        return view('si.tipo_cambio.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['factor_compra'] = setNumber($request->factor_compra);
        $data['factor_venta'] = setNumber($request->factor_venta);
        $data['factor_promedio'] = setNumber($request->factor_promedio);

        #Validation
        $validator = Validator::make($data, [
            'factor_compra'     => 'required|numeric',
            'factor_venta'      => 'required|numeric',
            'factor_promedio'   => 'required|numeric',
        ], [
            'required'                => 'Debe llenar los campos obligatorios.',
            'factor_compra.numeric'   => 'Factor Compra debe ser un valor numérico válido.',
            'factor_venta.numeric'    => 'Factor Venta debe ser un valor numérico válido.',
            'factor_promedio.numeric' => 'Factor Promedio debe ser un valor numérico válido.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->all()[0],
            ]);
        }

        #Update
        $model = TipoCambio::find($id);
        $model->factor_compra       = $data['factor_compra'];
        $model->factor_venta        = $data['factor_venta'];
        $model->factor_promedio     = $data['factor_promedio'];
        $model->ind_estado  = ($request->ind_estado ? 'A' : 'I');
        $model->ult_usuario = Auth::user()->usuario;
        $model->ult_fecha   = date('Y-m-d H:i:s');
        $model->ult_equipo  = $_SERVER['REMOTE_ADDR'];
        $model->ult_ip      = $_SERVER['REMOTE_ADDR'];
        $model->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Registro actualizado exitosamente',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        #Delete
        $model = TipoCambio::find($id);
        $model->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Registro eliminado exitosamente',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroyMass(Request $request)
    {
        #Delete
        TipoCambio::destroy($request->data);

        return response()->json([
            'status' => 'success',
            'message' => 'Registro(s) eliminado(s) exitosamente',
        ]);
    }
}
