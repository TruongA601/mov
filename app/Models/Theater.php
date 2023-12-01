<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seat;

class Theater extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','cinema_id','totalSeats'];
    protected $primaryKey = 'id';
    protected $table = 'theaters';
    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
    public function shows()
    {
        return $this->hasMany(Show::class);
    }
}
