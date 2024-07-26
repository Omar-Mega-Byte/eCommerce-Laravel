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
}
