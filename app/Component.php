<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'components';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['component_type_id', 'name', 'description'];

    public function componentType(){

        return $this->belongsTo(ComponentType::class);
    }

    public function payrolls()
    {
        return $this->belongsTo(Payroll::class, 'payroll_components');
    }



    
}
