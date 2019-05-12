<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{

	protected $table = 'payrolls';

	protected $fillable = [
        'employee_id', 'status',
    ];

    public function employee(){

    	return $this->belongsTo(Employee::class);
    }

    public function components()
    {
        return $this->hasMany(Component::class, 'components');
    }

    public function payrollcomponents()
    {
        return $this->hasMany(PayrollComponent::class, 'payroll_components');
    }
}
