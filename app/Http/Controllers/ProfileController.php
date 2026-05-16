<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user->load('listings'); // Eager load listings for the dashboard
        return view('profile.index', compact('user'));
    }

    public function upgradeRole(Request $request)
    {
        $user = Auth::user();

        if ($user->role === 'estudante') {
            $user->role = 'locador';
            $user->save();
            return back()->with('success', 'Parabéns! Agora você é um Locador e já pode anunciar imóveis no UniHouse.');
        }

        return back();
    }
}
