<?php

namespace App\Models;

use App\Models\rating;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    //...
    public function ratings()
    {
        return $this->hasMany(rating::class);
    }
}
