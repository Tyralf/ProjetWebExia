<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photo';
    protected $fillable = [
        'ID_Photo', 'Is_Deleted', 'Url', 'ID_Activite'
    ];
}
