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
}
