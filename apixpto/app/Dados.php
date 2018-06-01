<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contato;
use App\Endereco;

class Dados extends Model
{
    public static function boot() {
        parent::boot();
    
    static::creating(function($model){
        foreach ($model->toArray() as $key => $value) {
            $model->{$key} = empty($value) ? null : $value;
        }
    });
}


protected $table = 'dados';
protected $hidden = ['created_at','updated_at'] ;
protected $fillable = ['nome','nascimento'];

    
public function contato()
{
    return $this->hasOne("App\Contato");
}

public function endereco()
{
    return $this->hasOne("App\Endereco");
}

}
