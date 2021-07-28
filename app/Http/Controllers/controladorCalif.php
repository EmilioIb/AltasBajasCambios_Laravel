<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use Illuminate\support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class controladorCalif extends Controller
{
    public function index(){
        return view('index');
    }

    public function hola(){
        $data = DB::table('users')->get();
        //dd($data);
        //die();

        return view('hola', compact('data'));


       /*Como se hacia antes sin bases de datos
        $nom = "Emilio el perrillo"; //Declaracion de variables
        $mats = array("Diseño web", "Base de datos", "Desarrollo movil"); //Declaracion de variables
        $cal = 8;
        $num = 1;
        $grupo = 2;

        return view('hola')
        ->with('nom', $nom) //Enviar variables con with
        ->with('mats', $mats)
        ->with('cal', $cal)
        ->with('grupo', $grupo)
        ->with('num', $num); //Enviar variables con with
        */



    }

    public function login(){
        return view('login');
    }

    public function validacion(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
       
        $credentials = $request->only('email', 'password');

       if(Auth::attempt($credentials)){
           $usuario = DB::table('users')
           ->where('email', '=', $email)
           ->first();

           //Crear sesion
           session(['id' => $usuario->id]);;

           return redirect(route('menulog'));

        }
        else{
            return redirect(route('login'));
        }
        

        
        /*
        Select * from users where email = $email and password = $passw
        Comprobando que funcione 
        dd($usuario);
        die();
        FORMA DE VALIDAR ANTIGUAMENTE SIN EL AUTH
        if($usuario){
            return view('validacion', compact('usuario'));
        }
        else{
            die("Usuario no encontrado");
        }
        Manera anterior de trabajarlo
        echo $nombre;
        echo "<br>";
        echo $passw;
        die();
        return view('validacion')
        ->with('email', $email)
        ->with('passw', $passw);*/
    }

    /*Se bloquean estas funciones para poderlas usar en el otro controlador 
    public function registro(){
        return view('registro');
    }

    public function guardar(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        
        //dd($name, $email, $password);
        //die();

        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        die("Usuario guardado");
    }
*/
    public function menulog(Request $request){
        //Llamar a la sesion 
        $id = session('id');

        $user = DB::table('users')->where('id', '=', $id)->first();
        //dump($user);

        $materias = DB::table('materias')
        ->join('alumnoMateria', 'alumnoMateria.idMateria', '=', 'materias.id')
        ->where('alumnoMateria.idAlumno', '=' , $user->id)->get();

        //dump($materias);


        return view('menuLogeado', compact('materias', 'user'));
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }

    public function materias(){
        $materias = DB::table('materias')->get();
        //Select * from materias

        return view('materias', compact('materias'));

    }
  
}
