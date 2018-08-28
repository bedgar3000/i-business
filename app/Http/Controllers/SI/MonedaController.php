<?php

namespace App\Http\Controllers\SI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

use App\SI\Moneda;

class MonedaController extends Controller
{
    /**
     * Url base para este controlador.
     *
     * @var string
     */
    protected $url = '';

    /**
     * Tipo de moneda.
     *
     * @var array
     */
    protected $tipo_moneda = '';

    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->url = url('si/monedas/');
        $this->tipo_moneda = \Config::get('constantes.moneda_tipo');
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

        return view('si.monedas.index', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $data = Moneda::all();
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
            'id_moneda' => '',
            'siglas_moneda' => '',
            'desc_moneda' => '',
            'tipo_moneda' => 'L',
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
            'tipo_moneda' => $this->tipo_moneda,
        ];

        return view('si.monedas.form', $data);
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
            'siglas_moneda' => 'required|unique:si_maestro_monedas',
            'desc_moneda'      => 'required',
            'tipo_moneda'      => 'required|in:L,E',
        ], [
            'required' => 'Debe llenar los campos obligatorios.',
            'unique' => 'Las Siglas ya se encuentra registrada.',
            'tipo_moneda.in' => 'Tipo de Moneda incorrecto.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->all()[0],
            ]);
        }

        #Store
        $model = new Moneda;
        $model->siglas_moneda = $request->siglas_moneda;
        $model->desc_moneda   = $request->desc_moneda;
        $model->tipo_moneda   = $request->tipo_moneda;
        $model->ind_estado    = ($request->ind_estado ? 'A' : 'I');
        $model->ult_usuario   = Auth::user()->usuario;
        $model->ult_fecha     = date('Y-m-d H:i:s');
        $model->ult_equipo    = $_SERVER['REMOTE_ADDR'];
        $model->ult_ip        = $_SERVER['REMOTE_ADDR'];
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
        $form = Moneda::find($id);

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
            'tipo_moneda' => $this->tipo_moneda,
        ];

        return view('si.monedas.form', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $form = Moneda::find($id);

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
            'tipo_moneda' => $this->tipo_moneda,
        ];

        return view('si.monedas.form', $data);
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
            'desc_moneda'      => 'required',
            'tipo_moneda'      => 'required|in:L,E',
        ], [
            'required' => 'Debe llenar los campos obligatorios.',
            'tipo_moneda.in' => 'Tipo de Moneda incorrecto.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->all()[0],
            ]);
        }

        #Update
        $model = Moneda::find($id);
        $model->desc_moneda = $request->desc_moneda;
        $model->tipo_moneda = $request->tipo_moneda;
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
        $model = Moneda::find($id);
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
        Moneda::destroy($request->data);

        return response()->json([
            'status' => 'success',
            'message' => 'Registro(s) eliminado(s) exitosamente',
        ]);
    }
}
