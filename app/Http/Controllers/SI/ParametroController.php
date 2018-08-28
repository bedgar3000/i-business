<?php

namespace App\Http\Controllers\SI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

use App\SI\Parametro;
use App\SI\Aplicacion;

class ParametroController extends Controller
{
    /**
     * Url base para este controlador.
     *
     * @var string
     */
    protected $url = '';

    /**
     * Aplicaciones.
     *
     * @var array
     */
    protected $aplicaciones = '';

    /**
     * Tipo de parámetro.
     *
     * @var array
     */
    protected $tipo_parametro = '';

    /**
     * Tipo de valor de los parámetros.
     *
     * @var array
     */
    protected $tipo_valor = '';

    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->url = url('si/parametros/');
        $this->tipo_parametro = \Config::get('constantes.parametro_tipo');
        $this->tipo_valor = \Config::get('constantes.parametro_tipo_valor');
        $this->aplicaciones = Aplicacion::all();
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
            'tipo_parametro' => $this->tipo_parametro,
            'tipo_valor' => $this->tipo_valor,
        ];

        return view('si.parametros.index', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        //$data = Parametro::all();
        //$data = Parametro::with('aplicacion:desc_nombre_modulo')->get();
        $data = DB::table('si_maestro_parametros')
            ->join('si_maestro_aplicaciones', 'si_maestro_aplicaciones.id_aplicacion', '=', 'si_maestro_parametros.id_aplicacion')
            ->select('si_maestro_parametros.*', 
                     'si_maestro_aplicaciones.cod_acronimo_aplicacion', 
                     'si_maestro_aplicaciones.desc_nombre_modulo')
            ->get();
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
            'id_parametro' => '',
            'id_aplicacion' => '',
            'cod_parametro_clave' => '',
            'desc_parametro' => '',
            'exp_parametro' => '',
            'tipo_parametro' => 'S',
            'tipo_valor' => 'T',
            'valor_parametro' => '',
            'flag_comun_compania' => 1,
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
            'aplicaciones' => $this->aplicaciones,
            'tipo_parametro' => $this->tipo_parametro,
            'tipo_valor' => $this->tipo_valor,
        ];

        return view('si.parametros.form', $data);
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
            'id_aplicacion'       => 'required',
            'cod_parametro_clave' => 'required|alpha_dash|unique:si_maestro_parametros',
            'desc_parametro'      => 'required',
            'tipo_parametro'      => 'required|in:S,V',
            'tipo_valor'          => 'required|in:T,N,F',
            'valor_parametro'     => 'required',
        ], [
            'required' => 'Debe llenar los campos obligatorios.',
            'alpha_dash' => 'Formato del Código incorrecto.',//caracteres alfanuméricos, así como guiones y guiones bajos
            'unique' => 'El Código ya se encuentra registrado.',
            'tipo_parametro.in' => 'Tipo de Parámetro incorrecto.',
            'tipo_valor.in' => 'Tipo de Valor incorrecto.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->all()[0],
            ]);
        }

        #Store
        $model = new Parametro;
        $model->id_aplicacion       = $request->id_aplicacion;
        $model->cod_parametro_clave = $request->cod_parametro_clave;
        $model->desc_parametro      = $request->desc_parametro;
        $model->exp_parametro       = $request->exp_parametro;
        $model->tipo_parametro      = $request->tipo_parametro;
        $model->tipo_valor          = $request->tipo_valor;
        $model->valor_parametro     = $request->valor_parametro;
        $model->flag_comun_compania = ($request->flag_comun_compania ? 1 : 0);
        $model->ind_estado          = ($request->ind_estado ? 'A' : 'I');
        $model->ult_usuario         = Auth::user()->usuario;
        $model->ult_fecha           = date('Y-m-d H:i:s');
        $model->ult_equipo          = $_SERVER['REMOTE_ADDR'];
        $model->ult_ip              = $_SERVER['REMOTE_ADDR'];
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
        $form = Parametro::find($id);

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
            'aplicaciones' => $this->aplicaciones,
            'tipo_parametro' => $this->tipo_parametro,
            'tipo_valor' => $this->tipo_valor,
        ];

        return view('si.parametros.form', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $form = Parametro::find($id);

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
            'aplicaciones' => $this->aplicaciones,
            'tipo_parametro' => $this->tipo_parametro,
            'tipo_valor' => $this->tipo_valor,
        ];

        return view('si.parametros.form', $data);
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
            'desc_parametro'      => 'required',
            'tipo_parametro'      => 'required|in:S,V',
            'tipo_valor'          => 'required|in:T,N,F',
            'valor_parametro'     => 'required',
        ], [
            'required' => 'Debe llenar los campos obligatorios.',
            'tipo_parametro.in' => 'Tipo de Parámetro incorrecto.',
            'tipo_valor.in' => 'Tipo de Valor incorrecto.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->all()[0],
            ]);
        }

        #Update
        $model = Parametro::find($id);
        $model->id_aplicacion       = $request->id_aplicacion;
        $model->desc_parametro      = $request->desc_parametro;
        $model->exp_parametro       = $request->exp_parametro;
        $model->tipo_parametro      = $request->tipo_parametro;
        $model->tipo_valor          = $request->tipo_valor;
        $model->valor_parametro     = $request->valor_parametro;
        $model->flag_comun_compania = ($request->flag_comun_compania ? 1 : 0);
        $model->ind_estado          = ($request->ind_estado ? 'A' : 'I');
        $model->ult_usuario         = Auth::user()->usuario;
        $model->ult_fecha           = date('Y-m-d H:i:s');
        $model->ult_equipo          = $_SERVER['REMOTE_ADDR'];
        $model->ult_ip              = $_SERVER['REMOTE_ADDR'];
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
        $model = Parametro::find($id);
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
        Parametro::destroy($request->data);

        return response()->json([
            'status' => 'success',
            'message' => 'Registro(s) eliminado(s) exitosamente',
        ]);
    }
}
