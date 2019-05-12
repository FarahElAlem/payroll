<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComponentType extends Model
{

	protected $table = 'componenttypes';

	protected $fillable = [
        'operation_id', 'name',
    ];

    public function operation(){

    	return $this->belongsTo(Operation::class);
    }
    public function component(){

        return $this->hasOne(Component::class);
    }
}
