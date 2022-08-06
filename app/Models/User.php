<?php

namespace App\Models;

class User {

    public function fullName()
    {
        if($this->last_name === null) 
        {
            return $this->first_name;
        }

        return "{$this->first_name} {$this->last_name}";
    }

    public function getFormattedBalance()
    {
        if($this->balance == 0)
        {
            return 'Zero funds';
        }
        
        return '$' . number_format($this->balance, 2);
    }
}