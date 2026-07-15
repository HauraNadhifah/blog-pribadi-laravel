<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email',
            'comment' => 'required'
        ]);

       Comment::create([
    'article_id' => $article->id,
    'nama'       => $request->name,
    'email'      => $request->email,
    'komentar'   => $request->comment,
]);

        return back()->with('success', 'Komentar berhasil dikirim.');
    }
}