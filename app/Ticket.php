<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'creator_id', 'editor_id',
    ];

    /**
     *  Relationships
     */
     public function creator()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }

    public function editor()
    {
        return $this->belongsTo('App\User', 'editor_id');
    }
}
