<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Activite;
use App\Commentaire;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        //on_post, from_user, body
        $input['ID_User'] = $request->user()->id;
        $input['ID_Activite'] = $request->input('ID_Activite');
        $input['commentaire'] = $request->input('commentaire');
        $slug = $request->input('slug');
        $input['Is_deleted'] = 1;
        Commentaire::create( $input );
        return redirect($slug)->with('message', 'Comment published');
    }
}


