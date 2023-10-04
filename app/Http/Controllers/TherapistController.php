<?php

namespace App\Http\Controllers;

use App\Models\Therapists;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;

class TherapistController extends Controller
{
    public function index() {
        $therapists = Therapists::all();
        return response()->json($therapists);
    }

    public function show(int $id) {
        $therapist = Therapists::where('id', $id)->first();

        if ($therapist == null) {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }

        return response()->json($therapist);
    }
}
