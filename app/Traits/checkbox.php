<?php

namespace App\Traits;

trait checkbox{
    public function checkboxValue($isAdminValue)
    {
        if($isAdminValue =='on'){
            $isAdmin = 1;
        }
        else{
            $isAdmin = 0;
        }
            return $isAdmin;
    }
}