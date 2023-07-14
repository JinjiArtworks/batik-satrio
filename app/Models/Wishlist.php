<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlists';
    protected $fillable = ['users_id', 'products_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'products_id');
    }
}
