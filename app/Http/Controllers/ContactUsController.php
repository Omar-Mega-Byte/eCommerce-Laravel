<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Http\Requests\StoreContactUsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ContactUsController extends Controller
{
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
    public function store(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'name' => ['required', 'MAX:255'],
            'email' => ['required', 'MAX:255', 'email'],
            'message' => ['required', 'string'],
        ]);

        Auth::user()->contacts()->create($fields);

        //redirect
            return back()->with('success','Thank You! Your Message has been Sent.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactUs $contactUs)
    {
        // Example: Show a specific contact message
        return view('contactus.show', [
            'contactMessage' => $contactUs,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactUs $contactUs)
    {
        // Example: Show the form to edit a contact message
        return view('contactus.edit', [
            'contactMessage' => $contactUs,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactUs $contactUs)
    {
        // Delete contact message
        $contactUs->delete();

        // Redirect
        return redirect()->route('contactus.index')->with('success', 'Contact message deleted successfully!');
    }
}
