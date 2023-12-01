<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','logo','province','district','ward','location'];
    protected $primaryKey = 'id';
    protected $table = 'cinemas';
    public function theaters()
    {
        return $this->hasMany(Theater::class);
    }
  
}
