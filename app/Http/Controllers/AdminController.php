<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $users = User::all();

        return view('admin.dashboard', ['users' => $users]);
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
    public function store(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required', 'min:3', 'confirmed'],
            'type' => ['required'],
        ]);

        // Register
        User::create($fields);

        // Redirect
        return redirect()->route('admin')-> with('add','The user has been Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.edit', [ 'user' => $user ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
    //Validate
    $request->validate([
        'name' => ['required', 'MAX:255'],
        'email' => ['required','email'],
        'type' => ['required']
    ]);

    //Update Post
    $user->update([
        'name'=>$request->name,
        'email'=>$request->email,
        'type'=>$request->type,
    ]);

    //redirect
    return redirect()->route('admin')-> with('update','Your user has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //post deletion
        $user->delete();

        //redirect
        return back()->with('delete','Your User has been deleted');
    }
}
