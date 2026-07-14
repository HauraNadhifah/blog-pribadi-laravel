<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::where('status', 'published')
            ->with(['user', 'category']);

        // Pencarian
        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter kategori
        if ($request->category) {
            $query->where('category_id', $request->category);
        }

        $articles = $query->latest()->get();

        $categories = Category::all();

        return view('blog.index', compact('articles', 'categories'));
    }

    public function show($slug)
{
    $article = Article::where('slug', $slug)
        ->with([
            'user',
            'category',
            'comments'
        ])
        ->firstOrFail();

    return view('blog.show', compact('article'));
}
}