<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;


class profeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostrar los usuarios a asignar
        $profe = DB::table('users')->get();

        return view('profe.index', compact('profe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Mostrar las materias que se pueden asignar
        $materias = DB::table('materias')->get();
        //Busqueda del usuarios usuario
        $users = DB::table('users')->where('id', '=', $id)->first();
        //Busqueda de materias dadas por el profe
        $profe = DB::table('materias')
        ->join('profeMateria', 'profeMateria.idMateria', '=', 'materias.id')
        ->where('profeMateria.idProfe', '=', $id)->get();


        //Busca si existe la variable guardar, si es igual a si, y si el arreglo idMat no esta vacio
        if(isset($_GET['guardar']) && $_GET['guardar'] == "si" && !empty($_GET['idMat'])){
            foreach($_GET['idMat'] as $materia){
                //Busca dentro de profe si existe una materia que ya tenga asignada
                $resp = $profe->where('idMateria', $materia)->first(); 
                if(!$resp){
                    DB::table('profemateria')->insert([
                        'idProfe' => $id,
                        'idMateria' => $materia,
                    ]);
                }  
            }
        }

        //Busca si existe la variable eliminar, si es igual a si, y si el arreglo idMat no esta vacio
        if(isset($_GET['eliminar']) && $_GET['eliminar'] == "si" && !empty($_GET['idMat'])){
            foreach($_GET['idMat'] as $materia){
                DB::table('profemateria')
                ->where('id', '=', $materia)
                ->delete();
            }
        }
        
        

        return view('profe.edit', compact('materias', 'users', 'profe'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
