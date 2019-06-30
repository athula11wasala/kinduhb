<?php

namespace App\Traits;

use Illuminate\Support\Facades\Validator;

trait StudentValidators {

    protected function rule($method, $data) {

        switch ($method) {
            case 'GET':

            case 'POST': {
                    return [
                        'selTeacher' => 'required',
                        'selClass' => 'required',
                        'inputfname' => 'required',
                        'inputlname' => 'required',
                        'inputYear' => 'required',
                        'selGender' => 'required',
                    ];
                }
            case 'ChkExistData': {

                    return [
                    ];
                }


            case 'PUT': {
                
                return [
                        'selTeacher' => 'required',
                        'selClass' => 'required',
                        'inputfname' => 'required',
                        'inputlname' => 'required',
                        'inputYear' => 'required',
                        'selGender' => 'required',
                    ];
                    
                }
            case 'DELETE': {

                    return [ 'hndStudnetId' => 'required'
                    ];
                }

            default:
                break;
        }
    }

    protected function studentValidate(array $data, $method = "POST") {

      
        $messages = [

            'hndStudnetId.required' => 'Please add Studnet Id',
            'selTeacher.required' => 'Please add Teacher',
            'selClass.required' => 'Please add Class',
            'inputlname.required' => 'Please add LastName',
            'inputfname.required' => 'Please add FirstName',
            'inputYear.required' => 'Please add Year',
            'selGender.required' => 'Please add Gender',
        ];
        
       
        if ($method == "POST") {
    
            return Validator::make($data, $this->rule($method, $data), $messages);
        } 
        if ($method == 'DELETE') {
    
            return Validator::make($data, $this->rule($method, $data), $messages);
        }
        if($method =="PUT" ){
            return Validator::make($data, $this->rule($method, $data), $messages); 
        }
            
    }

}
