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
        foreach ($backgrounds as $background) {
            if(!filter_var($background->background, FILTER_VALIDATE_URL))
            {
                $background->background = url('storage/' . trim($background->background, '/'));
            }
        }
        return response()->json($backgrounds);
    }

    public function show(int $id) {
        $background = LibraryBg::where('id', $id)->first();

        if ($background == null) {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }

        if(!filter_var($background->background, FILTER_VALIDATE_URL))
        {
            $background->background = url('storage/' . trim($background->background, '/'));
        }

        return response()->json($background);
    }
}
