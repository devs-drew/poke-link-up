<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProfilesResource;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
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
    public function index()
    {
        return ProfilesResource::collection(Profile::all());
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new ProfilesResource($user->profile);
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
        $this->validate($request, [
            'display_name' => 'required|max:255',
            'first_name' => 'nullable|max:255',
            'last_name' => 'nullable|max:255',
            'full_name' => 'nullable|max:255',
            'gender' => 'nullable|max:25',
            'address' => 'nullable|max:25',
        ]);
        $user->profile->update([
            'display_name' => $request->display_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'full_name' => $request->full_name,
            'gender' => $request->gender,
            'address' => $request->address,
        ]);

        return new ProfilesResource($user->profile);
    }
    public function theme(Request $request, User $user)
    {
        $this->validate($request, [
            'pokemon_theme_id' => 'required|max:3',
        ]);
        $user->profile->update([
            'pokemon_theme_id' => $request->pokemon_theme_id,
        ]);

        return new ProfilesResource($user->profile);
    }
}
