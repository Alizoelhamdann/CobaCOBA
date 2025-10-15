<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Menampilkan semua artikel/berita
    public function index()
    {
        $posts = Post::with('category', 'user')->latest()->paginate(5); // Ambil 5 berita per halaman
        return view('articles.index', compact('posts'));
    }

    // Menampilkan satu artikel/berita secara detail
    public function show(Post $post)
    {
        return view('articles.show', compact('post'));
    }
}