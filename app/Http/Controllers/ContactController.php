<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; 

class ContactController extends Controller
{
  public function showForm()
  {
    return view('contact');
  }

  public function submitForm(Request $request)
  {
    $rules = [
      'name' => 'required|max:10',
      'kana' => 'required|max:20',
      'tel' => 'nullable|numeric',
      'email' => 'required|email',
      'body' => 'required',
    ];

    $validatedData = $request->validate($rules);

    $contact = new Contact();
    $contact->name = $request->name;
    $contact->kana = $request->kana;
    $contact->tel = $request->tel;
    $contact->email = $request->email;
    $contact->body = $request->body;
    $contact->save();

    return redirect('complete');
  }
}
