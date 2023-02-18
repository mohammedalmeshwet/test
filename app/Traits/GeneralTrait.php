<?php

namespace App\Traits;


trait  GeneralTrait
{
    public function returnError($errNum, $msg)
    {
        return response()->json([
            'status' => false,
            'errNum' => $errNum,
            'msg' => $msg
        ]);
    }

    public function returnSuccessMessage($msg = "")
    {
        return response()->json([
            'status' => true,
            'errNum' => '',
            'msg' => $msg
        ]);
    }

    public function returnData($key, $value, $msg="")
    {
        return response()->json([
            'status' => true,
            'errNum' => '',
            'msg' => $msg,
            $key => $value
        ]);
    }

    public function returnValidationError($validator)
    {
        $inputs = array_keys($validator->errors()->toArray());
        $code = [];
       foreach($inputs as $input){
           array_push($code, $this->getErrorCode($input));
       }
         return $this->returnError($code,'some thing went wrongs');
    }



    public function getErrorCode($input)
    {
        if($input == "email")
        return 'E001';

        else if($input == "password")
        return 'E002';

        else if($input == "phone")
        return 'E003';


    }
}
