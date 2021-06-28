<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelApiController extends Controller
{
    public function index()
    {
        $artikel = Artikel::all();
        return $artikel->toJson();
    }

    public function paginate()
    {
        $artikel = Artikel::paginate(5);
        return $artikel->toJson();
    }
}
