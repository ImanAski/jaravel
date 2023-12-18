<?php

namespace App\Http\Controllers;

use App\Models\Profiles;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(int $id) {
        $profile = Profiles::query()
            ->where('id', '=', $id)
            ->first();

        if ($profile == null) {
            return response()->json([
                // How the fuck I returned the 404
                'message' => 'Not Found',
            ], 404);
        }

        return response()->json($profile);
    }

    public function update(int $id, Request $request) {
        $profile = Profiles::query()
            ->where('id', '=', $id)
            ->first();

        if ($profile == null) {
            return response()->json([
                'message' => 'Not Found',
            ], 404);
        }

        $profile->update($request->all());

        return response()->json($profile);
    }
}
