<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sucursal;
use App\Models\UserSucursal;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
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


        $users = User::with(['sucursal'])
                      ->orWhere('users.nombre','LIKE','%'.$search.'%')
                      ->orWhere('users.email','LIKE','%'.$search.'%')
                      ->orderBy('users.id','DESC')
                      ->select('users.*')
                      ->paginate(25);



        return view('usuario.listado', compact('users'));




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $user = [];


        $sucursales = Sucursal::all()->pluck('descripcion', 'id')->toArray();
        array_unshift($sucursales, 'Selecciona sucursal'); 

        $tipo = "guardar";

        return view('usuario.crear',compact('user','tipo','sucursales'));
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
            'email' => 'min:4|max:255|required|email|unique:users,email,',
            'password' => 'min:6|max:255|required',
            'sucursal_id' => 'required|numeric|min:0|not_in:0',
           

        ]);


        $user = User::firstOrCreate([
             'nombre'          => $request->nombre,
             'email'           => $request->email,
             'sucursal_id'     => $request->sucursal_id,
             'password'        => bcrypt($request->password),
            
        ]);

        $user->save();


        $user_sucursal = UserSucursal::firstOrCreate([
             'user_id'      => $user->id,
             'sucursal_id'  => $request->sucursal_id,
        ]);

        $user_sucursal->save();


        session::flash('message','El usuario fue creado correctamente');
        return redirect(route('usuarios.index')); 

  

   
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
        
        $user = User::find($id);
        $tipo = "editar";

        $sucursales = Sucursal::all()->pluck('descripcion', 'id')->toArray();
        array_unshift($sucursales, 'Selecciona sucursal'); 


        return view('usuario.editar', compact('user','tipo','sucursales'));


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
            'password' => '',
            'sucursal_id' => 'required|numeric|min:0|not_in:0',


        ]);


        if($request->password != null){
                            
            $pass = bcrypt($request->password);


            $user = User::find($id);


            $user->fill([
                'nombre'          => $request->nombre,
                'password'        => $pass,
                'sucursal_id'     => $request->sucursal_id,

            ]);

            $user->save();

   

            $user_sucursal = UserSucursal::where('user_id',$user->id)->first();
            $user_sucursal->update([
                 'user_id'      => $user->id,
                 'sucursal_id'  => $request->sucursal_id,
            ]);


          
            $user_sucursal->save();


            $sucursal = UserSucursal::where('user_id', Auth::user()->id)->first();
            Session::put('sucursal_nombre', $sucursal->sucursal->descripcion);

            session::flash('message','El usuario fue actualizado correctamente');
            return redirect(route('usuarios.index')); 



         
        } else {


            $user = User::find($id);


            $user->fill([
                'nombre'          => $request->nombre,
                'sucursal_id'     => $request->sucursal_id,

            ]);

             $user->save();


            $user_sucursal = UserSucursal::where('user_id',$user->id)->first();
            $user_sucursal->update([
                 'user_id'      => $user->id,
                 'sucursal_id'  => $request->sucursal_id,
            ]);

            $user_sucursal->save();


            $sucursal = UserSucursal::where('user_id', Auth::user()->id)->first();
            Session::put('sucursal_nombre', $sucursal->sucursal->descripcion);

            session::flash('message','El usuario fue actualizado correctamente');
            return redirect(route('usuarios.index')); 
                           
         }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $userSucursal = UserSucursal::where('user_id',$id)->get();

        foreach ($userSucursal as $key => $item) {

            UserSucursal::destroy($item['id']);  
        }

        User::destroy($id);
        session::flash('message','El usuario fue eliminado correctamente');
        return redirect(route('usuarios.index')); 
    }


    
}
