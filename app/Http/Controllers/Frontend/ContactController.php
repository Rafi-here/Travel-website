<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Crew;

class ContactController extends Controller
{
    public function index()
    {
        $crews = Crew::all();
        return view('frontend.contact', compact('crews'));
    }
}
