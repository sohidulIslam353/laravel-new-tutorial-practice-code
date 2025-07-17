<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Customer;
use App\Models\Mechanic;
use App\Models\Post;
use App\Models\State;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    // all posts by customer
    public function assignCourse($id)
    {
        $id = 1;  // static

        $data = Mechanic::with('owner')->find($id);
        dd($data->owner->owner_name); // lazy loading

        // $student = Student::with('courses')->find($id);  // learn hunter

        // return redirect()->back()->with('success', 'Course assigned successfully');
    }


    // join check
    public function check()
    {
        $country = State::with('cities')->get();

        return $country;
    }
}
