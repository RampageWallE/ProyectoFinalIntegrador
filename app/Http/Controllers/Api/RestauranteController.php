<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurante;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestauranteController extends Controller
{
    public function index(){
        $restaurantes = Restaurante::all();
        
        return response()->json([
            "RESULTADO"=> $restaurantes
        ], Response::HTTP_OK);
    }
    public function new(Request $request){
        $restaurante = new Restaurante();

        $restaurante-> nombre = $request -> nombre;
        $restaurante-> mesas = $request -> mesas;
        $restaurante-> direccion = $request -> direccion;

        $restaurante->save();

        return response()->json([
            "RESULTADO"=> $restaurante
        ], Response::HTTP_ACCEPTED);  
   }
   
    public function update(Request $request, $id){
        $restaurante = Restaurante::findOrFail($request -> id);

        $restaurante -> nombre = $request -> nombre;
        $restaurante -> mesas = $request -> mesas;
        $restaurante -> direccion = $request -> direccion;

        $restaurante->save();

        return response()->json([
            "RESULTADO" => $restaurante
        ], Response::HTTP_ACCEPTED);

    }
    public function destroy($id){
        Restaurante::destroy($id);
        return response()->json([
            "RESULTADO"=>"SE ELIMINO EL RESTAURANTE {$id}"
        ], Response::HTTP_OK);
    }
}
