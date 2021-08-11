<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;

class ContactController extends Controller
{
    public function input()
    {
        return view('contact');
    }
    public function post(ClientRequest $request)
    {
        $data = $request->all();
        return view('check.index')->with($data);
    }
    public function store(Request $request)
    {
        $contact = new Contact;
        $contact->fullname = $request->last_name.$request->first_name;
        $contact->gender = $request->gender;
        $contact->email = $request->email;
        $contact->postcode = $request->postcode;
        $contact->address = $request->address;
        $contact->building_name = $request->building_name;
        $contact->opinion = $request->opinion;
        $contact->save();

        return view('check.thanks');
    }
}
