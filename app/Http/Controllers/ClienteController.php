<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use Input;
use Storage;

class ClienteController extends Controller
{

    public function index()
    {
    	$clientes = Cliente::all();
        return view('admin.clientes.index', compact('clientes')); 
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('admin.clientes.create', compact('productos'));
    }

    public function store($request)
    {
        $clientes = new Cliente;
 
        $clientes->documento_cliente = $request->documento_cliente;
        $clientes->nombre_cliente = $request->nombre_cliente;
        $clientes->apellido_cliente = $request->apellido_cliente;
        $clientes->direccion_cliente = $request->direccion_cliente;
        $clientes->telefono_cliente = $request->telefono_cliente;
        $clientes->id_tipo_cliente = $request->id_tipo_cliente;
 
        $clientes->save();;
 
        return redirect('admin/clientes')->with('message','Guardado Satisfactoriamente !');
    }

    public function edit($documento_cliente){
        $clientes = Cliente::find($documento_cliente);
        return view('admin/clientes.edit',['clientes'=>$clientes]);
    }

    public function update(ItemUpdateRequest $request, $documento_cliente){        
        $clientes = Cliente::find($documento_cliente);
    
        $clientes->nombre_cliente = $request->nombre_cliente;
        $clientes->apellido_cliente = $request->apellido_cliente; 
        $clientes->direccion_cliente = $request->direccion_cliente; 
        $clientes->telefono_cliente = $request->telefono_cliente; 
        $clientes->id_tipo_cliente = $request->id_tipo_cliente; 
    
        $clientes->save();
    
        Session::flash('message', 'Editado Satisfactoriamente !');
        return Redirect::to('admin/clientes');
    }

    public function delete($documento_cliente){
        $clientes = Cliente::find($documento_cliente);
 
        foreach($clientes as $client){
            Storage::delete($client['clientes']);
        }
 
        Cliente::destroy($documento_cliente);        
 
        Session::flash('message', 'Eliminado Satisfactoriamente !');
        return Redirect::to('admin/cliente');
    }
}
