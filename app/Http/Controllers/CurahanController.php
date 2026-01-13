<?php

namespace App\Http\Controllers;

use App\Models\Curahan;
use App\Models\CurahanLike;
use App\Models\CurahanComment;
use Illuminate\Http\Request;

class CurahanController extends Controller
{
    public function index()
    {
        // Menggunakan eager loading 'comments.replies' jika Anda ingin menampilkan balasan di view
        $curahans = Curahan::with(['likes', 'comments'])->orderBy('created_at', 'desc')->get();
        return view('curahan.index', compact('curahans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required',
        ]);

        Curahan::create([
            'title' => $request->title ?? '-', // Menghindari string kosong jika field title diperlukan
            'content' => $validated['content'],
            'author' => session('username'),
            'is_anonymous' => $request->has('is_anonymous'),
        ]);

        return redirect()->route('curahan.index')->with('success', 'Curahan hati berhasil diposting!');
    }

    public function edit(Curahan $curahan)
    {
        if (!$curahan->isOwnedBy(session('username'))) {
            return redirect()->route('curahan.index')->with('error', 'Anda tidak memiliki akses untuk mengedit ini!');
        }
        
        return view('curahan.edit', compact('curahan'));
    }

    public function update(Request $request, Curahan $curahan)
    {
        if (!$curahan->isOwnedBy(session('username'))) {
            return redirect()->route('curahan.index')->with('error', 'Anda tidak memiliki akses untuk mengupdate ini!');
        }
        
        $validated = $request->validate([
            'content' => 'required',
        ]);

        $curahan->update([
            'content' => $validated['content'],
            'is_anonymous' => $request->has('is_anonymous'),
        ]);

        return redirect()->route('curahan.index')->with('success', 'Curahan hati berhasil diupdate!');
    }

    public function destroy(Curahan $curahan)
    {
        if (!$curahan->isOwnedBy(session('username'))) {
            return redirect()->route('curahan.index')->with('error', 'Anda tidak memiliki akses untuk menghapus ini!');
        }
        
        $curahan->delete();
        return redirect()->route('curahan.index')->with('success', 'Curahan hati berhasil dihapus!');
    }

    public function toggleLike(Curahan $curahan)
    {
        $username = session('username');
        $like = CurahanLike::where('curahan_id', $curahan->id)
            ->where('username', $username)
            ->first();
        
        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            CurahanLike::create([
                'curahan_id' => $curahan->id,
                'username' => $username,
            ]);
            $liked = true;
        }
        
        return response()->json([
            'liked' => $liked,
            'likes_count' => $curahan->likesCount()
        ]);
    }

    public function addComment(Request $request, Curahan $curahan)
    {
        $validated = $request->validate([
            'comment' => 'required|max:1000',
            'parent_id' => 'nullable|exists:curahan_comments,id',
        ]);
        
        $comment = CurahanComment::create([
            'curahan_id' => $curahan->id,
            'username' => session('username'),
            'comment' => $validated['comment'],
            'parent_id' => $request->parent_id ?? null,
        ]);
        
        // Load relasi parent jika ini adalah reply agar data yang dikirim ke JS lengkap
        $comment->load('parent');
        
        return response()->json([
            'success' => true,
            'comment' => $comment,
            'comments_count' => $curahan->commentsCount() // Memanggil method dari Model Curahan
        ]);
    }

    public function deleteComment(CurahanComment $comment)
    {
        if ($comment->username !== session('username')) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        
        $curahan = $comment->curahan; // Mengambil instance curahan melalui relasi
        $comment->delete();
        
        return response()->json([
            'success' => true,
            'comments_count' => $curahan->commentsCount()
        ]);
    }
}