<?php

namespace App;

use App\Ticket;

use Illuminate\Database\Eloquent\Model;

class TicketFeed extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ticket_id', 'feed',
    ];

    /**
     *  Relationships.
     */
    public function ticket()
    {
        return $this->belongsTo('App\Ticket');
    }

}
