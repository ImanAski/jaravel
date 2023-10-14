<?php

namespace App\Http\Controllers;

use App\Models\Handouts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HandoutController extends Controller
{
    public function index() {
        $handouts = Handouts::all();
        foreach ($handouts as $handout) {
            if(!filter_var($handout->image, FILTER_VALIDATE_URL))
            {
                $handout->image = url('storage/' . trim($handout->image, '/'));
            }
        }
        return response()->json($handouts);
    }

    public function show(int $id) {
        $handout = Handouts::where('id', $id)->first();

        if ($handout == null) {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }

        if(!filter_var($handout->image, FILTER_VALIDATE_URL))
        {
            $handout->image = url('storage/' . trim($handout->image, '/'));
        }

        return response()->json($handout);
    }
}
