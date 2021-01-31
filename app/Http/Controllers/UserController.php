<?php

namespace App\Http\Controllers;

use App\Models\Ip;
use App\Models\ShortLink;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function stats()
    {
        $links = ShortLink::where('user_id', Auth::check())->get();
        return view('account.stats', compact('links'));
    }

    public function details($link){
        $link = ShortLink::find($link)->first();
        $ips = Ip::where('short_link_id', $link->id)->get();
        $countries = [];

        foreach ($ips as $ip){
            $countries[] = geoip($ip->ip)->country;
        }

        $countries = array_count_values($countries);
        return view('account.details', compact(['countries', 'link']));
    }

    public function destroy(ShortLink $link){
        $link->delete();
        return redirect()->back()->with('success', 'Ссылка удалена.');
    }
}
