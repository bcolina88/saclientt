<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sucursal;
use App\Models\UserSucursal;
use DB;
use Session;


class SucursalesController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        

        $search = $request->get('search');


        $sucursales = Sucursal::orWhere('sucursales.codigo','LIKE','%'.$search.'%')
                      ->orWhere('sucursales.descripcion','LIKE','%'.$search.'%')
                      ->orWhere('sucursales.rif','LIKE','%'.$search.'%')
                      ->orWhere('sucursales.direccion','LIKE','%'.$search.'%')
                      ->orWhere('sucursales.email','LIKE','%'.$search.'%')
                      ->orWhere('sucursales.telefono','LIKE','%'.$search.'%')
                      ->orderBy('sucursales.id','DESC')
                      ->select('sucursales.*')
                      ->paginate(25);


        return view('sucursal.listado', compact('sucursales'));




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $sucursal = [];
        $tipo = "guardar";
        return view('sucursal.crear',compact('tipo','sucursal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data= request()->validate([
            'descripcion' => 'min:4|max:255|required',
            'email' => 'min:4|max:255|required|email|unique:users,email,',
        ]);


        $sucursal = Sucursal::firstOrCreate([
             'descripcion'      => $request->descripcion,
             'email'            => $request->email, 
             'direccion'        => $request->direccion,
             'rif'              => $request->rif,
             'telefono'         => $request->telefono,
             'codigo'           => $request->codigo,
            
        ]);

        $sucursal->save();


        session::flash('message','La sucursal fue creado correctamente');
        return redirect(route('sucursales.index')); 

  

   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $sucursal = Sucursal::find($id);
        $tipo = "editar";


        return view('sucursal.editar', compact('tipo','sucursal'));


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
        
        $data= request()->validate([
            'descripcion' => 'min:4|max:255|required',
            'email' => 'min:4|max:255|required|email|unique:users,email,',

        ]);




        $sucursal = Sucursal::find($id);


        $sucursal->fill([
             'descripcion'      => $request->descripcion,
             'email'            => $request->email, 
             'direccion'        => $request->direccion,
             'rif'              => $request->rif,
             'telefono'         => $request->telefono,
             'codigo'           => $request->codigo,
        ]);

        $sucursal->save();

        session::flash('message','La sucursal fue actualizado correctamente');
        return redirect(route('sucursales.index')); 
                           
      


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

        $userSucursal = UserSucursal::where('sucursal_id',$id)->get();

        foreach ($userSucursal as $key => $item) {

            UserSucursal::destroy($item['id']);  
        }

        Sucursal::destroy($id);
        session::flash('message','La sucursal fue eliminado correctamente');
        return redirect(route('sucursales.index')); 
    }


    
}
