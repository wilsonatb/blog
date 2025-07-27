<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        //$test = Post::take(5)->get();
        // Logic to retrieve and display blog posts
        return view('posts.index', [
            'posts' => Post::published()->latest('published_at')->take(5)->get(), // Fetching latest posts with pagination
        ]); // Assuming you have a view for displaying posts
    }
}
