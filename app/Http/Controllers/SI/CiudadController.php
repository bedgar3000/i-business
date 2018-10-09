<?php

namespace App\Http\Controllers\SI;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

use App\SI\Estado;
use App\SI\Pais;
use App\SI\Municipio;
use App\SI\Ciudad;


class CiudadController extends Controller
{

/**
     * Url base para este controlador.
     *
     * @var string
     */
    protected $url='';

    /**
     * Aplicaciones.
     *
     * @var array
     */
      protected $estados=[];


    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->url = url('si/ciudades/');
        $this->estados = Estado::all();
    
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

        return view('si.ciudades.index', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $data = Estado::with('ciudad')->get();
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
            'id_ciudad' => '',
            'id_estado' => '',
            'desc_ciudad' => '',
			'cod_postal' => '',
			'ind_capital'=>'N',
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
            'disabled' => ['editar' => '','ver' => '',],
            'estado' => $this->estados,
        ];

        return view('si.ciudades.form', $data);
    }

   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

        public function store(Request $request){
            $data = $request->all();
            
                      #Validation
                    $validator = Validator::make($data, [

                        'desc_ciudad'   => 'required',
                        'ind_capital'   => 'required',

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
            $model = new Ciudad;
            $model->id_estado       = $request->id_estado;
            $model->desc_ciudad  	= $request->desc_ciudad;
            $model->cod_postal  	= $request->cod_postal;
            $model->ind_capital  	= $request->ind_capital;
            $model->ind_estado      = ($request->ind_estado ? 'A' : 'I');
            $model->ult_usuario     = Auth::user()->usuario;
            $model->ult_fecha       = date('Y-m-d H:i:s');
            $model->ult_equipo      = gethostname();
            $model->ult_ip          = gethostbyname(gethostname());
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

        public function show($id){

            $form=Ciudad::find($id);

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
                        'estado' => $this->estados,
                    ];

                    return view('si.ciudades.form', $data);
        }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

        public function edit($id){

            $form=Ciudad::find($id);

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
                        'estado' => $this->estados,
                    ];

                    return view('si.ciudades.form', $data);

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

                        'desc_ciudad'   => 'required',

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
                    $model = Ciudad::find($id);
                   
                    $model->desc_ciudad  	= $request->desc_ciudad;
                    $model->cod_postal	 	= $request->cod_postal;
            		$model->ind_capital  	= $request->ind_capital;
                    $model->ind_estado      = ($request->ind_estado ? 'A' : 'I');
                    $model->ult_usuario     = Auth::user()->usuario;
                    $model->ult_fecha       = date('Y-m-d H:i:s');
                    $model->ult_equipo      = gethostname();
                    $model->ult_ip          = gethostbyname(gethostname());

                   #return View::make('my.view')->render();
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
                        $model = Ciudad::find($id);
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
                        Ciudad::destroy($request->data);

                        return response()->json([
                            'status' => 'success',
                            'message' => 'Registro(s) eliminado(s) exitosamente',
                        ]);
                    }



}
