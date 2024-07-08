<?php

namespace App\Trait;

use illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait ImageUploadTrait {
    public function uploadImage(Request $request, $inputName, $path)
    {
        if($request->hasFile($inputName)){
           // if(File::exists(public_path($user->image))){
              //  File::delete(public_path($user->image));
            //}
            $image = $request->$inputName;
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_'.uniqId().'.'.$ext;
            $image->move(public_path($path), $imageName);
           
            return $path.'/'.$imageName;
        }

    }

    public function uploadVideo(Request $request, $inputName, $path)
    {
        if($request->hasFile($inputName)){
           // if(File::exists(public_path($user->image))){
              //  File::delete(public_path($user->image));
            //}
            $video = $request->$inputName;
            $ext = $video->getClientOriginalExtension();
            $videoName = 'media_'.uniqId().'.'.$ext;
            $video->move(public_path($path), $videoName);
           
            return $path.'/'.$videoName;
        }

    }


    public function uploadMultiImage(Request $request, $inputName, $path)
    {
        $imagepaths = [];

        if($request->hasFile($inputName)){

            $images = $request->{$inputName};

            foreach($images as $image) {
                $ext = $image->getClientOriginalExtension();
                $imageName = 'media_' . uniqId() . '.' . $ext;
                $image->move(public_path($path), $imageName);

                $imagepaths[] = $path . '/' . $imageName;
            }

            return $imagepaths;
        }

    }

    public function updateImage(Request $request, $inputName, $path, $oldPath=null)
    {
        if($request->hasFile($inputName)){
            if(File::exists(public_path($oldPath))){
              File::delete(public_path($oldPath));
            }
            $image = $request->$inputName;
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_'.uniqId().'.'.$ext;
            $image->move(public_path($path), $imageName);
           
            return $path.'/'.$imageName;
        }

    }

    public function deleteImage(string $path){
        if(File::exists(public_path($path))){
            File::delete(public_path($path));
        }
    }
}
