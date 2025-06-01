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
        return view('user.articles.index', compact('articles'));
    }

    // Menampilkan form untuk membuat artikel
    public function create()
    {
        return view('user.articles.create');
    }

    // Menyimpan artikel baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
            'published_at' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'content', 'author', 'published_at']);

        // Proses gambar jika ada
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['image'] = $filename;
        }

        Article::create($data);

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    // Menampilkan artikel berdasarkan ID
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('user.articles.show', compact('article'));
    }

    // Menampilkan form untuk mengedit artikel
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('user.articles.edit', compact('article'));
    }

    // Memperbarui artikel
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'author' => 'required|string|max:255',
            'published_at' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'content', 'author', 'published_at']);

        // Menyimpan foto baru (jika ada)
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['image'] = $filename;
        }

        $article->update($data);

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    // Menghapus artikel
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        // Hapus gambar jika ada
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus!');
    }
}
