<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\View\View;

class TagController extends Controller
{
    public function index(): View
    {
        return view('tag.index', [
            'tags' => Tag::All(),
        ]);
    }
}
