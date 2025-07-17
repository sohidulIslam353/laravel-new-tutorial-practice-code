<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Post;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    // all posts by customer
    public function assignCourse($id)
    {
        $student = Student::with('courses')->find($id);  // learn hunter

        return redirect()->back()->with('success', 'Course assigned successfully');
    }
}
