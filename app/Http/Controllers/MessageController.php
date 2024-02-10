<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Mail\ContactMail;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $message = Message::paginate(6);
        return view('admin.message', compact('message'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $unreadcount = Message::where('unread',0)->get();
        $message = Message::findOrFail($id);
        return view('admin.showmessage', compact('message', 'unreadcount'));
    }

    public function unread(){
        $message = Message::get();
        $unreadcount = Message::where('unread',0)->get();
        return view('admin.includes.topNavigation',compact('unreadcount', 'message'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Message::where('id', $id)->delete();
        return redirect('message');
    }

}
