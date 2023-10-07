<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['store']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'username' => 'required|unique:users|max:255',
            'email' => 'email|nullable|unique:users|max:255',
            'password' => 'required|max:255',
        ]);
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        Profile::create([
            'display_name' => $user->username,
            'user_id' => $user->id,
        ]);

        return response()->json([
            'id' => $user->id,
            "attributes" => [
                'username' => $user->username,
                'email' => $user->email,
                'profile' => $user->profile,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ]
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $book)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
