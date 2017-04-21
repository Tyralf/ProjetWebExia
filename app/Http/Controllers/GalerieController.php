<?php

namespace App\Http\Controllers;

use App\Activite;
use Illuminate\Http\Request;
use App\Photo;
use Validator;

class GalerieController extends Controller
{
    public function index()
    {
        $photos = Photo::paginate(20);
        return view('galerie')->with('photos', $photos);
    }

    public function create()
    {
        return view('add-new-image');
    }

    public function store(Request $request)
    {
        // Validation //
        $validation = Validator::make($request->all(), [
            'userfile'    => 'required|image|mimes:jpeg,png|min:1|max:2500'
        ]);

        // Check if it fails //
        if( $validation->fails() ){
            return redirect()->back()->withInput()
                ->with('errors', $validation->errors() );
        }

        $photo = new Photo;
        $activite = Activite::where('titre','=',$request->input('NomActivite'))->first();
        $activite = $activite->id;
        // upload the image //
        $file = $request->file('userfile');
        $destination_path = 'uploads/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $file->move($destination_path, $filename);

        // save image data into database //
        $photo->Url = $destination_path . $filename;
        $photo->Is_Deleted = 1;
        $photo->ID_Activite = $activite;
        $photo->save();

        return redirect('/')->with('message','You just uploaded an image!');
    }

    public function update(Request $request, $id)
    {
        // Validation //
        $validation = Validator::make($request->all(), [
            'caption'     => 'required|regex:/^[A-Za-z ]+$/',
            'description' => 'required',
            'userfile'    => 'sometimes|image|mimes:jpeg,png|min:1|max:250'
        ]);

        // Check if it fails //
        if( $validation->fails() ){
            return redirect()->back()->withInput()
                ->with('errors', $validation->errors() );
        }

        // Process valid data & go to success page //
        $photo = Photo::find($id);

        // if user choose a file, replace the old one //
        if( $request->hasFile('userfile') ){
            $file = $request->file('userfile');
            $destination_path = 'uploads/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $file->move($destination_path, $filename);
            $photo->file = $destination_path . $filename;
        }

        // replace old data with new data from the submitted form //
        $photo->caption = $request->input('caption');
        $photo->description = $request->input('description');
        $photo->save();

        return redirect('/')->with('message','You just updated an image!');
    }

    public function destroy($id)
    {
        $photo = Photo::find($id);
        $photo->delete();
        return redirect('/')->with('message','You just uploaded an image!');
    }

    public function show($id)
    {
        $photo = Photo::find($id);
        return view('image-detail')->with('photo', $photo);
    }

    public function edit($id)
    {
        $photo = Photo::find($id);
        return view('edit-image')->with('photo', $photo);
    }
}
