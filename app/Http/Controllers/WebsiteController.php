<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Service;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        return view('page1');
    }

    public function index2(){
        return view('admin.page2');
    }

    public function listCustomers(){
        // SELECT * FROM CUSTOMERS;
        $this->prepareData();
        $data = Customer::all();
        $title = "List of Customers - DOO1";
        return view('listCustomer',['mydata'=>$data,'title'=>$title]);
    }

    public function viewCustomer($id){
        // SELECT * FROM CUSTOMERS WHERE ID = ?
        $obj = Customer::findOrFail($id);
        $title= "View Customer - D0020";
        $this->prepareData();
        return view('viewCustomer',compact('obj','title'));
    }

    public function viewCustomer2($id){
        // SELECT * FROM CUSTOMERS WHERE ID = ?
        $obj = Customer::findOrFail($id);
        $title= "View Customer - D0020";
        return view('viewCustomer')
            ->with('obj',$obj)
            ->with('title',$title);
    }

    public function prepareData(){
        $store_name = "Antonine University 2";
        $telephone_number = 1324676542;
        $address= "Baabda 2";
        $fax ="12345";
        $services = Service::all();
        \View::share(['services'=>$services,'storeName'=>$store_name,'telephone'=>$telephone_number,'address'=>$address,'fax'=>$fax]);
    }

    public function addCustomer(){
        return view('addCustomer');
    }

    public function saveCustomer(Request $request){
        $obj = new Customer();
        $obj->first_name = $request->first_name;
        $obj->last_name= $request->input("last_name","default value");
        $obj->telephone= $request->telephone;
        $obj->save();

        Customer::create($request->all());

        return redirect()->route('list-customers');
    }

    public function deleteCustomer($id){
        $obj = Customer::findOrFail($id);
        $obj->delete();
        return redirect()->route('list-customers');
    }

    public function editCustomer($id){
        $obj = Customer::findOrFail($id);
        return view('updateCustomer',compact('obj'));
    }

    public function updateCustomer($id,Request $request){
        $obj = Customer::findOrFail($id);
        $obj->fill($request->all());
        $obj->save();
        return redirect()->route('list-customers');
    }
}
