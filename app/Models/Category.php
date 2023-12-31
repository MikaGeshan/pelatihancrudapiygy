<?php

namespace App\Models;
use App\Http\product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product()
    {
        return $this->hasMany(product::class);
    }
}
