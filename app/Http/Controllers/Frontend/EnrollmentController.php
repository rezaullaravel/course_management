<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnrollmentController extends Controller
{
    public function saveStep1(Request $request)
    {

        $enrollment = Enrollment::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
        ]);



        return response()->json(['user_id' => $enrollment->id]);

    }

    public function saveStep2(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id', // Validate the selected course
            'teacher_type' => 'required|in:male,female,other', // Validate the teacher type
        ]);

        $user = Enrollment::findOrFail($request->user_id);

        // Assuming the user has a relationship with courses
        $user->course_id = $request->course_id; // Sync the selected course

        // Save the selected teacher type (you can store it in the User model or elsewhere)
        $user->teacher_type = $request->teacher_type;
        $user->save();

        return response()->json(['message' => 'Course Id and teacher type saved success']);
    }

    public function saveStep3(Request $request)
    {
        $enrollment = Enrollment::find($request->user_id);
        $enrollment->days = $request->days;
        $enrollment->save();

        return response()->json(['success' => true]);
    }
}
