<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use App\Models\Ip;
use App\Models\ShortLink;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
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

        return redirect()->route('home')->with('success', "Ссылка успешно создана!")->with('link', config('app.url') . '/' . $link->code);
    }

    public function shortenLink($code)
    {
        $link = ShortLink::where('code', $code)->first();
        if ($link) {
            $link->increment('count');

            Ip::create([
                'short_link_id' => $link->id,
                'ip' => Request::ip(),
            ]);

            return redirect($link->link);
        }
        abort(404);
    }
}
