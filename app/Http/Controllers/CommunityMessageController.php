<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\CommunityMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityMessageController extends Controller
{
    public function store(Request $request, Community $community)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        CommunityMessage::create([
            'community_id' => $community->id,
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return redirect()->route('communities.show', $community->slug);
    }

    public function destroy(CommunityMessage $message)
    {
        if ($message->user_id !== Auth::id()) {
            abort(403);
        }

        $message->delete();

        return back()->with('success', 'Pesan berhasil dihapus.');
    }
}