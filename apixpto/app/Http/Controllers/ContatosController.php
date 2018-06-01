<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContatosService;
use App\Http\Requests\ContatoRequest;
use App\Http\Requests\ContatoUpdateRequest;


class ContatosController extends Controller
{
    private $service;

    public function __construct(ContatosService $service)
    {
        $this->service = $service;

    }

    
    public function store(ContatoRequest $ContatoRequest)
    {
        $data = $ContatoRequest->all();
        $agenda= $this->service->create($data);      
        return response()->json($agenda);
    }
  

    public function update(ContatoUpdateRequest $ContatoUpdateRequest,$id)
    {
        $data    = $ContatoUpdateRequest->all();
        $contato = $this->service->update($data, $id);
        return response()->json($contato);
    }

  
    public function destroy($id)
    {
        $agenda = $this->service->excluir($id);
        return response()->json($agenda);        
    }

    public function show($id)
    {   
       $dados= $this->service->show($id);
       return response()->json($dados);
    }

    public function index()
    {
       $dados= $this->service->listar();
       return response()->json($dados);      
    }


}
