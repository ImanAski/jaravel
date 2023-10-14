<?php

namespace App\Http\Controllers;

use App\Models\Therapists;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;

class TherapistController extends Controller
{
    public function index() {
        $therapists = Therapists::all();
        if (count($therapists) == 0) {
            return response()->json([
                'messaeg' => 'Not found',
            ], 404);
        }

        foreach ($therapists as $therapist) {
            if(!filter_var($therapist->image, FILTER_VALIDATE_URL))
            {
                $therapist->image = url('storage/' . trim($therapist->image, '/'));
            }
        }
        return response()->json($therapists);
    }

    public function show(int $id) {
        $therapist = Therapists::where('id', $id)->first();

        if ($therapist == null) {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
        if(!filter_var($therapist->image, FILTER_VALIDATE_URL))
        {
            $therapist->image = url('storage/' . trim($therapist->image, '/'));
        }

        return response()->json($therapist);
    }
}
