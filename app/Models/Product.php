<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name', 'description', 'purchase_price', 'sale_price','stock', 'categories_id',
    ];
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Categories::class, 'categories_id');
    }

}
