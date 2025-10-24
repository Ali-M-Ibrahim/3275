<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\SecondController;
use App\Http\Controllers\APIController;
use App\Http\Controllers\InvokController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CustomerResource;


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


Route::get('data',[DataController::class,'index']);

Route::get('create1',[CustomerController::class,'create1']);
Route::get('create2',[CustomerController::class,'create2']);
Route::get('create3',[CustomerController::class,'create3']);
Route::post('create4',[CustomerController::class,'create4']);
Route::post('create5',[CustomerController::class,'create5']);

Route::put('update1/{id}',[CustomerController::class,'update1']);
Route::put('update2/{id}',[CustomerController::class,'update2']);
Route::put('update3/{id}',[CustomerController::class,'update3']);

Route::get('massUpdate',[CustomerController::class,'massUpdate']);
Route::delete('delete1/{id}',[CustomerController::class,'delete1']);

Route::get('massDelete',[CustomerController::class,'massDelete']);

Route::get('getAll',[CustomerController::class,'getAll']);
Route::get('getById/{id}',[CustomerController::class,'getById']);

Route::get('condition',[CustomerController::class,'condition']);
Route::get('condition2',[CustomerController::class,'condition2']);

Route::get('conditionOr',[CustomerController::class,'conditionOr']);

Route::get('consitionSelect',[CustomerController::class,'consitionSelect']);

Route::get('conditionIn',[CustomerController::class,'conditionIn']);

Route::get('conditionBetween',[CustomerController::class,'conditionBetween']);
Route::get('conditionLike',[CustomerController::class,'conditionLike']);
Route::get('stats',[CustomerController::class,'stats']);
Route::get('join',[CustomerController::class,'join']);



Route::get('page1',[WebsiteController::class,'index']);
Route::get('page2',[WebsiteController::class,'index2']);


Route::get('list-customers',[WebsiteController::class,'listCustomers'])->name('list-customers');
Route::get('view-customer/{id}',[WebsiteController::class,'viewCustomer'])
->name('view-single-customer');
Route::get('view-customer2/{id}',[WebsiteController::class,'viewCustomer2']);
Route::get('add-customer',[WebsiteController::class,'addCustomer'])->name('add-customer');
Route::post('save-customer',[WebsiteController::class,'saveCustomer'])->name('save-customer');
Route::get('deleteCustomer/{id}',[WebsiteController::class,'deleteCustomer'])->name('delete-customer');
Route::delete('deleteCustomer/{id}',[WebsiteController::class,'deleteCustomer'])->name('delete-customer2');
Route::get('edit-customer/{id}',[WebsiteController::class,'editCustomer'])->name('edit-customer');
Route::put('update-customer/{id}',[WebsiteController::class,'updateCustomer'])->name('update-customer');


Route::resource('customer',CustomerResource::class);
Route::get('deleteResource/{id}',[CustomerResource::class,'destroy'])->name('deleteResource');



