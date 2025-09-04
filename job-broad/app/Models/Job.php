<?php

namespace App\Models;

class Job 
{
    public static function all(){
        return [
          ['title' => 'software engeneer' , 'salary' => '1000$'], 
          ['title' => 'Graphic Design' , 'salary' => '400$'],  
        ];
    }
}
 