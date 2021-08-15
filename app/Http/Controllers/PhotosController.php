<?php

namespace App\Http\Controllers;

use App\Models\SuperheroImage;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function createPhoto($request,$superhero){
        if ($request->hasFile('photos')){
            $photos = $request->file('photos');
            foreach ($photos as $photo){
                $photosname =$photo->getClientOriginalName();
                $extension = $photo->getClientOriginalExtension();
                $photos_name = date('his')."-".".".$extension;
                $destinationPath = 'photos/';
                $photo->move($destinationPath,$photos_name);

                $photo = new SuperheroImage([
                    'superhero_id' => $superhero->id,
                    'filename'=>$photos_name,
                ]);
                $photo->save();
            }

        }
    }

    public function removePhoto($id){
        if (!empty($id)){
                $photo = SuperheroImage::findorFail($id);
                $photo->delete();
        }

    }

}
