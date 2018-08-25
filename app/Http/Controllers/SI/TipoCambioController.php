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
            'fecha_cambio' => date('Y-m-d'),
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
        #Validation
        $validator = Validator::make($request->all(), [
            'id_moneda_origen'  => 'required',
            'id_moneda_destino' => 'required',
            'fecha_cambio'      => 'required',
            'factor_compra'     => 'required',
            'factor_venta'      => 'required',
            'factor_promedio'   => 'required',
        ], [
            'required' => 'Debe llenar los campos obligatorios.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->all()[0],
            ]);
        }

        #Store
        $model = new TipoCambio;
        $model->id_moneda_origen    = $request->id_moneda_origen;
        $model->id_moneda_destino   = $request->id_moneda_destino;
        $model->fecha_cambio        = $request->fecha_cambio;
        $model->factor_compra       = $request->factor_compra;
        $model->factor_venta        = $request->factor_venta;
        $model->factor_promedio     = $request->factor_promedio;
        $model->ind_estado  = ($request->ind_estado ? 1 : 0);
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
        #Validation
        $validator = Validator::make($request->all(), [
            'factor_compra'     => 'required',
            'factor_venta'      => 'required',
            'factor_promedio'   => 'required',
        ], [
            'required' => 'Debe llenar los campos obligatorios.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->all()[0],
            ]);
        }

        #Update
        $model = TipoCambio::find($id);
        $model->factor_compra       = $request->factor_compra;
        $model->factor_venta        = $request->factor_venta;
        $model->factor_promedio     = $request->factor_promedio;
        $model->ind_estado  = ($request->ind_estado ? 1 : 0);
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
