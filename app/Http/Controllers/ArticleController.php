<?php

// app/Http/Controllers/ArticleController.php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Tambahkan use statement untuk Storage

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->author = $request->author;

        // Proses gambar jika ada
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename); // Simpan di folder public/images
            $article->image = $filename; // Simpan nama file di database
        }

        $article->save();

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Menyimpan foto baru (jika ada)
        if ($request->hasFile('image')) {
            // Hapus foto lama jika ada
            if ($article->image && file_exists(public_path('images/' . $article->image))) {
                unlink(public_path('images/' . $article->image));
            }

            // Simpan foto baru
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $article->image = $filename; // Simpan nama file di database
        }

        // Update artikel
        $article->update([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'image' => $article->image, // Menyimpan nama file gambar
        ]);

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    // Menghapus artikel
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        // Hapus foto terkait jika ada
        if ($article->image && file_exists(public_path('images/' . $article->image))) {
            unlink(public_path('images/' . $article->image));
        }

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus!');
    }
}
