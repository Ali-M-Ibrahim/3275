<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return view('template.index',compact('customers'));
    }

    public function about(){
        return view('template.about');
    }

    public function services(){
        return view('template.service');
    }
}
