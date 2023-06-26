<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // protected $fillable=['name', 'description', 'status', 'type'];

    protected $table = 'categories';

    public $timestamps = false;


    protected $guarded = ['id', 'created_at'];


    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories');//اسم الجدول الذي خرج من علاقة m:m ومثله في المودل الآخر
    }

}
