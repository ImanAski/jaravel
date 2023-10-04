<?php

namespace App\Http\Controllers;

use App\Models\Handouts;
use Illuminate\Http\Request;

class HandoutController extends Controller
{
    public function index() {
        $handouts = Handouts::all();
        return response()->json($handouts);
    }

    public function show(int $id) {
        $handout = Handouts::where('id', $id)->first();

        if ($handout == null) {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }

        return response()->json($handout);
    }
}
