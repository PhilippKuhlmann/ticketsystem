<?php

namespace App;

use App\Notifications\VerifyEmail;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;

    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'username', 'email', 'password', 'verifyToken',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     *  Relationships
     */
     public function createdTickets()
     {
         return $this->hasMany('App\Ticket', 'crator_id');
     }

     public function editTickets()
     {
         return $this->hasMany('App\Ticket', 'editor_id');
     }



    public function verified()
    {
        return $this->verifyToken === null;
    }

    public function sendVerificationEmail()
    {
        $this->notify(new VerifyEmail($this));
    }
}
