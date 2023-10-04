<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;
use Spatie\FlareClient\Http\Exceptions\NotFound;

class CourseController extends Controller
{
    //
    public function index() {
        $courses = Courses::all();
        return response()->json($courses);
    }

    public function show(int $id) {
        $course = Courses::where('id', $id)->first();

        if ($course == null) {
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }
        return response()->json($course);
    }
}
