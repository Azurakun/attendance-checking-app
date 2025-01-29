<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    /**
     * Mark attendance for the authenticated user.
     */
    public function markAttendance(Request $request)
    {
        // Check if the authenticated user is a student
        $user = Auth::user();
        if (!$user || $user->role !== 'student') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Check if the user has marked attendance in the last 6 hours
        $lastAttendance = DB::table('attendance')
            ->where('student_id', $user->id)
            ->orderBy('timestamp', 'desc')
            ->first();

        if ($lastAttendance && now()->diffInHours($lastAttendance->timestamp) < 6) {
            return view('attendance_failure'); // Redirect to failure page
        } else {
            // Logic to mark attendance goes here
$class_id = $request->input('class_id'); // Assuming class_id is passed in the request

DB::table('attendance')->insert([
    'student_id' => $user->id,
    'class_id' => $class_id,
    'timestamp' => now(),
            ]);
            return view('attendance_success'); // Redirect to success page
        }
    }

    /**
     * Display attendance history for the admin.
     */
    public function attendanceHistory()
    {
        $attendanceRecords = DB::table('attendance')
            ->join('users', 'attendance.student_id', '=', 'users.id')
            ->join('classes', 'attendance.class_id', '=', 'classes.id')
            ->select('attendance.*', 'users.name as student_name', 'classes.class_name as class_name')
            ->get();

        return view('admin.attendance_history', compact('attendanceRecords'));
    }

    /**
     * Create a new attendance record.
     */
    public function createAttendance(Request $request)
    {
        // Validate the request
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'class_id' => 'required|exists:classes,id',
        ]);

        // Insert the new attendance record
        DB::table('attendance')->insert([
            'student_id' => $request->student_id,
            'class_id' => $request->class_id,
            'timestamp' => now(),
        ]);

        return redirect()->route('attendance.history')->with('success', 'Attendance record created successfully.');
    }

    /**
     * Update an existing attendance record.
     */
    public function updateAttendance(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'class_id' => 'required|exists:classes,id',
        ]);

        // Update the attendance record
        DB::table('attendance')->where('id', $id)->update([
            'student_id' => $request->student_id,
            'class_id' => $request->class_id,
            'timestamp' => now(),
        ]);

        return redirect()->route('attendance.history')->with('success', 'Attendance record updated successfully.');
    }

    /**
     * Delete an attendance record.
     */
    public function deleteAttendance($id)
    {
        // Delete the attendance record
        DB::table('attendance')->where('id', $id)->delete();

        return redirect()->route('attendance.history')->with('success', 'Attendance record deleted successfully.');
    }
}
