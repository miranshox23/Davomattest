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
    // public function setCustomerLastNameAttribute($value)
    // {
    //     $this->attributes['customer_last_name'] = $value ? strtoupper($value) : null;
    // }
    // public function setCustomerFirstNameAttribute($value)
    // {
    //     $this->attributes['customer_first_name'] = $value ? ucwords($value) : null;
    // }
    // public function setAddressPlaceAttribute($value)
    // {
    //     $this->attributes['address_place'] = $value ? strtoupper($value) : null;
    // }
    // public function setEmailAttribute($value)
    // {
    //     $this->attributes['email'] = $value ? strtolower($value) : null;
    // }

    /* -------------------------------------------------------------------------------------------- */
    // Accessors (GET) Attribute (APPENDED)
    /* -------------------------------------------------------------------------------------------- */
    public function getCustomerAttribute()
    {
        return implode(' ', array_filter([$this->attributes['department_name'], $this->attributes['employees']]));
    }
    public function getAddressAttribute()
    {
        return implode(' ', array_filter([
            $this->attributes['tea'],
            $this->attributes['tea'],
        ]));
    }
    public function getPlaceAttribute()
    {
        return implode(' ', array_filter([$this->attributes['employees_second_after5'], $this->attributes['tea_second']]));
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
