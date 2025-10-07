<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Credential;
use App\Models\Customer;
use App\Models\Service;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(){
        // select * from customers where id=2;
        $data = Customer::find(2);
        $creds = $data->getCredential;
        $accounts =  $data->getAccounts;
        $services = $data->getServices;

         $credentials = Credential::find(2);
         $data = $credentials->getCustomer;

         $accont = Account::find(2);
         $data= $accont->getCustomer->getCredential;

         $service = Service::find(2);
        $data= $service->getCustomers;

        return $data;

    }
}
