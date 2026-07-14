<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Menampilkan daftar artikel milik user yang login.
     */
    public function index()
    {
        $articles = Article::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('articles.index', compact('articles'));
    }

    /**
     * Menampilkan form tambah artikel.
     */
    public function create()
    {
        $categories = Category::where('user_id', Auth::id())->get();

        return view('articles.create', compact('categories'));
    }

    /**
     * Menyimpan artikel baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'status' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $thumbnail = null;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        Article::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'thumbnail' => $thumbnail,
            'status' => $request->status,
        ]);

        return redirect()->route('articles.index')
            ->with('success', 'Artikel berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail artikel.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Menampilkan form edit artikel.
     */
    public function edit(Article $article)
    {
        $categories = Category::where('user_id', Auth::id())->get();

        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update artikel.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'status' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $thumbnail = $article->thumbnail;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $article->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'thumbnail' => $thumbnail,
            'status' => $request->status,
        ]);

        return redirect()->route('articles.index')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Menghapus artikel.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }
}
