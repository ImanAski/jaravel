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
        foreach ($courses as $course) {
            if(!filter_var($course->image, FILTER_VALIDATE_URL))
            {
                $course->image = url('storage/' . trim($course->image, '/'));
            }
        }
        return response()->json($courses);
    }

    public function show(int $id) {
        $course = Courses::where('id', $id)->first();

        if ($course == null) {
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }
        if(!filter_var($course->image, FILTER_VALIDATE_URL))
        {
            $course->image = url('storage/' . trim($course->image, '/'));
        }
        return response()->json($course);
    }
}
