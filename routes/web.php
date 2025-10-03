<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\SecondController;
use App\Http\Controllers\APIController;
use App\Http\Controllers\InvokController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('route1',function(){
   return "Hello I am route 1";
});

Route::get('route2',function(){
   return 1+2;
});

Route::get('route3',function(){
    return response()->json(["code"=>123, "name"=>"Web Programming 2"]);
});

Route::get('route4',function(Request $request){
    $key = $request->header('secret');
    $token = $request->header('token');
    return "the key is" . $key ."  and t5he token is" .$token;
});

Route::get("route5/{id}",function($id){
    return "the paramter is: " . $id;
});

Route::get("route6/{id}/{name}",function($myid,$myname){
   return "the id is " . $myid ." and the name is " . $myname;
});

Route::get('route7/{id?}',function($id=0){
    return "the paramter is: " . $id;
});


Route::get('route8',function(Request $request){
    $name = $request->input('name',"JOE DOE");
    $course = $request->course;
    $credits = $request->nbCredits;
    return $name;
});

Route::get('route9',function(){
   return response()->json(["data"=>"this is my data"])
   ->header("key-server","this is my key")
   ->header("key2","this is my second key");
});

Route::get("route10",function(){
    return response()->json(["data"=>"this is my datea"])
        ->withHeaders([
           "key1"=>"1",
           "key2"=>2
        ]);
});

Route::get("route11",function(){
    $data = "this is my data";
    return response($data,201);
});

Route::get("route12",function(){
    $data = "this is my data";
    return response($data,Response::HTTP_ACCEPTED);
});

Route::get("getUser/{id}",function($id){
   if($id==1 || $id == 2){
       return "found";
   }else{
       abort(500);
   }
});

Route::post("post-data",function(Request $request){
   return "ok found";
});


Route::get("route13",[FirstController::class, "index"]);
Route::get("route14","App\Http\Controllers\FirstController@index");
Route::get("route15",[
   'uses'=>"App\Http\Controllers\FirstController@index"
]);

Route::get("route16/{id?}",[FirstController::class, "details"]);
Route::get("route17",[FirstController::class, "json"])->name("route-17");

Route::resource('product',SecondController::class);
//->only(["index","create"]);
//->except(["index"]);
Route::apiResource("product2",APIController::class);

Route::get("onlyone",InvokController::class);
