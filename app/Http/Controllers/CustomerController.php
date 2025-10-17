<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CustomerController extends Controller
{
    public function create1(){
        $obj = new Customer();
        $obj->first_name = "Ali";
        $obj->last_name= "Ibrahim";
        $obj->telephone= "12345";
        $obj->save();
        return "the customer has been created";
    }

    public function create2(){
        Customer::create([
           'first_name'=>"Ribal",
           'last_name'=>"Mokdad",
           'telephone'=>1234567
        ]);
        return "the customer has been created";
    }

    public function create3(){
        DB::table('customers')->insert([
            'first_name'=>"Joe",
            'last_name'=>"Mokdad",
            'telephone'=>1234567,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }

    public function create4(Request $request){

        $obj = new Customer();
        $obj->first_name = $request->first_name;
        $obj->last_name= $request->input("last_name","default value");
        $obj->telephone= $request->telephone;
        $obj->save();


        Customer::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'telephone'=>$request->telephone,
        ]);


        return "ok i am the function";
    }

    public function create5(Request $request){
        Customer::create($request->all());
        return "ok i am the function";
    }

    public function update1($id,Request $request){
        // select * from customers where id = ?
        $obj = Customer::find($id);
        $obj->first_name = $request->first_name;
        $obj->last_name= $request->input("last_name","default value");
        $obj->telephone= $request->telephone;
        $obj->save();
        return "ok i am the function";
    }


    public function update2($id,Request $request){
        // select * from customers where id = ?
        $obj = Customer::find($id);
        $obj->fill([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'telephone'=>$request->telephone,
        ]);
        $obj->save();
        return "ok i am the function";
    }

    public function update3($id,Request $request){
        // select * from customers where id = ?
        $obj = Customer::find($id);
        $obj->fill($request->all());
        if($obj->isClean()){
            return "no data change";
        }
        $obj->save();
        return "ok i am the function";
    }

    public function massUpdate(){
        //update customers set first_name="joe" where id > 0;
        Customer::where('id',">",0)
            ->update(["first_name"=>"JOE"])
            ;
        return "done";
    }


    public function delete1($id){
        // select * from customers where id = ?
        $obj = Customer::find($id);
        $obj->delete();
        return "done";
    }

    public function massDelete(){
        //delete from customers where id > 0;
        Customer::where('id',">",0)
            ->delete()
        ;
        return "done";
    }



    public function getAll(){
        // SELECT * FROM CUSTOMERS
        $data = Customer::all();
        return $data;
    }

    public function getById($id){
        // select * from customers where id=?;
        // $data =Customer::find($id);

//        $data =Customer::findOrFail($id);

        $data = Customer::findOr($id, function(){
            return "no customer found";
        });

        return $data;

    }

    public function condition(){
        // select * from customers where id > 0;
        $data = Customer::where("id",">",0)
            //->get(); // will return array
           ->first();
        return $data;
    }

    public function condition2(){
        // select * from customers where id>0 and telephone=1234567
        $data = Customer::where("id",">",0)
            ->where('telephone',"1234567")
            ->get();
        return $data;
    }

    public function conditionOr(){
        // select * from customers where id>0 and telephone=1234567
        $data = Customer::where("id","<",10)
            ->Orwhere('telephone',"1234567")
            ->get();
        return $data;
    }

    public function consitionSelect(){
        // select first_name, telephone from customer where  telephone=12345674
        $data= Customer::where('telephone',"1234567")
            ->select(["first_name","last_name"])
            ->get();
        return $data;
    }

    public function conditionIn(){
        // select * from customers where id =0  or id =1 or id=2
        // select * from customers where id in (1,2,3)
        $data = Customer::whereIn("id",[1,2,3,4,5,6,7,8,11,12])
            ->get();
        return $data;

    }


    public function conditionBetween(){
        // select * from customers where id between 1 and 11 limit 2
        $data = Customer::whereBetween("id",[1,11])
            ->take(2)
            ->get();
        return $data;

    }

    public function conditionLike(){
        $data = Customer::where("first_name","like","%a%")
            ->orderBy("id","desc")
            ->get();
        return $data;

    }

    public function stats(){
        $sum = Customer::where("id",">","0")->sum("telephone");
        $count = Customer::where("id",">","0")->count();
        $max = Customer::where("id",">","0")->max("id");
        $min = Customer::where("id",">","0")->min("id");
        $avg = Customer::where("id",">","0")->avg("id");
        return $avg;
    }

    public function join(){
        $data = Customer::join("credentials","customers.id","credentials.customer_id")
            ->select(["customers.first_name","credentials.email"])
            ->get();

        return $data;

    }


}
