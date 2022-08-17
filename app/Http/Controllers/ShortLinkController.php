<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    public function index()
    {
        $links = ShortLink::query()->paginate(10);

        return view('shortLink.index', compact('links'));
    }

    public function show($code)
    {
        $find = ShortLink::where('code', $code)->first();

        return redirect($find->link);
    }

    public function delete(ShortLink $link)
    {
        $link->delete();
        return redirect()->route('short-links');
    }
}
