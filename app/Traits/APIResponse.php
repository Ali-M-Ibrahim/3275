<?php

namespace App\Traits;

trait APIResponse
{
    public function successResponse($data=null,$code =200){
        return response(['success'=>'true','data'=>$data,'code'=>$code],$code);
    }

    public function errorResponse($data=null,$code =500){
        return response(['success'=>'false','error'=>$data,'code'=>$code],$code);
    }

}
