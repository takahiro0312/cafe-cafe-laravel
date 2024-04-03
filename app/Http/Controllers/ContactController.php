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

    $messages = [
      'name.required' => '名前を入力してください。',
      'name.max' => '名前は10文字以内で入力してください。',
      'kana.required' => 'フリガナを入力してください。',
      'kana.max' => 'フリガナは20文字以内で入力してください。',
      'tel.numeric' => '電話番号は数字で入力してください。',
      'email.required' => 'メールアドレスを入力してください。',
      'email.email' => '有効なメールアドレスを入力してください。',
      'body.required' => 'お問い合わせ内容を入力してください。',
    ];

    $validatedData = $request->validate($rules, $messages);

    $request->session()->put('name', $request->input('name'));
    $request->session()->put('kana', $request->input('kana'));
    $request->session()->put('tel', $request->input('tel'));
    $request->session()->put('email', $request->input('email'));
    $request->session()->put('body', $request->input('body'));

    return redirect()->route('contact.confirm');
  }

  public function confirm(Request $request)
  {
    $name = $request->session()->get('name');
    $kana = $request->session()->get('kana');
    $tel = $request->session()->get('tel');
    $email = $request->session()->get('email');
    $body = $request->session()->get('body');

    return view('confirm', compact('name', 'kana', 'tel', 'email', 'body'));
  }



  public function complete()
{
    $name = session('name');
    $kana = session('kana');
    $tel = session('tel');
    $email = session('email');
    $body = session('body');

    $contact = new Contact();
    $contact->name = $name;
    $contact->kana = $kana;
    $contact->tel = $tel;
    $contact->email = $email;
    $contact->body = $body;
    $contact->save();

    return view('complete', compact('contact'));
}


}
