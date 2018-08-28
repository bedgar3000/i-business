<?php

namespace App\Http\Controllers\SI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

use App\SI\Miscelaneo;
use App\SI\Aplicacion;

class MiscelaneoController extends Controller
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
    protected $aplicaciones = [];

    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->url = url('si/miscelaneos/');
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
        ];

        return view('si.miscelaneos.index', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $data = Miscelaneo::with('aplicacion')->get();
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
            'id_miscelaneo' => '',
            'id_aplicacion' => '',
            'cod_maestro' => '',
            'nom_maestro' => '',
            'desc_maestro' => '',
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
        ];

        return view('si.miscelaneos.form', $data);
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

        #Validation
        $validator = Validator::make($data, [
            'id_aplicacion' => 'required',
            'cod_maestro'   => 'required|unique:si_maestro_miscelaneos',
            'nom_maestro'   => 'required',
        ], [
            'required' => 'Debe llenar los campos obligatorios.',
            'unique'   => 'Código ya se encuentra registrada.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->all()[0],
            ]);
        }

        #Store
        $model = new Miscelaneo;
        $model->id_aplicacion = $request->id_aplicacion;
        $model->cod_maestro   = $request->cod_maestro;
        $model->nom_maestro   = $request->nom_maestro;
        $model->desc_maestro  = $request->desc_maestro;
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
        $form = Miscelaneo::find($id);

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
        ];

        return view('si.miscelaneos.form', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $form = Miscelaneo::find($id);

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
        ];

        return view('si.miscelaneos.form', $data);
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

        #Validation
        $validator = Validator::make($data, [
            'nom_maestro'   => 'required',
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
        $model = Miscelaneo::find($id);
        $model->id_aplicacion = $request->id_aplicacion;
        $model->cod_maestro   = $request->cod_maestro;
        $model->nom_maestro   = $request->nom_maestro;
        $model->desc_maestro  = $request->desc_maestro;
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
        $model = Miscelaneo::find($id);
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
        Miscelaneo::destroy($request->data);

        return response()->json([
            'status' => 'success',
            'message' => 'Registro(s) eliminado(s) exitosamente',
        ]);
    }
}
