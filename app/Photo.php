<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'ID_Photo', 'Is_Deleted', 'Date', 'Url', 'ID_Activite', 'ID_Type_photo'
    ];
}
