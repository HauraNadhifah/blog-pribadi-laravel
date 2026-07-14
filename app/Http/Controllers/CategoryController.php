<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Menampilkan daftar kategori milik user yang login.
     */
    public function index()
    {
        $categories = Category::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('categories.index', compact('categories'));
    }

    /**
     * Menampilkan form tambah kategori.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Menyimpan kategori baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:500',
        ]);

        Category::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail kategori.
     */
    public function show(Category $category)
    {
        if ($category->user_id != Auth::id()) {
            abort(403);
        }

        return view('categories.show', compact('category'));
    }

    /**
     * Menampilkan form edit kategori.
     */
    public function edit(Category $category)
    {
        if ($category->user_id != Auth::id()) {
            abort(403);
        }

        return view('categories.edit', compact('category'));
    }

    /**
     * Mengupdate kategori.
     */
    public function update(Request $request, Category $category)
    {
        if ($category->user_id != Auth::id()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:500',
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Menghapus kategori.
     */
    public function destroy(Category $category)
    {
        if ($category->user_id != Auth::id()) {
            abort(403);
        }

        $category->delete();

        return redirect()
            ->route('categories.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}