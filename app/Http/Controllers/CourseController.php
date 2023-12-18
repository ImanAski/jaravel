<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;
use Spatie\FlareClient\Http\Exceptions\NotFound;

class CourseController extends Controller
{
    /**
     * get all courses
     *
     * @return [json] list of course objects
     */
    public function index() {
        $courses = Courses::all();
        foreach ($courses as $course) {
            if(!filter_var($course->image, FILTER_VALIDATE_URL))
            {
                $course->image = url('storage/' . trim($course->image, '/'));
            }

            if(!filter_var($course->title_image, FILTER_VALIDATE_URL))
            {
                $course->title_image = url('storage/' . trim($course->title_image, '/'));
            }
        }
        return response()->json($courses);
    }

    /**
     * Get a course by Id
     *
     * @param [int] id
     *
     * @return [json] course object
     */
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

    public function enrollUserInCourse(Request $request, $courseId) {
        $course = Courses::find($courseId);

        if ($course == null) {
            return response()->json([
                'message' => 'Not Found',
            ], 404);
        }

        $user = $request->user();
        $user->enrolledCourses()->attach($course);

        return response()->json([
            'message' => 'Enrolled in the course'
        ], 200);
    }
}
