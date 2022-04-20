<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use DB;
use Session;


class ClientesController extends Controller
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


        $clientes = Cliente::orWhere('clientes.nombre','LIKE','%'.$search.'%')
                      ->orWhere('clientes.codigo','LIKE','%'.$search.'%')
                      ->orWhere('clientes.descripcion','LIKE','%'.$search.'%')
                      ->orWhere('clientes.rif','LIKE','%'.$search.'%')
                      ->orWhere('clientes.direccion','LIKE','%'.$search.'%')
                      ->orWhere('clientes.email','LIKE','%'.$search.'%')
                      ->orWhere('clientes.telefono','LIKE','%'.$search.'%')
                      ->orderBy('clientes.id','DESC')
                      ->select('clientes.*')
                      ->paginate(25);

        return view('cliente.listado', compact('clientes'));




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $cliente = [];
        $tipo = "guardar";
        return view('cliente.crear',compact('cliente','tipo'));
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
            'nombre' => 'min:4|max:255|required',
            'codigo' => 'min:4|max:255|required',
            'descripcion' => 'min:4|max:255|required',
            'email' => 'min:4|max:255|required|email|unique:users,email,',

        ]);


        $cliente = Cliente::firstOrCreate([
             'nombre'          => $request->nombre,
             'descripcion'      => $request->descripcion,
             'email'            => $request->email, 
             'direccion'        => $request->direccion,
             'rif'              => $request->rif,
             'telefono'         => $request->telefono,
             'codigo'           => $request->codigo, 
            
        ]);

        $cliente->save();



        session::flash('message','El cliente fue creado correctamente');
        return redirect(route('clientes.index')); 

  

   
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
        
        $cliente = Cliente::find($id);
        $tipo = "editar";



        return view('cliente.editar', compact('cliente','tipo'));


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
            'nombre' => 'min:4|max:255|required',
            'email' => 'min:4|max:255|required|email|unique:users,email,'.$id,
            'codigo' => 'min:4|max:255|required',
            'descripcion' => 'min:4|max:255|required',
        ]);




        $cliente = Cliente::find($id);


        $cliente->fill([
            'nombre'          => $request->nombre,
            'descripcion'      => $request->descripcion,
            'email'            => $request->email, 
            'direccion'        => $request->direccion,
            'rif'              => $request->rif,
            'telefono'         => $request->telefono,
            'codigo'           => $request->codigo, 

        ]);

        $cliente->save();

        session::flash('message','El cliente fue actualizado correctamente');
        return redirect(route('clientes.index')); 
                        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cliente::destroy($id);
        session::flash('message','El cliente fue eliminado correctamente');
        return redirect(route('clientes.index')); 
    }


    
}
