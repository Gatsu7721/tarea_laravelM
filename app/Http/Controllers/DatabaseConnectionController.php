<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatabaseConnectionController extends Controller
{
    public function testConnection()
    {
        try {
            DB::connection()->getPdo();
            return view('database_connection', ['message' => 'Conexión exitosa a la base de datos']);
        } catch (\Exception $ex) {
            return view('database_connection', ['message' => 'Error en la conexión a la base de datos: ' . $ex->getMessage()]);
        }
    }
}
