<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use App\Models\ShortLink;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(LinkRequest $request)
    {
        $link = ShortLink::create([
            'user_id' => Auth::id(),
            'link' => $request->link,
            'code' => Str::random(6)
        ]);

        return redirect()->route('home')->with('success', "Ссылка успешно создана: " . config('app.url') . '/' . $link->code);
    }

    public function shortenLink($code)
    {
        $link = ShortLink::where('code', $code)->first();
        $link->increment('count');
        return redirect($link->link);
    }
}
