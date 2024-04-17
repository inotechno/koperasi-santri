<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('contactsAs');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'email'         => 'required', 'string', 'email', 'max:255',
            'description'   => 'required|min:10',
        ]);

        try {
            $contact = Contact::create([
                'email'         => $request->email,
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
                'subject'       => $request->subject,
                'phone'         => $request->phone,
                'description'   => $request->description,
            ]);

            return redirect()->route('contactUs')->with('success', 'successfully');
        } catch (\Throwable $th) {
            // throw $th;
            return back()->with('error', 'failed');
        }
    }
}
