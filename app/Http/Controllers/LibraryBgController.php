<?php

namespace App\Http\Controllers;

use App\Models\LibraryBg;
use Illuminate\Http\Request;
use PharIo\Manifest\Library;

class LibraryBgController extends Controller
{
    //

    public function index() {
        $backgrounds = LibraryBg::all();

        return response()->json($backgrounds);
    }

    public function show(int $id) {
        $background = LibraryBg::where('id', $id)->first();

        if ($background == null) {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }

        return response()->json($background);
    }
}
