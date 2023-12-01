<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','province_id',];
    protected $primaryKey = 'id' ;
    protected $table = 'districts';

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function wards()
    {
        return $this->hasMany(Ward::class);
    }
 
}
