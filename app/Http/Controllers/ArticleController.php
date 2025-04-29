<?php

// app/Http/Controllers/ArticleController.php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Menampilkan daftar artikel
    public function index()
    {
        $articles = Article::latest()->get();
        return view('user.articles.index', compact('articles'));  // Ubah path view ke 'user.artikel.index'
    }

    // Menampilkan form untuk membuat artikel
    public function create()
    {
        return view('user.articles.create');  // Ubah path view ke 'user.artikel.create'
    }

    // Menyimpan artikel baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'author' => 'required|string|max:255',
        ]);

        Article::create($request->all());

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dibuat!');
    }

    // Menampilkan artikel berdasarkan ID
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('user.articles.show', compact('article'));  // Ubah path view ke 'user.artikel.show'
    }

    // Menampilkan form untuk mengedit artikel
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('user.articles.edit', compact('article'));  // Ubah path view ke 'user.artikel.edit'
    }

    // Memperbarui artikel
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'author' => 'required|string|max:255',
        ]);

        $article->update($request->all());

        return redirect()->route('articles.index')->with('success', 'Artikel Berhasil Diperbarui!');
    }

    // Menghapus artikel
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Artikel Berhasil Dihapus!');
    }
}