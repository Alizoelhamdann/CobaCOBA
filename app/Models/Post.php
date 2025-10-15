<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'content',
        'image',
    ];

    /**
     * Mendefinisikan relasi ke model Category.
     * Sebuah Post dimiliki oleh satu Category.
     */
    // PERBAIKAN 2: Menambahkan method relasi 'category'
    // Ini PENTING agar kita bisa memanggil `$post->category->name` di view.
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Mengubah kunci pencarian default dari 'id' menjadi 'slug' untuk route.
     *
     * @return string
     */
    // PERBAIKAN 3: Memindahkan method ini ke DALAM class
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
