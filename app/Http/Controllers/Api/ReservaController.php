<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;



class ReservaController extends Controller
{
    public function index(){
        $reserva = Reserva::all();
        return response()->json([
            "RESULTADO"=>$reserva
        ], Response::HTTP_FOUND);
    }

    public function new( Request $request){
        $reserva = new Reserva();

        $reserva -> id_restaurante = $request->id_restaurante;
        $reserva -> id_cliente = $request->id_cliente;
        $reserva -> cant = $request->cant;

        $reserva -> save();

        return response()->json([
            "RESULTADO"=>$reserva
        ], Response::HTTP_ACCEPTED);

    }
    public function update( Request $request, $id){

        $reserva = Reserva::findOrFail($request ->id);

        $reserva -> id_restaurante = $request->id_restaurante;
        $reserva -> id_cliente = $request -> id_cliente;
        $reserva -> cant = $request->cant;

        $reserva->save();

        return response()->json([
            "RESULTADO"=>$reserva
        ], Response::HTTP_ACCEPTED);

    }
    public function destroy( $id ){
        Reserva::destroy($id);
        return response()->json([
            "RESULTADO"=>"BORRADO"
        ], Response::HTTP_OK);

    }
}
