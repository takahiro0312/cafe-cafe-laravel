<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;

class PageController extends Controller
{
    public function index()
    {

        return view('index');
    }

    public function header()
    {
        return view('header');
    }

    public function showNavigation()
    {
        return view('navigation');
    }

    public function showLoginForm()
    {
        return view('login_form');
    }

    public function footer()
    {
        $links = [
            '企業情報' => [
                ['title' => 'ご利用方法', 'url' => '#'],
                ['title' => 'ニュースルーム', 'url' => '#'],
                ['title' => '株主・投資家のみなさまへ', 'url' => '#'],
                ['title' => 'XXXXXXXXXXXXXXXX', 'url' => '#'],
                ['title' => 'XXXXXXXXXXXXXXX', 'url' => '#'],
                ['title' => 'XXXXXXXXXXXXXXX', 'url' => '#'],
                ['title' => '採用情報', 'url' => '#'],
            ],
            'コミュニティ' => [
                ['title' => 'ダイバーシティ', 'url' => '#'],
                ['title' => 'アクセシビリティ対応', 'url' => '#'],
                ['title' => 'お友達を紹介', 'url' => '#'],
                ['title' => 'XXXXXXXXXXXXXXX', 'url' => '#'],
                ['title' => 'XXXXXXXXXXXXXXX', 'url' => '#'],
            ],
            'ホスト' => [
                ['title' => 'XXXXXXXXXXXXXXX', 'url' => '#'],
                ['title' => 'XXXXXXXXXXXXXXX', 'url' => '#'],
                ['title' => 'XXXXXXXXXXXXXXX', 'url' => '#'],
            ],
            'サポート' => [
                ['title' => '新型コロナウイルスに対する取り組み', 'url' => '#'],
                ['title' => 'ヘルプセンター', 'url' => '#'],
                ['title' => 'キャンセルオプション', 'url' => '#'],
                ['title' => 'コミュニティーサポート', 'url' => '#'],
                ['title' => '信頼＆安全', 'url' => '#'],
            ],
        ];

        return view('footer', ['links' => $links]);
    }

    public function edit()
    {
        return view('edit');
    }

    public function delete()
    {
        return view('delete');
    }

    public function contact()
    {
        return view('contact');
    }

    public function confirm()
    {
        return view('confirm');
    }

    public function editContact($id)
    {
        try {
            $contact = DB::table('contacts')->where('id', $id)->first();
            if (!$contact) {
                exit('指定されたIDが見つかりません');
            }
            return view('edit', compact('contact'));
        } catch (\Exception $e) {
            exit('データベースに接続できませんでした。' . $e->getMessage());
        }
    }

    public function updateContact(Request $request, $id)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'kana' => 'required|string|max:255',
                'tel' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'body' => 'required|string',
            ]);

            DB::table('contacts')->where('id', $id)->update($data);

            return redirect()->route('complete');
        } catch (\Exception $e) {
            exit('データベースエラー：' . $e->getMessage());
        }
    }

    public function deleteContact($id)
    {
        try {
            $contact = DB::table('contacts')->where('id', $id)->first();
            if (!$contact) {
                exit('指定されたIDが見つかりません');
            }
            
            DB::table('contacts')->where('id', $id)->delete();

            session()->flush();

            return redirect()->route('complete');
        } catch (\Exception $e) {
            exit('データベースに接続できませんでした。' . $e->getMessage());
        }
    }

    public function confirmContact(Request $request)
    {
        $name = $request->session()->get('name');
        $kana = $request->session()->get('kana');
        $tel = $request->session()->get('tel');
        $email = $request->session()->get('email');
        $body = $request->session()->get('body');

        return view('confirm', compact('name', 'kana', 'tel', 'email', 'body'));
    }

    public function completeContact(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->session()->get('name');
        $contact->kana = $request->session()->get('kana');
        $contact->tel = $request->session()->get('tel');
        $contact->email = $request->session()->get('email');
        $contact->body = $request->session()->get('body');
        $contact->save();

        $request->session()->forget(['name', 'kana', 'tel', 'email', 'body']);

        return redirect()->route('contact.complete');
    }


    public function submit(Request $request)
    {
        if ($request->session()->has('logged_in') && $request->session()->get('logged_in') === true) {
            try {
                $name = $request->session()->get('name');
                $kana = $request->session()->get('kana');
                $tel = $request->session()->get('tel');
                $email = $request->session()->get('email');
                $body = $request->session()->get('body');

                $sql = "INSERT INTO contacts (name, kana, tel, email, body) VALUES (?, ?, ?, ?, ?)";
                DB::insert($sql, [$name, $kana, $tel, $email, $body]);

                $request->session()->forget(['name', 'kana', 'tel', 'email', 'body']);

                return redirect()->route('contact.complete');
            } catch (\Exception $e) {
                return response()->view('errors.500', [], 500);
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function complete()
    {
        return view('complete');
    }
}