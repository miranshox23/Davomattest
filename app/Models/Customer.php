<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'department_name',
        'employees',
        'employees_after17',
        'fasting',
        'tea',
        'employees_second',
        'employees_second_after5',
        'fasting_second',
        'email',
        'tea_second',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'customer',
        'address',
        'place',
    ];

    /* -------------------------------------------------------------------------------------------- */
    // Mutators (SET) Attribute
    /* -------------------------------------------------------------------------------------------- */
    public function setCustomerLastNameAttribute($value)
    {
        $this->attributes['department_name'] = $value ? strtoupper($value) : null;
    }
 
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = $value ? strtolower($value) : null;
    }

    /* -------------------------------------------------------------------------------------------- */
    // Accessors (GET) Attribute (APPENDED)
    /* -------------------------------------------------------------------------------------------- */
    public function getCustomerAttribute()
    {
        return implode(' ', array_filter([$this->attributes['department_name'], $this->attributes['employees']]));
    }
    

    /* -------------------------------------------------------------------------------------------- */
    // Accessors (GET) Attribute
    /* -------------------------------------------------------------------------------------------- */

    /* -------------------------------------------------------------------------------------------- */
    // Overrides
    /* -------------------------------------------------------------------------------------------- */

    /* -------------------------------------------------------------------------------------------- */
    // Relationships
    /* -------------------------------------------------------------------------------------------- */

    /* -------------------------------------------------------------------------------------------- */
    // Actions
    /* -------------------------------------------------------------------------------------------- */

    /* -------------------------------------------------------------------------------------------- */
    // Construction
    /* -------------------------------------------------------------------------------------------- */
}
