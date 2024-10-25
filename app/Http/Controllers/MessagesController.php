<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;

class MessagesController extends Controller
{

    public function messagesPage()
    {
        $messages = Contact::orderBy('created_at', 'desc')->get();

        return view('admin-pages.messages', compact('messages'));
    }

    public function deleteMessage(string $id)
    {
        $message = Contact::findOrFail($id);
        $message->delete();

        return redirect()->route('messages')->with('success', 'Contact info and message deleted successfully.');
    }


}