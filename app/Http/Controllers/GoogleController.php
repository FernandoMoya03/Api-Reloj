<?php

namespace App\Http\Controllers;
use App\UbicacionModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function index()
    {
        //$results = DB::select('select id, latitud, longitud from ubicacion');

        return view('googleAutocomplete');
    }


    public function registarCoordenadas(Request $request){
       
         $user = new UbicacionModel();
         $user->latitud = $request->latitud;
         $user->longitud = $request->longitud;
         
         if ($user->save())
             return response()->json("Se insertaron bien las coordenas!!",202);

     }

     public function obtenerCoordenadas(){
        //return response()->json([UbicacionModel::all()],200);
        return response()->json($results = DB::select('select id, latitud, longitud from ubicacion'));
    }
}
