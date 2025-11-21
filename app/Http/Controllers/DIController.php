<?php

namespace App\Http\Controllers;

use App\Services\LoggingService;
use Illuminate\Http\Request;

class DIController extends Controller
{
    public $globalService;
    public function __construct(LoggingService $service)
    {
        $this->globalService = $service;
    }

    public function old(){

        $service = new LoggingService();
        $service->doLog("this is my log from old way");
        return "done";
    }

    function methodDi(LoggingService $service){
        $service->doLog("log from function DI");
        return "doe";
    }

    function f1()
    {
        $this->globalService->doLog("log from f1");
    }

    function f2()
    {
        $this->globalService->doLog("log from f2");

    }


}
