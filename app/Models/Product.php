<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'products';
    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }
    public function motif()
    {
        return $this->belongsTo(Motif::class);
    }
    public function model()
    {
        return $this->belongsTo(Models::class);
    }
    public function teknik()
    {
        return $this->belongsTo(Teknik::class);
    }
    public function bahan()
    {
        return $this->belongsTo(Bahan::class);
    }
    public function orderdetail()
    {
        return $this->hasOne(OrderDetail::class);
    }
    public function wishlist()
    {
        return $this->hasOne(Wishlist::class);
    }
    public function reviews()
    {
        return $this->hasOne(Review::class);
    }
    // foreign key yang dititipkan pada tabel, akan menggunakan relasi belongsTo. Sedangkan tabel utama yang menitipkan, di modelsnya menggunakan relasi hasMany / hasOne!!!!
}
