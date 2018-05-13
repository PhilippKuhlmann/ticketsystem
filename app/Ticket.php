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
        'title', 'body', 'creator_id', 'editor_id', 'customer_id', 'employee_id', 'status_id', 'priority_id', 'action_id',
    ];

    /**
     *  Relationships.
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }

    public function editor()
    {
        return $this->belongsTo('App\User', 'editor_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function priority()
    {
        return $this->belongsTo('App\Priority');
    }

    public function action()
    {
        return $this->belongsTo('App\Action');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function ticketFeeds()
    {
        return $this->hasMany('App\TicketFeed');
    }
}
