<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }

        $pendingListings = Listing::where('status', 'pendente')->with(['user', 'address'])->latest()->get();
        return view('admin.dashboard', compact('pendingListings'));
    }

    public function approve(Listing $listing)
    {
        if (!Auth::user()->isAdmin()) abort(403);

        $listing->update(['status' => 'ativo']);
        return back()->with('success', 'Anúncio aprovado com sucesso!');
    }

    public function reject(Listing $listing)
    {
        if (!Auth::user()->isAdmin()) abort(403);

        $listing->update(['status' => 'rejeitado']);
        return back()->with('success', 'Anúncio rejeitado!');
    }
}
