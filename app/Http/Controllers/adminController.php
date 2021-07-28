<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use Illuminate\support\Facades\Hash;

use Illuminate\Http\Request;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       //Retorna la vista con los formularios
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumnos = DB::table('users')->get();

        return view('admin.create', compact('alumnos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        

        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        return view('admin.index')->with('registro', 'si');
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
        //Nuevo codigo de create a edit

        if(isset($_GET['cuatri']) && $_GET['cuatri'] != 0){
            $materias = DB::table('materias')
            ->where('cuatri', '=', $_GET['cuatri'])->get();
        }
        else{
            $materias = DB::table('materias')->get();
        }

        //$id = session("id");

        $matAsignadas = DB::table('materias')
        ->join('alumnoMateria', 'alumnoMateria.idMateria', '=', 'materias.id')
        ->where('alumnoMateria.idAlumno', '=' , $id)->get();

        if(isset($_GET['cuatri']) && isset($_GET['save']) == "si"){
            $resp = $matAsignadas->where('cuatri', $_GET['cuatri'])->first();
            //dump($resp);

            if(!$resp){
                dump("Datos guardados");
                foreach($materias as $m){
                    DB::table('alumnomateria')
                    ->insert([
                        'idAlumno' => $id,
                        'idMateria' => $m->id,
                    ]);
                }
            }
            else{
                dump("Datos no guardados");
            }
        }

        return view('admin.edit', compact('materias', 'matAsignadas'));
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
