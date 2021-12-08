<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['merk', 'user'];

    public function merk()
    {
        return $this->belongsTo(Merk::class);
    }

    public function user()
    {
        return $this->belongsTO(User::class);
    }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
