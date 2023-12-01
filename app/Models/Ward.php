<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    public $timestamps = false;
    protected $fillable = [
    'name','district_id'
    ];
    protected $primaryKey = 'id' ;
    protected $table = 'wards';
    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
