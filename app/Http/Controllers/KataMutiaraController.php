<?php

namespace App\Http\Controllers;

use App\Models\KataMutiara;
use Illuminate\Http\Request;

class KataMutiaraController extends Controller
{
    public function index()
    {
        $kataMutiaras = KataMutiara::orderBy('created_at', 'desc')->get();
        return view('kata-mutiara', compact('kataMutiaras'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'quote' => 'required|min:10|max:500',
            'author' => 'required|min:3|max:100',
        ], [
            'quote.required' => 'Kutipan tidak boleh kosong!',
            'quote.min' => 'Kutipan minimal 10 karakter!',
            'quote.max' => 'Kutipan maksimal 500 karakter!',
            'author.required' => 'Nama penulis tidak boleh kosong!',
            'author.min' => 'Nama penulis minimal 3 karakter!',
            'author.max' => 'Nama penulis maksimal 100 karakter!',
        ]);

        KataMutiara::create([
            'quote' => $validated['quote'],
            'author' => $validated['author'],
            'created_by' => session('username'),
        ]);

        return redirect()->route('mutiara')->with('success', 'Kata mutiara berhasil ditambahkan! 🎉');
    }

    public function update(Request $request, KataMutiara $kataMutiara)
    {
        if (!$kataMutiara->isOwnedBy(session('username'))) {
            return redirect()->route('mutiara')->with('error', 'Anda tidak memiliki akses untuk mengedit kata mutiara ini!');
        }

        $validated = $request->validate([
            'quote' => 'required|min:10|max:500',
            'author' => 'required|min:3|max:100',
        ]);

        $kataMutiara->update($validated);

        return redirect()->route('mutiara')->with('success', 'Kata mutiara berhasil diupdate! ✨');
    }

    public function destroy(KataMutiara $kataMutiara)
    {
        if (!$kataMutiara->isOwnedBy(session('username'))) {
            return redirect()->route('mutiara')->with('error', 'Anda tidak memiliki akses untuk menghapus kata mutiara ini!');
        }

        $kataMutiara->delete();
        return redirect()->route('mutiara')->with('success', 'Kata mutiara berhasil dihapus! 🗑️');
    }
}