<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayrollComponent extends Model
{

	protected $table = 'payroll_components';

	protected $fillable = [
        'component_id', 'payroll_id', 'amount', 'date',
    ];

    public function payroll(){

    	return $this->belongsTo(Payroll::class);
    }

    public function component()
    {
        return $this->belongsTo(Component::class);
    }

}
