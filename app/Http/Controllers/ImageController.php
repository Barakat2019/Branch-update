<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class ImageController extends Controller
{
    public function resizeImage()
    {
        return view('Images.resize-image');
    }
    public function resizeImageSubmit(Request $request)
    {
        $image=$request->file;
        $filename=$image->getClientOriginalName();
        $image_resize=Image::make($image->getRealPath());

        $image_resize->resize(300,300);

        $image_resize->save(public_path('image/'.$filename));

        return "image has been resized successfully";
    }

    //upload Image using DropZone
    public function dropzone()
    {
        return view('Images.dropzone');
    }

    public function dropzoneStore(Request $request)
    {
        $image=$request->file('file');
        $imageName=time().'.'.$image->extension();
        $image->move(public_path('image'),$imageName);

        return response()->json(['success'=>$imageName]);
    }

    //Lazy Image
    public function gallery()
    {
        return view('Images.gallery');
    }

    
     
}
