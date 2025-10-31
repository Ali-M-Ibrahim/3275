<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index(){
        return view('upload.form');
    }

    public function list(){
        $data = Image::all();
        return view('upload.list',compact('data'));
    }

    public function method1(Request $request){
        if($request->hasFile('document')){
            // to get image name
            $imageName = $request->file('document')->getClientOriginalName();
            $newName = time() . "-" . $imageName;
            // to create a copy of the image in public folder, under images directory
            $request->file('document')->move('images',$newName);

            // saving row to db
            $img  = new Image();
            $img->name = $imageName;
            $img->path = '/images/'.$newName;
            $img->save();

            return "document received";
        }else{
            return "document not received";
        }
    }

    public function method2(Request $request){
        if($request->hasFile('document')){
            // to get image name
            $imageName = $request->file('document')->getClientOriginalName();
            $newName = time() . "-" . $imageName;
            // to create a copy of the image in storage folder, under images directory
            $request->file('document')->storeAs('images',$newName);

            // saving row to db
            $img  = new Image();
            $img->name = $imageName;
            $img->path = 'storage/images/'.$newName;
            $img->save();

            return "document received";
        }else{
            return "document not received";
        }
    }

    public function method3(Request $request){
        if($request->hasFile('document')){
            // to get image name
            $imageName = $request->file('document')->getClientOriginalName();
            // to create a copy of the image in storage folder, under images directory
            $newName = $request->file('document')->store('images','public');

            // saving row to db
            $img  = new Image();
            $img->name = $imageName;
            $img->path = 'storage/images/'.$newName;
            $img->save();

            return "document received";
        }else{
            return "document not received";
        }
    }

}
