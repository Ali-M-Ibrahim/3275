<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    function index(){
        return "i am index function from first controller";
    }

    function details($id=0){
        return "i am details function from first controller and the id is: " . $id;
    }

    function json(){
        return response()->json(["data"=>"this is my data"]);
    }

}
