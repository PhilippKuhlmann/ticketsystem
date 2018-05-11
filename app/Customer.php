<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'street', 'zip', 'city', 'email', 'phone', 'fax',
    ];

    /**
     *  Relationships
     */
     public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
}
