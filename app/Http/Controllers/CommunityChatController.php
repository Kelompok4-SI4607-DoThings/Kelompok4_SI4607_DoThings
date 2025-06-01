<?php

namespace App\Http\Controllers;

use App\Models\KomunitasAdmin;
use App\Models\CommunityChat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityChatController extends Controller
{
    // Daftar komunitas admin
    public function index()
    {
        $komunitas = KomunitasAdmin::all();
        return view('user.community.index', compact('komunitas'));
    }

    // Ruang obrolan komunitas tertentu
    public function show($komunitas_admin_id)
    {
        $komunitas = KomunitasAdmin::findOrFail($komunitas_admin_id);
        $chats = CommunityChat::where('komunitas_admin_id', $komunitas_admin_id)
            ->with('user')
            ->orderBy('created_at', 'asc')
            ->get();

        return view('user.community.chat', compact('komunitas', 'chats'));
    }

    // Simpan pesan baru
    public function store(Request $request, $komunitas_admin_id)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        CommunityChat::create([
            'komunitas_admin_id' => $komunitas_admin_id,
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return redirect()->route('community.chat.show', $komunitas_admin_id);
    }

    public function update(Request $request, $komunitas_admin_id, $chat_id)
    {
        $chat = \App\Models\CommunityChat::where('id', $chat_id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $chat->update([
            'message' => $request->message,
        ]);

        return redirect()->route('community.chat.show', $komunitas_admin_id);
    }

    public function delete($komunitas_admin_id, $chat_id)
    {
        $chat = CommunityChat::where('id', $chat_id)->where('user_id', Auth::id())->firstOrFail();
        $chat->delete();
        return redirect()->route('community.chat.show', $komunitas_admin_id);
    }
}