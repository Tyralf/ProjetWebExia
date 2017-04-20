<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
// instance of Activite class will refer to posts table in database
class Activite extends Model {
    //restricts columns from modifying
    protected $guarded = [];
    // posts has many comments
    // returns all comments on that post
    public function comments()
    {
        return $this->hasMany('App\Comments','ID_Activite');
    }
    // returns the instance of the user who is author of that post
    public function author()
    {
        return $this->belongsTo('App\User','ID_Author');
    }
}