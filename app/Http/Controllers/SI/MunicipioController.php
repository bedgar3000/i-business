<?php

namespace App\Http\Controllers\SI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

use App\SI\Pais;
use App\SI\Estado;
use App\SI\Municipio;

class MunicipioController extends Controller
{
    
    /**
     * Url base para este controlador.
     *
     * @var string
     */
    protected $url='';
    
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->url = url('si/municipios/');
    }
    
	public function index()
	{
        $data = ['url' => $this->url, ];

        return view('si.municipios.index', $data);
    }
    
    public function list()
    {
        $data = Municipio::with('estado.pais')->get();
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
            'id_municipio' => '',
            'id_estado' => 10,
            'desc_municipio' => '',
            'ind_estado' => 'A',
            'estado' => (object) [
                'id_pais' => 1,
            ],
            'ult_usuario' => '',
            'ult_fecha' => '',
            'ult_equipo' => '',
            'ult_ip' => '',
        ];
        $paises = Pais::all();
        $estados = Estado::where(['id_pais' => $form->estado->id_pais])->get();

        $data = [
            'form' => $form,
            'url' => $this->url,
            'title' => 'Nuevo registro',
            'action' => $this->url,
            'option' => 'create',
            'disabled' => ['editar' => '','ver' => '',],
            'estados' => $estados,
            'paises' => $paises,
        ];

        return view('si.municipios.form', $data);
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
        $validator = Validator::make(
            $data, 
            [
                'id_estado'      => 'required',
                'desc_municipio' => 'required',
            ], 
            [
                'required' => 'Debe llenar los campos obligatorios.',
                'unique'   => 'Código ya se encuentra registrada.',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->all()[0],
            ]);
        }
        
        #Store
        $model = new Municipio;
        $model->id_estado       = $request->id_estado;
        $model->desc_municipio  = $request->desc_municipio;
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
    public function show($id)
    {
        $form = Municipio::with('estado.pais')->get()->find($id);
        $paises = Pais::all();
        $estados = Estado::where(['id_pais' => $form->estado->id_pais])->get();

        

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
                    'estados' => $estados,
                    'paises' => $paises,
                ];

                return view('si.municipios.form', $data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $form = Municipio::with('estado.pais')->get()->find($id);
        $paises = Pais::all();
        $estados = Estado::where(['id_pais' => $form->estado->id_pais])->get();

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
                    'estados' => $estados,
                    'paises' => $paises,
                ];

                return view('si.municipios.form', $data);

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

                'desc_municipio'   => 'required',

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
            $model = Municipio::find($id);
            
            $model->desc_municipio  = $request->desc_municipio;
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
        $model = Municipio::find($id);
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
        Municipio::destroy($request->data);

        return response()->json([
            'status' => 'success',
            'message' => 'Registro(s) eliminado(s) exitosamente',
        ]);
    }
}
