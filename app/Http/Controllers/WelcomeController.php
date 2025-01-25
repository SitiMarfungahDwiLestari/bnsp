<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $bukus = Buku::take(3)->get();
        return view('welcome', compact('bukus'));
    }
}
