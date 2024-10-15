<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
    public function check_permission(String $permission) :bool{
        if (auth()->user()->can($permission)) {
            return true;
        }else{
            //ToDo: Add Loggin
            return true;
            //abort(403);
        }
    }
}
