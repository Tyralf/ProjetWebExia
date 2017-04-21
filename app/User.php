<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'name', 'prenom' ,'email', 'password','ID_Ecole','ID_Type_User',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany('App\Activite','ID_Author');
    }

    public function comments()
    {
        return $this->hasMany('App\Commentaire','ID_User');
    }
    public function can_post()
    {
        $role = $this->ID_Type_User;
        if($role == 3 || $role == 2)
        {
            return true;
        }
        return false;
    }
    public function is_admin()
    {
        $role = $this->ID_Type_User;
        if($role == 3)
        {
            return true;
        }
        return false;
    }

}

//yolo