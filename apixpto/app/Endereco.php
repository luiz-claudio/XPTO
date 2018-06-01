<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{

     //Função para trocar o valor empty para null
     public static function boot() {
        parent::boot();

        static::creating(function($model){
            foreach ($model->toArray() as $key => $value) {
                $model->{$key} = empty($value) ? null : $value;
            }
        });
    }


    protected $table = 'enderecos';
    
    protected $hidden = ['id','dados_id','created_at','updated_at'] ;

    protected $fillable = ['dados_id','cep','rua','bairro','numero'
    ,'complemento','cidade','estado','pais'];

  
  
}
