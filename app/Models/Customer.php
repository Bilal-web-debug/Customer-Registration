<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table ="customers";
    protected $primaryKey = "customer_id";

    
    // agr user ka name database ka column me user_name hota to setUserNameAttribute ka name sa fuction hota.
    // This the Example Of Mutratotr.
    // Mutrator ma set use hoga.
   
    public function setNameAttribute ($value)
    
    {
        $this->attributes['name'] = ucwords($value);


    }


    // This is the Exapmle Of Accessor.
    // Accessor Ma get use hoga.
   
    public function getDobAttribute($value)
    {
      return date("d-M-Y", strtotime($value));
        
    }



    




    
}
