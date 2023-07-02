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
    public function orderdetail()
    {
        return $this->belongsTo(OrderDetail::class);
    }
    // foreign key yang dititipkan pada tabel, akan menggunakan relasi belongsTo. Sedangkan tabel utama yang menitipkan, di modelsnya menggunakan relasi hasMany / hasOne!!!!
}
