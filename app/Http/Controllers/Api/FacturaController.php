<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Factura;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FacturaController extends Controller

{
    public function index(){
        $facturas = Factura::all();
        
        return response()->json(["result" => $facturas], Response::HTTP_FOUND);
    }
    public function new( Request $request){
        $factura = new Factura();
        
        $factura -> id_reserva = $request->id_reserva;
        $factura -> monto = $request->monto;
        $factura -> fecha_factura  = $request->fecha_factura;
        
        $factura->save();

        return response()->json(["RESULTADO"=> $factura], Response::HTTP_ACCEPTED);
    }
    public function update( Request $request, $id){
        $factura = Factura::findOrFail($request->id);

        $factura-> id_reserva = $request->id_reserva;
        $factura-> monto = $request->monto;
        $factura-> fecha_factura = $request->fecha_factura;

        $factura->save();

        return response()->json(["RESULRADO"=>$factura], Response::HTTP_OK);

    }
    public function destroy($id){
        Factura::destroy($id);
        return response()->json(["SE BOROR EL DOCUMENTO {$id}"], Response::HTTP_ACCEPTED);
    }
}
