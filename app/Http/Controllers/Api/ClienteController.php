<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;



class ClienteController extends Controller
{
    public function index(){
        $clientes = Cliente::all();
        return response()->json([
            "result" => $clientes
        ], Response::HTTP_FOUND);
    }
    public function New(Request $request){

        $cliente = new Cliente();

        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->dni = $request->dni;
        $cliente->email = $request->email;
        $cliente->passwd = $request->passwd;

        $cliente->save();
        
        return response()->json(['result'=> $cliente], Response::HTTP_ACCEPTED);
    }
    public function update(Request $request, $id){

        $cliente = Cliente::findOrFail($request->id);

        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->dni = $request->dni;
        $cliente->email = $request->email;
        $cliente->passwd = $request->passwd;

        $cliente->save();
        
        return response()->json(['result' => $cliente], Response::HTTP_OK);

    }
    public function destroy($id){
        Cliente::destroy($id);
        return response()->json(['message'=>'DELETED or destroyed'], Response::HTTP_OK);
    }
}
