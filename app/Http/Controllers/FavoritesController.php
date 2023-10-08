<?php

namespace App\Http\Controllers;

use App\Http\Resources\FavoritesResource;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FavoritesController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        return FavoritesResource::collection(Favorite::query()->where('user_id', $user->id)->get());
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $this->validate($request, [
            'pokemon_id' => [
                'required',
                Rule::unique('favorites')->where(function ($query) use ($user) {
                    return $query->where('user_id', $user->id)
                        ->where('pokemon_id', 'pokemon_id');
                })
            ],
        ]);
        $favorite = Favorite::create([
            'user_id' => $user->id,
            'pokemon_id' => $request->pokemon_id,
            'pokemon_url' => $request->pokemon_url,
        ]);

        return new FavoritesResource($favorite);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // return FavoritesResource::collection(Favorite::query(''));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user, Favorite $favorite)
    {
        $favorite->delete();

        return FavoritesResource::collection(Favorite::query()->where('user_id', $user->id)->get());
    }
}
