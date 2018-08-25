<?php

namespace App\Http\Controllers\SI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

use App\SI\Aplicacion;

class AplicacionController extends Controller
{
    /**
     * Url base para este controlador.
     *
     * @var string
     */
    protected $url = '';

    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->url = url('si/aplicaciones/');
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

        return view('si.aplicaciones.index', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $data = Aplicacion::all();
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
            'id_aplicacion' => '',
            'cod_acronimo_aplicacion' => '',
            'desc_nombre_modulo' => '',
            'desc_descripcion_modulo' => '',
            'id_dependencia' => '',
            'id_misc_det_sist_fuente' => '',
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
        ];

        return view('si.aplicaciones.form', $data);
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
            'cod_acronimo_aplicacion' => 'required|unique:si_maestro_aplicaciones',
            'desc_nombre_modulo'      => 'required',
        ], [
            'required' => 'Debe llenar los campos obligatorios.',
            'unique' => 'El Código ya se encuentra registrado.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->all()[0],
            ]);
        }

        #Store
        $model = new Aplicacion;
        $model->cod_acronimo_aplicacion = $request->cod_acronimo_aplicacion;
        $model->desc_nombre_modulo      = $request->desc_nombre_modulo;
        $model->desc_descripcion_modulo = $request->desc_descripcion_modulo;
        $model->id_dependencia          = ($request->id_dependencia ? $request->id_dependencia : NULL);
        $model->id_misc_det_sist_fuente = ($request->id_misc_det_sist_fuente ? $request->id_misc_det_sist_fuente : NULL);
        $model->ind_estado              = ($request->ind_estado ? 1 : 0);
        $model->ult_usuario             = Auth::user()->usuario;
        $model->ult_fecha               = date('Y-m-d H:i:s');
        $model->ult_equipo              = $_SERVER['REMOTE_ADDR'];
        $model->ult_ip                  = $_SERVER['REMOTE_ADDR'];
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
        $form = Aplicacion::find($id);

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
        ];

        return view('si.aplicaciones.form', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $form = Aplicacion::find($id);

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
        ];

        return view('si.aplicaciones.form', $data);
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
            'desc_nombre_modulo'      => 'required',
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
        $model = Aplicacion::find($id);
        $model->desc_nombre_modulo      = $request->desc_nombre_modulo;
        $model->desc_descripcion_modulo = $request->desc_descripcion_modulo;
        $model->id_dependencia          = ($request->id_dependencia ? $request->id_dependencia : NULL);
        $model->id_misc_det_sist_fuente = ($request->id_misc_det_sist_fuente ? $request->id_misc_det_sist_fuente : NULL);
        $model->ind_estado              = ($request->ind_estado ? 1 : 0);
        $model->ult_usuario             = Auth::user()->usuario;
        $model->ult_fecha               = date('Y-m-d H:i:s');
        $model->ult_equipo              = $_SERVER['REMOTE_ADDR'];
        $model->ult_ip                  = $_SERVER['REMOTE_ADDR'];
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
        $model = Aplicacion::find($id);
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
        Aplicacion::destroy($request->data);

        return response()->json([
            'status' => 'success',
            'message' => 'Registro(s) eliminado(s) exitosamente',
        ]);
    }
}
