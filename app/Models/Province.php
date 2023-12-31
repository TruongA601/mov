<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public $timestamps = false;
    protected $fillable = ['name',];
    protected $primaryKey = 'id' ;
    protected $table = 'provinces';

     public function districts()
    {
        return  $this->hasMany(District::class);
    }
   
}
