<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\Classroom;

class QRCodeScanController extends Controller
{
    /**
     * Handle the scanned QR code data.
     */
    public function scan(Request $request)
    {
        $request->validate([
            'class_id' => 'required|string',
            'student_id' => 'required|integer',
        ]);

        // Find the student and class
        $student = Student::find($request->student_id);
        $class = Classroom::find($request->class_id);

        if (!$student || !$class) {
            return response()->json(['message' => 'Invalid student or class ID'], 404);
        }

        // Record attendance
        Attendance::create([
            'student_id' => $student->id,
            'class_id' => $class->id,
            'timestamp' => now(),
        ]);

        return response()->json(['message' => 'Attendance recorded successfully']);
    }
}
