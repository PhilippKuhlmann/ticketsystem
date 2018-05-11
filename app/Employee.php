<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'firstName', 'lastName', 'email',
    ];

    /**
     *  Relationships
     */
     public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
}
