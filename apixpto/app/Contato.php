<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    public static function boot() {
        parent::boot();
    
    static::creating(function($model){
        foreach ($model->toArray() as $key => $value) {
            $model->{$key} = empty($value) ? null : $value;
        }
    });
}


protected $table = 'contatos';
protected $fillable = ['dados_id','email','telefone_celular','telefone_residencial'];
protected $hidden = ['id','dados_id','created_at','updated_at'] ;  
}
