<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function messages()
    {
        $messages = Message::with('author')->where('user_id', Auth::id())->orderBy("id", "desc")->paginate(10);
        return view('messages',
            ['messages' => $messages]
        );
    }

    public function home()
    {
        return view('home', ['username' => auth()->user()->name,
            'registerdate' => auth()->user()->created_at,
            'postcount' => auth()->user()->messages->count()]);
    }

    public function dashboard()
    {
        return view('home', ['username' => auth()->user()->name,
            'registerdate' => auth()->user()->created_at,
            'postcount' => auth()->user()->messages->count()]);
    }

    public function form()
    {
        return view('addmessage');
    }

    public function create(Request $request)
    {
        $request->validate([
            'message' => 'required|max:255',
        ], [
            'max' => 'Максимальная длина заметки 255 символов',
            'required' => 'Необходимо заполнить поле "Текст заметки"',
        ]);

        $resp = auth()->user()->messages()->save(new Message([
            'message' => $request->message,
        ]));

        if ($resp->exists) {
            $result = 'Заметка добавлена';
        } else {
            $result = 'Ошибка добавления заметки';
        }

        return view('addmessage', ['result' => $result]);
    }
}
