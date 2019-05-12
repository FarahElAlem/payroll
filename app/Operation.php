<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
	protected $fillable = [
	    'name'
  ];
    public function componentType(){

    	return $this->hasOne(ComponentType::class);
    }
}
