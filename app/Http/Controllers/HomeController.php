<?php

namespace App\Http\Controllers;

use App\Models\Post; // Import model Post
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 3 berita terbaru untuk ditampilkan di homepage
        $latestPosts = Post::with('category')->latest()->take(3)->get();

        // Kirim data berita ke view 'welcome'
        return view('welcome', [
            'posts' => $latestPosts,
        ]);
    }
}