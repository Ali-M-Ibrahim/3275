<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class CustomerResource extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mydata = Customer::all();
        return view('customer.list',compact('mydata'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

//        $hashed = Hash::make("123");
//        $response = Hash::check(2123,$hashed);
//return $response;
        $request->validate([
           'first_name'=>'required|max:10|min:3|unique:customers',
            'last_name'=>'required',
            'telephone'=>'required|numeric',
             'password'=>'required|confirmed'
//            'password'=>'required|same:c_password'
        ],
        [
            'unique'=>'the :attribute should be unique and not taken '
        ]);


        Customer::create($request->all());
        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $obj = Customer::findOrFail($id);
        return view('customer.view',compact('obj'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $obj = Customer::findOrFail($id);
        return view('customer.edit',compact('obj'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $obj = Customer::findOrFail($id);
        $obj->fill($request->all());
        $obj->save();
        return redirect()->route('customer.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obj = Customer::findOrFail($id);
        $obj->delete();
        return redirect()->route('customer.index');
    }
}
