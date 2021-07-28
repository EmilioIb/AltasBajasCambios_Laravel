<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAlumnoMateria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnoMateria', function (Blueprint $table) {
            //Crear tabla alumnoMateria
            $table->id();
            $table->foreignId('idAlumno')->constrained("users"); //Relaciona los campos
            $table->foreignId('idMateria')->constrained("materias"); //Relaciona los campos
            $table->char('letra', 5)->nullable(); //Permite que sea nulo
            $table->float('calif')->nullable(); //Permite que sea nulo
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumnoMateria', function (Blueprint $table) {
            //Eliminar tabla alumnoMateria
            Schema::drop('alumnoMateria');
        });
    }
}
