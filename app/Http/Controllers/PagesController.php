<?php

namespace App\Http\Controllers;

use App\Models\Pages;

class PagesController extends Controller
{
    //
    public function index() {
        $pages = Pages::all();

        return response()->json($pages);
    }

    public function slug(string $slug) {
        $query = Pages::query()->where('name', 'like', $slug)->get();

        return response()->json($query);
    }

    public function show(int $id) {
        $query = Pages::query()->where('id', '=', $id)->get();

        return response()->json($query);
    }
}
