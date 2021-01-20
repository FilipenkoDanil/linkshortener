<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function stats()
    {
        $links = ShortLink::where('user_id', Auth::check())->get();
        return view('account.stats', compact('links'));
    }

    public function destroy(ShortLink $link){
        $link->delete();
        return redirect()->back()->with('success', 'Ссылка удалена.');
    }
}
