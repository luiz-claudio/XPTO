<?php

namespace App\Services;

use App\Contato;
use App\Endereco;
use App\Dados;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\DadosResource;

class ContatosService
{


public function create($data)
{
    DB::beginTransaction();
    try{
        
        $agenda =  Dados::create([

        'nome'          => $data['nome'],
        'nascimento'    => $data['nascimento'], 
    ]);
 
   if(isset($data['telefone_celular']) or isset($data['email']))
    {
        
        $agenda->contato = Contato::create([

            'dados_id'              => $agenda->id,
            'telefone_celular'      => $data['telefone_celular'],
            'telefone_residencial'  => $data['telefone_residencial'],
            'email'                 => $data['email'],
            
        ]);

    }
  
    if(isset($data['rua']))
    {       
        $agenda->endereco = Endereco::create([

            'dados_id'        => $agenda->id,
            'cep'             => $data['cep'],
            'rua'             => $data['rua'],
            'complemento'     => $data['complemento'],
            'numero'          => $data['numero'],
            'bairro'          => $data['bairro'],
            'cidade'          => $data['cidade'],
            'estado'          => $data['estado'],
            'pais'            => $data['pais'],
        ]);
    }
   
    DB::commit();
    return $agenda;
    
    } catch(\Exception $e){
        DB::rollBack();
        throw $e;
    }

}

public function update($data,$id)
{    
    DB::beginTransaction();
    try{
        $agenda                   = Dados::find($id);
        $agenda->nome             = $data['nome'];
        $agenda->nascimento       = $data['nascimento'];
        $agenda->save();

       $contato = DB::table('contatos')->where('dados_id',$agenda->id)->first();
       $agenda->contato = Contato::find($contato->id);       
       
       $agenda->contato->telefone_celular        = $data['telefone_celular'];
       $agenda->contato->telefone_residencial    = $data['telefone_residencial'];
       $agenda->contato->email                   = $data['email'];
       $agenda->contato->save();

       $endereco = DB::table('enderecos')->where('dados_id',$agenda->id)->first();
       $agenda->endereco = Endereco::find($endereco->id);

       $agenda->endereco->cep             = $data['cep'];
       $agenda->endereco->rua             = $data['rua'];
       $agenda->endereco->complemento     = $data['complemento'];
       $agenda->endereco->numero          = $data['numero'];
       $agenda->endereco->bairro          = $data['bairro'];
       $agenda->endereco->cidade          = $data['cidade'];
       $agenda->endereco->estado          = $data['estado'];
       $agenda->endereco->pais            = $data['pais'];
       $agenda->endereco->save();

       
        DB::commit();
        return $agenda;
          
    }catch(\Exception $e)
    {
        DB::rollBack();
        return ('error');

    }  
     
     
  
}

public function excluir($id)
{
    DB::beginTransaction();
    try{
    DB::table('enderecos')->where('dados_id',$id)->delete();
    DB::table('contatos')->where('dados_id',$id)->delete();
    Dados::find($id)->delete();

    DB::commit();
    return ('Registro Excluido');

    }catch(\Exception $e)
    {
        DB::rollBack;
        
        return ('Erro ao tentar excluir registro');
    }  


}

public function show($id)
{   
    $dados = Dados::find($id);
    if(isset($dados)){
    return new DadosResource($dados);
    }
    else
    {
        return ('Nehum Registro Encontrado!');
    }
}

public function listar()
{
    $dados = Dados::all();
    if(isset($dados))
    {
     return  DadosResource::collection($dados);
    }
    else
    {
     return ('Nenhum Registro Encontrado!');
    }

    
}



}