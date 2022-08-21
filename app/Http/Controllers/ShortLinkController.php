<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    public function index()
    {
        $links = ShortLink::query()->paginate(10);

        return view('shortLink.index', compact('links'));
    }

    public function create(){
        return view('shortLink.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url'
        ]);

        $input['link'] = $request->link;
        $input['code'] = Str::random(4);
        $input['user_id'] = auth()->id();

        ShortLink::create($input);

        return redirect()->route('link.index')
            ->with('success', 'Shorten Link Generated Successfully!');
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
