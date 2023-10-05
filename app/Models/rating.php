<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class rating extends Model
{
    use HasFactory;
    protected $fillable = ['star', 'product_id'];

    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
