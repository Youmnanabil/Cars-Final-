<?php

namespace App\Http\View\Composers;

use App\Models\Message;
use Illuminate\View\View;

class Navbarcomposer
{
    public function compose(View $view)
    {
        $unreadcount = Message::where('unread',0)->count();
        $view->with('unreadcount', $unreadcount);
    }
}