<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        $query = Listing::active()->with(['address', 'coverImage']);

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhereHas('address', function($q) use ($search) {
                      $q->where('city', 'like', "%{$search}%")
                        ->orWhere('neighborhood', 'like', "%{$search}%");
                  });
            });
        }

        $listings = $query->latest()->paginate(12);

        return view('listings.index', compact('listings'));
    }

    public function show(Listing $listing)
    {
        $listing->load(['address', 'images', 'user']);
        return view('listings.show', compact('listing'));
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price_cents' => 'required|numeric|min:0',
            'type' => 'required|in:casa,apartamento,quarto,kitnet',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'furnished' => 'boolean',
            'pets_allowed' => 'boolean',
            'internet_included' => 'boolean',
            
            // Address
            'street' => 'required|string|max:255',
            'number' => 'required|string|max:20',
            'neighborhood' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:2',
            'zipcode' => 'required|string|max:20',
        ]);

        $listing = Auth::user()->listings()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'price_cents' => $data['price_cents'] * 100, // Saving in cents
            'type' => $data['type'],
            'status' => 'pendente',
            'bedrooms' => $data['bedrooms'],
            'bathrooms' => $data['bathrooms'],
            'furnished' => $request->has('furnished'),
            'pets_allowed' => $request->has('pets_allowed'),
            'internet_included' => $request->has('internet_included'),
        ]);

        $listing->address()->create([
            'street' => $data['street'],
            'number' => $data['number'],
            'neighborhood' => $data['neighborhood'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zipcode' => $data['zipcode'],
        ]);

        return redirect()->route('listings.show', $listing)->with('success', 'Anúncio criado com sucesso! Ele será avaliado por um administrador antes de ser publicado.');
    }
}
